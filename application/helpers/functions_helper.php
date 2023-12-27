<?php
function check_img_capture($inst_id,$pcode){
    $CI =& get_instance();
	$query = $CI->db->query("SELECT * FROM captured_images WHERE inst_id='$inst_id' and pcode='$pcode'");
	$res = $query->result_array();
	
	if(count($res) > 0)
	{
		return true;
	}else
	{
		return false;
	}
}

function fetch_inst_name($inst_id){
    $CI =& get_instance();
	$query = $CI->db->query("SELECT * FROM institutes WHERE inst_id='$inst_id'");
	$res = $query->result_array();

	return $res[0]['name'].','.$res[0]['icity'].','.$res[0]['idistrict'];
}


function pcode_downlaoded_status($inst_id,$pcode){
    $CI =& get_instance();
	$query = $CI->db->query("SELECT * FROM down_log WHERE inst_id='$inst_id' and pcode='$pcode' and active='1'");
	$res = $query->result_array();
	
	if(count($res) > 0)
	{
	    $ip_add = $res[0]['ip_addr'];
	    $down_time = $res[0]['time_a'];
	    return $arr = array("msg"=>"<font style='color:green'>Yes - $ip_add </font>", "pcode_down_time"=>$down_time); 
	}else
	{
	    return $arr = array("msg"=>"<font style='color:red'>No</font>", "pcode_down_time"=>'');
	    
	}
}


function get_day_qp_count($day){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT paper_code FROM inst_time_table_master WHERE day='$day' GROUP BY paper_code");
	$res = $query->result_array();
	return count($res);
}

function check_applicable($inst_id,$day,$pcode){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT paper_code FROM inst_time_table_master WHERE day='$day' AND paper_code='$pcode' AND exam_center='$inst_id'");
	$res = $query->result_array();
	if(!empty($res)){
		return true;
	}else{
		return false;
	}
}


function cap_img_name($inst_id,$pcode){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT image,created_date FROM captured_images WHERE pcode='$pcode' AND inst_id='$inst_id'");
	$res = $query->result_array();
	
	if(count($res) > 0)
	{
	return $arr = array("image_path"=>$res[0]['image'],'image_cap_time'=>$res[0]['created_date']);
	}else
	{
	return $arr = array("image_path"=>'','image_cap_time'=>'');
	}
}

function get_qp_date($paper_code){
	$CI =& get_instance();
	$query  = $CI->db->query("SELECT day FROM inst_time_table_master WHERE paper_code='$paper_code' limit 1");
	$res    = $query->result_array();
	$day    = $res[0]['day'];
	$query1 = $CI->db->query("SELECT DATE_FORMAT(date,'%d-%m-%Y') as date FROM time_table_master WHERE day='$day'");
	$res1    = $query1->result_array();
	return $res1[0]['date'];
}

function get_day_frm_date($date){
	$CI =& get_instance();
	$query  = $CI->db->query("SELECT day FROM time_table_master WHERE date='$date' limit 1");
	$res    = $query->result_array();
	return $day    = $res[0]['day'];
}

function get_date_frm_day($day){
	$CI =& get_instance();
	$query  = $CI->db->query("SELECT date FROM time_table_master WHERE day='$day' limit 1");
	$res    = $query->result_array();
	return $day    = $res[0]['date'];
}

function get_paper_name($paper_code){
	$CI =& get_instance();
	$query  = $CI->db->query("SELECT subject_name FROM subject_master WHERE subject_code='$paper_code'");
	$res    = $query->result_array();
	return $res[0]['subject_name'];
}

function get_rbte_name($rbte_code)
{
    if($rbte_code==1)
    {
        return "Mumbai";
    }
    
    if($rbte_code==2)
    {
        return "Pune";
    }
    
    if($rbte_code==3)
    {
        return "Nagpur";
    }
    
    if($rbte_code==4)
    {
        return "Aurangabad";
    }
}

function pcodewise_insts($paper_code,$rbte){
	$CI =& get_instance();
	if($rbte=='all')
	{
	$query  = $CI->db->query("SELECT exam_center FROM inst_time_table_master WHERE paper_code='$paper_code'  group by exam_center");
	}else
	{
	$query  = $CI->db->query("SELECT exam_center FROM inst_time_table_master WHERE paper_code='$paper_code' and region='$rbte'  group by exam_center");
	}
	$res    = $query->result_array();
	return count($res);
}

