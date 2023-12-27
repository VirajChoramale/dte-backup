<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_exam_dates(){
		$query  = $this->db->query("SELECT day,date FROM time_table_master where day IN (select day from inst_time_table_master) GROUP BY date");
		return $query->result_array();
	}

	public function get_exam_dates_not_qp_upload(){
		$query  = $this->db->query("SELECT day,date FROM time_table_master where day IN (select day from inst_time_table_master) and day NOT IN (select day from qp_details) GROUP BY date");
		return $query->result_array();
	}
	public function get_vaccancy_data(){
	    $query  = $this->db->query("SELECT ivd.id,ivd.sensction_post,ivd.filled_post,ivd.vaccent_post,ir.region_name,inst.inst_name,cl.course_level_name,courses.coursename,dig.designation  FROM inst_vaccency_details as ivd JOIN inst_regions as ir ON ivd.region_id = ir.id JOIN institutes AS inst ON ivd.inst_id = inst.id JOIN courselevel as cl ON ivd.course_level_id = cl.id JOIN courses ON ivd.course_id = courses.id JOIN designation AS dig ON ivd.desigation_id = dig.id");
	    return $query->result_array(); 
	} 
	public function getdisntinctregionalid($data=null)
	{
	   // print_r($data); die;
	   $did = $data['did'];
	   $rid1 = $data['rid'];
	   $rid = implode("','",$rid1);
	   //print_r($rid); die;
	    if($data['rid']==0)
	    {
	       $where = "WHERE ivd.desigation_id = $did";
	    }
	    else
	    {
	       $where="WHERE ivd.desigation_id = $did AND ivd.region_id IN('$rid') "; 
	    }
	    $query  = $this->db->query("SELECT ivd.id,ivd.region_id,ir.region_name  FROM inst_vaccency_details as ivd JOIN inst_regions as ir ON ivd.region_id = ir.id $where GROUP BY ivd.region_id ASC");
		return $query->result_array();
	}
	public function get_slots($day){
		//echo "SELECT slot FROM inst_time_table_master where day = '$day' group by slot";
		$query  = $this->db->query("SELECT slot FROM inst_time_table_master where day = '$day' group by slot");
		return $query->result_array();
	}
	 
	public function get_slot_details($day,$slot){
		//echo "SELECT * FROM inst_time_table_master where day = '$day' AND slot='$slot'";
	    $query  = $this->db->query("SELECT * FROM inst_time_table_master where day = '$day' AND slot='$slot' GROUP BY paper_code");
	    return $query->result_array();
	}
	
	public function daywise_inst($day,$slot,$rbte){
	    if($rbte=='all')
	    {
	    $query  = $this->db->query("SELECT *,SUM(candidate_count) as std_cnt FROM inst_time_table_master where day = '$day' AND slot='$slot' GROUP BY exam_center ORDER BY region,exam_center");
	    
	    }else
	    {
	    $query  = $this->db->query("SELECT *,SUM(candidate_count) as std_cnt FROM inst_time_table_master where day = '$day' AND slot='$slot' AND region='$rbte' GROUP BY exam_center ORDER BY region,exam_center");    
	    }
	    
	    return $query->result_array();
	}
	
	public function add_qp($data){
		return $this->db->insert_batch("qp_details",$data);
	}

	public function get_qp_details(){
		$query  = $this->db->query("SELECT * FROM qp_details");
		return $query->result_array();
	}

	public function get_unallocated_paper_setters(){
		$query  = $this->db->query("SELECT * FROM users WHERE role='PS' AND parent = 0");
		return $query->result_array();
	}
	
	public function ch_ps_maping($ch_id,$ps_ids){
		$data['parent'] = $ch_id;
		$cnt = 0;
		foreach($ps_ids as $ps_id){
			$this->db->where('id',$ps_id);
			$this->db->update('users',$data);
			if($this->db->affected_rows()){
				$cnt++;
			}
		}
		return $cnt;
	}

	public function getApprovedPaperSetterBankDetails(){
		$query  = $this->db->query("SELECT a.*,b.name FROM ps_doc_bank a JOIN users b ON a.username = b.username WHERE a.role='PS' AND a.paper_doc <> '' GROUP BY account_no");
		return $query->result_array();
	}

	public function getChairmanBankDetails(){
		$query  = $this->db->query("SELECT a.*,b.name FROM ps_doc_bank a JOIN users b ON a.username = b.username WHERE a.role='CH' GROUP BY account_no");
		return $query->result_array();
	}

	public function all_users_for_mail(){
		$query  = $this->db->query("SELECT email,subject_code,subject_name,role,username FROM users WHERE role IN ('PS','CH')");
		return $query->result_array();
	}

    public function course_details(){
		$query  = $this->db->query("SELECT paper_code,course_name,subject_code,subject_name,semester FROM users");
		return $query->result_array();
	}

	public function getGeneratedpaperSet($date){

		//$sql = "SELECT a.*,b.* FROM users a JOIN ps_doc_bank b ON a.username = b.username WHERE b.paper_doc1 <> '' AND a.subject_code IN (select sub_code from time_table where date = ? ) ORDER BY RAND()";

		$sql = "SELECT a.*,b.* FROM users a JOIN ps_doc_bank b WHERE ( a.username = b.username OR a.username = b. chairman_id ) AND b.paper_doc1 <> '' AND a.subject_code IN (select sub_code from time_table where date = ? ) AND b.paper_doc1 NOT IN ( SELECT paper_doc FROM final_paper_sets ) ORDER BY RAND()";

		$query  = $this->db->query($sql,array($date));
		$result = $query->result_array();
		
		foreach($result as $res){
			$subject_code = str_replace(' ', '',$res['subject_code']);

			$query1  = $this->db->query("SELECT * FROM final_paper_sets WHERE subject_code = '$subject_code' AND paper_doc = '$res[paper_doc1]'");
			$result1 = $query1->result_array();
			
			if(empty($result1)){
				$data = array(
							'uid'=>$res['id'],
							'course_code'=>$res['paper_code'],
							'subject_code'=>$subject_code,
							'paper_doc'=>$res['paper_doc1']
						  );
				$inst_res = $this->db->insert('final_paper_sets',$data);
			}
		}
		
		return 1; 
	}

	public function getSelectedPaperSets(){
		$query  = $this->db->query("SELECT * FROM final_paper_sets");
		return $query->result_array();
	}


	public function get_all_pdreports(){
		$query  = $this->db->query("SELECT download_history_1_3_23.*, down_info_01_03_23.* FROM download_history_1_3_23 LEFT JOIN  down_info_01_03_23 ON download_history_1_3_23.username = down_info_01_03_23.username GROUP BY download_history_1_3_23.username");
		return $query->result_array();
	}
	
	public function get_all_pdreports_1(){
		$query  = $this->db->query("SELECT download_history_05_01_2023.*, down_info_05_01_2023.* FROM download_history_05_01_2023 LEFT JOIN  down_info_05_01_2023 ON download_history_05_01_2023.username = down_info_05_01_2023.username GROUP BY download_history_05_01_2023.username");
		return $query->result_array();
	}

	public function get_all_pdreports_2(){
		$query  = $this->db->query("SELECT download_history_07_01_2023.*, down_info_07_01_2023.* FROM download_history_07_01_2023 LEFT JOIN  down_info_07_01_2023 ON download_history_07_01_2023.username = down_info_07_01_2023.username GROUP BY download_history_07_01_2023.username");
		return $query->result_array();
	}

	public function get_all_pdreports_3(){
		$query  = $this->db->query("SELECT download_history_09_01_2023.*, down_info_09_01_2023.* FROM download_history_09_01_2023 LEFT JOIN  down_info_09_01_2023 ON download_history_09_01_2023.username = down_info_09_01_2023.username GROUP BY download_history_09_01_2023.username");
		return $query->result_array();
	}
	
	public function get_all_confirm_paper(){
	    $query  = $this->db->query("SELECT a.id,a.paper_doc1,b.name,b.email,b.mobile,b.subject_code,b.subject_name,b.institute_name,c.date FROM `ps_doc_bank` as a , users as b ,time_table as c WHERE a.chairman_id=b.username AND a.confirm_flg=1 AND b.role='CH' AND b.subject_code=c.sub_code");
	    return $query->result_array();
	}
	
	public function get_all_paper_report($date){
		if(empty($date)){
			$date = date("Y-m-d");
		}
		$sql   = 'SELECT sub_code,sub_name,date FROM time_table WHERE date = ? order by date asc';
		$query = $this->db->query($sql, array($date));
	    return $query->result_array();
	}

	public function get_all_paper_report_1(){
		$sql   = 'SELECT sub_code,sub_name,date FROM time_table order by date asc';
		$query = $this->db->query($sql, array($date));
	    return $query->result_array();
	}
	
	public function get_all_subjects(){
	    $query = $this->db->query("SELECT * FROM `users` WHERE role='CH'");
	    if(!empty($query->result_array())){
	        return $query->result_array();
	    }
	}

	public function get_activate_paper($date){
		if(empty($date)){
			$date = date("Y-m-d");
		}
		$query  = $this->db->query("SELECT * FROM `time_table` WHERE date='$date' ORDER BY `time_table`.`date` ASC");
		return $query->result_array();
	}

	public function get_all_inst_otp(){
		$query  = $this->db->query("SELECT * FROM `down_info` ORDER BY `down_info`.`created_date` DESC LIMIT 100");
		return $query->result_array();
	}
	
	public function add_paper_doc($data){
	    $data['status'] = 'A';
	    $chairman_id = $_SESSION['username'];
	    $ps_name=$data['ps_name'];
		//echo '<pre>';
		//print_r($data);
	    $sub_arr=explode(":",$data['sub_code']);
	    $sub_code=$sub_arr[0];
	    $semester=$sub_arr[1];
	    $sub_name=$sub_arr[2];
	    $org_pwd=rand(10000,99999);
	    $pwd=md5($org_pwd);
	    $role=$data['role'];
	    $paper_doc1=$data['paper_doc1'];
	    $mpaper_doc1=$data['model_paper_doc1'];
	    $query  = $this->db->query("SELECT id FROM `users` ORDER by id DESC LIMIT 1");
	    $last_id= ++$query->result_array()[0][id];
	    $uname=$sub_code.$data['role'].$last_id;
	    $insert_query="INSERT INTO `users`(`id`, `name`,  `semester`, `subject_code`, `subject_name`, `username`, `password`, `orig_pass`, `role`, `parent`) 
                                   VALUES ($last_id,'$ps_name',$semester,'$sub_code','$sub_name','$uname','$pwd','$org_pwd','$role','0')";
	    $this->db->query($insert_query);
	    $ps_insert_query="INSERT INTO `ps_doc_bank`(`username`, `paper_doc`, `paper_doc1`, `model_paper_doc`, `model_paper_doc1`, `ifsc_code`, `bank_name_addr`, `bank_branch`, `account_no`, `status`, `role`,  `created_by`,  `chairman_id`, `confirm_flg`)
                                            VALUES ('$uname','','$paper_doc1','','$mpaper_doc1','','','','','A','$role','AD','$chairman_id','1')";
	    return $this->db->query($ps_insert_query);
	}

	public function get_admin_added_paper($username){
	    $query = $this->db->query("select a.id,a.username,a.name,a.mobile,a.paper_code,a.subject_code,b.* from users a LEFT JOIN ps_doc_bank b ON a.username = b.username where  b.chairman_id='$username'");
	    if(!empty($query->result_array())){
	        return $query->result_array();
	    }
	}

	public function getAllExamDates(){
		$query  = $this->db->query("SELECT * FROM `time_table` GROUP BY date ORDER BY date ASC");
		return $query->result_array();
	}
	
	public function getAllExamDates1(){
		$query  = $this->db->query("SELECT * FROM `time_table` GROUP BY date ORDER BY date ASC");
		return $query->result_array();
	}

	public function enable_disable_paper($id,$status){
		$data['activate'] = $status;
		$this->db->where('id',$id);
		$this->db->update('time_table',$data);
	}

	public function set_paper_type($id,$paper_type){
		$data['paper_type'] = $paper_type;
		$this->db->where('id',$id);
		$this->db->update('time_table',$data);
	}

	public function add_srpd($data){
		return $this->db->insert('info_srpd',$data);
	}

	public function add_timetable($data){
		$data['sub_code']  = $data['sub_code'];
		$data['sub_name']  = $data['sub_name'];
		$data['date']      = $data['date'];
		$data['exam_to']  = $data['exam_to'];
		$data['exam_from']  = $data['exam_from'];
		$data['paper_type']  = $data['paper_type'];

		return $this->db->insert('time_table',$data);
	}

	public function get_all_timetable(){
		$query  = $this->db->query("SELECT * FROM `time_table` ORDER BY date DESC");
		return $query->result_array();
	}
	
	public function delete_time_table($id){
		$this->db->where('id',$id);
		return $this->db->delete('time_table');
	}
	
	public function delete_srpd_info($id){
		$this->db->where('id',$id);
		return $this->db->delete('info_srpd');
	}

	public function update_timetable($id,$sub_code,$sub_name,$date,$exam_to,$exam_from,$paper_type){
		$data['sub_code']   = $sub_code;
		$data['sub_name']   = $data['sub_name'];
		$data['date']       = $data['date'];
		$data['exam_to']    = $data['exam_to'];
		$data['exam_from']  = $data['exam_from'];
		$data['paper_type'] = $data['paper_type'];
		$this->db->where('id',$id);
		$this->db->update('time_table',$data);
	}

	public function add_inst($data){
		$data['username']  = $data['username'];
		$data['password']  = md5($data['password']);
		$data['orig_pass'] = $data['orig_pass'];
		$data['role']      = $data['role'];
		return $this->db->insert('inst_users',$data);
	}
	
	public function directPaperUpload($data){
		//print_r($data);
		$query   = $this->db->query("SELECT id FROM `users` ORDER by id DESC LIMIT 1");
	    $last_id = ++$query->result_array()[0][id];
	    $uname   = $data['subject_code'].'AD'.$last_id;

		$org_pwd      = rand(10000,99999);
		$subject_details = subjectdetails($data['subject_code']);

		$dt = array(
			'username'     => $uname,
			'id'           => $last_id,
			'name'         => 'ADMIN',
			'subject_code' => $data['subject_code'],
			'semester'     => $data['semester'],
			'subject_name' => $subject_details['subject_name'],
			'orig_pass'    => $org_pwd,
			'password'     => md5($org_pwd),
			'role'         => 'CH'
		);

		if($this->db->insert("users",$dt)){

			$dt1 = array(
				'username'    => $uname,
				'paper_doc1'  => $data['paper_doc1'],
				'status'      => 'A',
				'role'        => 'CH',
				'created_by'  => 'AD',
				'chairman_id' => $_SESSION['username'],
				'confirm_flg' => 1
			);

			if($this->db->insert("ps_doc_bank",$dt1)){
				
				$dt2 = array(
					'subject_code' => $data['subject_code'],
					'paper_doc'    => $data['paper_doc1']
				);

				if($this->db->insert("final_paper_sets",$dt2)){
					return true;
				}

			}else{ 
				return false;
			}

		}else{
			return false;
		}

	}

	public function getAllDirectUploadedPapers(){
		$query = $this->db->query("SELECT a.subject_code,a.subject_name,a.username,b.paper_doc1 FROM users a JOIN ps_doc_bank b ON a.username = b.username WHERE a.name='ADMIN'");
		return $query->result_array();
	}

	public function allow_edit($inst_id,$pcode){
		$data['active'] = 0;
		$this->db->where('inst_id',$inst_id);
		$this->db->where('pcode',$pcode);
		$this->db->update('down_log',$data);
		return $this->db->affected_rows();
	}
	public function getRegions()
	{
	    $query  = $this->db->query("SELECT * FROM `inst_regions` ORDER BY id ASC");
		return $query->result_array();
	}
	public function getInstitute($region_id)
	{
	    $query  = $this->db->query("SELECT * FROM `institutes` where regions = $region_id ORDER BY inst_code ASC");
		return $query->result_array();
	}
	public function getInstitutenew($region_id)
	{
	    $query  = $this->db->query("SELECT ivd.*,inst.inst_name,rg.region_name FROM `inst_vaccency_details` as ivd JOIN institutes as inst ON ivd.inst_id = inst.id JOIN inst_regions as rg ON ivd.region_id = rg.id WHERE `region_id` = $region_id GROUP BY ivd.inst_id");
		return $query->result_array();
	}
	public function get_post($level_id)
	{
	    if($level_id==3)
	    {
	        $query  = $this->db->query("SELECT * FROM `designation` where stream  = $level_id");
		    return $query->result_array();
	    }
	    else
	    {
	        $query  = $this->db->query("SELECT * FROM `designation` where stream  != 3");
		    return $query->result_array();
	    }
	    
	}
	public function get_inst_level($inst_id)
	{
	    $query  = $this->db->query("SELECT inst_det.course_level_id,cl.course_level_name FROM inst_details as inst_det JOIN courselevel AS cl ON inst_det.course_level_id = cl.id where inst_det.inst_id = $inst_id GROUP BY inst_det.course_level_id;");
		return $query->result_array();
	}
	public function getDesignation()
	{
	    $query  = $this->db->query("SELECT * FROM `designation` ORDER BY designation ASC");
		return $query->result_array();
	}
	public function getDesignationById($data)
	{
	    $did = $data['did'];
	    $query  = $this->db->query("SELECT * FROM `designation` where id=$did ORDER BY designation ASC");
		return $query->result_array();
	}
	public function getCourseByInst($inst_id,$level_id)
	{
	    $query  = $this->db->query("SELECT inst_det.course_id,crs.coursename FROM inst_details AS inst_det JOIN courses AS crs ON inst_det.course_id = crs.id WHERE inst_det.inst_id = $inst_id AND inst_det.course_level_id=$level_id");
		return $query->result_array();
	}
	public function add_inst_vaccency_details($data)
	{
	    if(isset($data['updateid']) && $data['updateid'] !=0)
	    {
	        $id=$data['updateid'];
	        $regions = $data['regions'];
    	    $inst = $data['inst'];
    	    $level = $data['level'];
    	    $branch = $data['branch'];
    	    $designation = $data['designation'];
    	    $senction_post = $data['senction_post'];
    	    $filled_post = $data['filled_post'];
    	    $vaccent_post = $data['vaccent_post'];
    	    $data1 = array(
    	        'region_id'=>$regions,
                'inst_id'=>$inst,
    	        'course_level_id'=>$level,
                'course_id'=>$branch,
                'desigation_id'=>$designation,
                'sensction_post'=>$senction_post,
                'filled_post'=>$filled_post,
                'vaccent_post'=>$vaccent_post
              );
    	    $this->db->where('id',$id);
		    $this->db->update('inst_vaccency_details',$data1);
		    return $this->db->affected_rows();
    	    //return $this->db->insert("inst_vaccency_details",$data1); 
	    }
	    else
	    {
	    $regions = $data['regions'];
	    $inst = $data['inst'];
	    $level = $data['level'];
	    $branch = $data['branch'];
	    $designation = $data['designation'];
	    $senction_post = $data['senction_post'];
	    $filled_post = $data['filled_post'];
	    $vaccent_post = $data['vaccent_post'];
	    $data1 = array(
	        'region_id'=>$regions,
            'inst_id'=>$inst,
	        'course_level_id'=>$level,
            'course_id'=>$branch,
            'desigation_id'=>$designation,
            'sensction_post'=>$senction_post,
            'filled_post'=>$filled_post,
            'vaccent_post'=>$vaccent_post
          );
	    
	   // print_r($data1);die;
	    return $this->db->insert("inst_vaccency_details",$data1);
	    }
	}
	
	public function getRegionsdata($regions,$post)
	{
	   $pid = implode("','",$post);
	   //echo "SELECT ivd.*,ir.region_name,dig.designation  FROM inst_vaccency_details as ivd JOIN inst_regions as ir ON ivd.region_id = ir.id JOIN designation AS dig ON ivd.desigation_id = dig.id WHERE ivd.region_id=$regions AND ivd.desigation_id IN('$pid') GROUP BY ivd.desigation_id"; die;
	   $query  = $this->db->query("SELECT ivd.*,ir.region_name,dig.designation  FROM inst_vaccency_details as ivd JOIN inst_regions as ir ON ivd.region_id = ir.id JOIN designation AS dig ON ivd.desigation_id = dig.id WHERE ivd.region_id=$regions AND ivd.desigation_id IN('$pid') GROUP BY ivd.desigation_id");
	   return $query->result_array();
	   
	}
	public function getLevelByRegion($regions)
	{
	  $query  = $this->db->query("SELECT ivd.id,ivd.region_id,ivd.course_level_id,ir.region_name,cl.course_level_name FROM `inst_vaccency_details` as ivd JOIN inst_regions AS ir ON ivd.region_id = ir.id JOIN courselevel as cl ON ivd.course_level_id = cl.id WHERE ivd.region_id = $regions GROUP BY ivd.course_level_id");
		return $query->result_array();  
	}
	public function getCourseBylevel($rid,$lid)
	{
	 $query  = $this->db->query("SELECT ivd.id,ivd.course_id,cs.coursename FROM `inst_vaccency_details` as ivd JOIN courses AS cs ON ivd.course_id = cs.id WHERE ivd.region_id = $rid AND ivd.course_level_id=$lid GROUP BY ivd.course_id;");
		return $query->result_array();    
	}
	public function getpostBylevel($lid)
	{
	    if($lid == 3)
	    {
	        $query  = $this->db->query("select * from designation where stream=3 "); 
	    }
	    else
	    {
	        $query  = $this->db->query("select * from designation where stream != 3 "); 
	    }
	  
		return $query->result_array();    
	}
	public function getbtydata($regions,$level,$course,$desig)
	{
	    $cid = implode("','",$course);
	    //echo $cid; die;
	  $query  = $this->db->query("SELECT ivd.id,ivd.sensction_post,ivd.filled_post,ivd.vaccent_post,ir.region_name,inst.inst_name,cl.course_level_name,courses.coursename,dig.designation 
	  FROM inst_vaccency_details as ivd 
	  JOIN inst_regions as ir ON ivd.region_id = ir.id 
	  JOIN institutes AS inst ON ivd.inst_id = inst.id 
	  JOIN courselevel as cl ON ivd.course_level_id = cl.id 
	  JOIN courses ON ivd.course_id = courses.id 
	  JOIN designation AS dig ON ivd.desigation_id = dig.id 
	  WHERE ivd.`region_id` = $regions  AND ivd.`course_id` IN ('$cid') AND ivd.`desigation_id` = $desig");
		return $query->result_array();  
	}
	public function deleterows($id)
	{
	    $this->db->where('id',$id);
		return $this->db->delete('inst_vaccency_details');
	}
	public function getivddatabyid($id)
	{
	    $query  = $this->db->query("select * from inst_vaccency_details where id=$id ");
	   // print_r( $query); die;
        return $query->result_array();  
	}

}
?>