function pcodewise_insts_not_download($paper_code,$rbte){
	$CI =& get_instance();
	if($rbte=='all')
	{
	$query  = $CI->db->query("SELECT exam_center FROM inst_time_table_master WHERE paper_code='$paper_code' and exam_center NOT IN ( SELECT inst_id from down_log where pcode='$paper_code')  group by exam_center");
	}else
	{
		$query  = $CI->db->query("SELECT exam_center FROM inst_time_table_master WHERE paper_code='$paper_code' and region='$rbte' and exam_center NOT IN ( SELECT inst_id from down_log where pcode='$paper_code')  group by exam_center");
	}
	$res    = $query->result_array();
	return count($res);
}

function fetch_coi_details($inst_id)
{   
	$CI =& get_instance();
    $query  = $CI->db->query("select * from chief_coordinator where inst_id='$inst_id'");
    return $res    = $query->result_array();
}

function last_login($username){
	$CI =& get_instance();
    $query  = $CI->db->query("select DATE_FORMAT(last_login,'%d-%m-%Y %h:%i:%s') as last_login from users where username='$username'");
    $res    = $query->result_array();
	return $res[0]['last_login'];
}

function last_login_for_rep($username,$date){
    $date1 = date_create($date);
    $date2 = date_format($date1,"d-m-Y");
	$CI =& get_instance();
    //$query  = $CI->db->query("select DATE_FORMAT(last_login,'%d-%m-%Y %h:%i:%s') as last_login from users where username='$username'");
    $query  = $CI->db->query("SELECT * FROM `session` where enroll='$username' and role='INST' and DATE_FORMAT(str_to_date(starttime,'%d-%m-%Y %H:%i:%s'),'%d-%m-%Y %H:%i:%s') BETWEEN '$date2 00:00:00' AND '$date2 23:59:00' ORDER BY id DESC");
    $res    = $query->result_array();
	return $res[0]['start_on'];
}

function last_login_rep($date,$day,$rbte){
   
    $date1 = date_create($date);
    
    $date2 = date_format($date1,"d-m-Y");
	$CI =& get_instance();
	//echo "SELECT * FROM `users` WHERE last_login > str_to_date('$date 13:30:00','%Y-%m-%d %H:%i:%s') and role='INST' and inst_id IN (SELECT exam_center FROM inst_time_table_master WHERE day='$day')";
	if($rbte!='all')
	{
    //$query  = $CI->db->query("SELECT * FROM `users` WHERE last_login > str_to_date('$date 13:30:00','%Y-%m-%d %H:%i:%s') and role='INST' and inst_id IN (SELECT exam_center FROM inst_time_table_master WHERE day='$day' and region='$rbte')");
    //echo "SELECT * FROM `session` WHERE role ='INST' AND starttime > '$date2 10:30:00' AND enroll IN (SELECT mobile from chief_coordinator WHERE inst_id IN (SELECT inst_id from inst_time_table_master WHERE day='2' and region='$rbte')) GROUP BY enroll";
    //$query  = $CI->db->query("SELECT * FROM `session` WHERE role ='INST' AND starttime > '$date2 00:00:00' AND enroll IN (SELECT mobile from chief_coordinator WHERE inst_id IN (SELECT exam_center from inst_time_table_master WHERE day='$day' and region='$rbte')) GROUP BY enroll");
	$query  = $CI->db->query("SELECT * FROM `session` WHERE role ='INST' AND STR_TO_DATE(starttime,'%d-%m-%Y %H:%i:%s') > STR_TO_DATE('$date2 00:00:00','%d-%m-%Y %H:%i:%s') AND enroll IN (SELECT mobile from chief_coordinator WHERE inst_id IN (SELECT exam_center from inst_time_table_master WHERE day='$day' and region='$rbte')) GROUP BY enroll;");
	    
	}else if($rbte=='all')
	{
	//$query  = $CI->db->query("SELECT * FROM `users` WHERE last_login > str_to_date('$date 13:30:00','%Y-%m-%d %H:%i:%s') and role='INST' and inst_id IN (SELECT exam_center FROM inst_time_table_master WHERE day='$day')");  
	 //$query  = $CI->db->query("SELECT * FROM `session` WHERE role ='INST' AND starttime > '$date2 00:00:00' AND enroll IN (SELECT mobile from chief_coordinator WHERE inst_id IN (SELECT exam_center from inst_time_table_master WHERE day='$day')) GROUP BY enroll");
	 $query  = $CI->db->query("SELECT * FROM `session` WHERE role ='INST' AND STR_TO_DATE(starttime,'%d-%m-%Y %H:%i:%s') > STR_TO_DATE('$date2 00:00:00','%d-%m-%Y %H:%i:%s') AND enroll IN (SELECT mobile from chief_coordinator WHERE inst_id IN (SELECT exam_center from inst_time_table_master WHERE day='$day')) GROUP BY enroll;");
	}
    $res    = $query->result_array();
	return count($res);
}

function institute_details($inst_id){
	$CI    =& get_instance();
    $query = $CI->db->query("select inst_name from institutes where inst_code='$inst_id'");
	//echo "select inst_name from institutes where inst_code='$inst_id'";
    $res   = $query->result_array();
	return $res;
}

function getregionalvacantdata($rid,$did)
{
   $CI    =& get_instance();
   $query = $CI->db->query("SELECT ivd.id,ivd.sensction_post,ivd.filled_post,ivd.vaccent_post,ir.region_name,inst.inst_name,cl.course_level_name,courses.coursename,dig.designation  FROM inst_vaccency_details as ivd JOIN inst_regions as ir ON ivd.region_id = ir.id JOIN institutes AS inst ON ivd.inst_id = inst.id JOIN courselevel as cl ON ivd.course_level_id = cl.id JOIN courses ON ivd.course_id = courses.id JOIN designation AS dig ON ivd.desigation_id = dig.id WHERE ivd.region_id=$rid AND ivd.desigation_id=$did");
    $res   = $query->result_array();
	return $res;
   
}
function getinstdata($rid,$pid)
{
    $CI    =& get_instance(); 
    $query = $CI->db->query("SELECT ivd.*,ir.region_name,dig.designation,inst.inst_name FROM inst_vaccency_details as ivd JOIN institutes AS inst ON ivd.inst_id = inst.id JOIN inst_regions as ir ON ivd.region_id = ir.id JOIN designation AS dig ON ivd.desigation_id = dig.id WHERE ivd.region_id=$rid AND ivd.desigation_id = $pid GROUP BY ivd.inst_id");
    $res   = $query->result_array();
	return $res;
}
function getinstcourse($rid,$pid,$instid)
{
    $CI    =& get_instance(); 
    $query = $CI->db->query("SELECT ivd.*,cr.coursename FROM inst_vaccency_details as ivd  JOIN courses as cr ON ivd.course_id = cr.id WHERE ivd.region_id=$rid AND ivd.desigation_id =$pid AND ivd.inst_id=$instid;");
    $res   = $query->result_array();
	return $res;
}
function getinstbyregin($rid)
{
    $CI    =& get_instance(); 
    $query = $CI->db->query("SELECT * FROM `inst_vaccency_details` AS ivd JOIN institutes as inst ON ivd.inst_id = inst.id where region_id = $rid GROUP BY ivd.inst_id");
    $res   = $query->result_array();
	return $res;
}
function getsanctionsdatabyinst($rid,$inst_id)
{
    $CI    =& get_instance(); 
    $query = $CI->db->query("SELECT ivd.region_id,ivd.inst_id,ivd.desigation_id,SUM(ivd.sensction_post) as sensction_post,SUM(ivd.filled_post) as filled_post,SUM(ivd.vaccent_post) as vaccent_post,dg.designation  FROM `inst_vaccency_details` as ivd JOIN designation as dg ON ivd.desigation_id = dg.id WHERE ivd.`region_id` = $rid AND ivd.`inst_id` = $inst_id GROUP BY ivd.desigation_id;");
    $res   = $query->result_array();
	return $res;
}
?>