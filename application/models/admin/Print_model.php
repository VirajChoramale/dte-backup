<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
/*------------------------------------------------------------------------*/

public function getCourses()
{
    $query  = $this->db->query("SELECT ivd.course_id,crs.coursename FROM `inst_vaccency_details` as ivd JOIN courses AS crs ON ivd.course_id = crs.id GROUP BY ivd.course_id");
	return $query->result_array(); 
}
public function get_Designation_by_courseId($cid)
{
    $query  = $this->db->query("SELECT ivd.desigation_id,post.designation  FROM `inst_vaccency_details` as ivd JOIN designation as post ON ivd.desigation_id = post.id WHERE ivd.course_id = $cid GROUP BY ivd.desigation_id;");
	return $query->result_array(); 
}

public function getCourse_Post_Data($cid,$pid)
{
   $query  = $this->db->query("SELECT ivd.*,inst.inst_name,deg.designation,crs.coursename,inre.region_name 
   FROM `inst_vaccency_details` as ivd 
   JOIN inst_regions as inre ON ivd.region_id = inre.id 
   JOIN institutes as inst ON ivd.inst_id = inst.id 
   JOIN designation AS deg ON ivd.desigation_id = deg.id 
   JOIN courses as crs ON ivd.course_id=crs.id  
   WHERE ivd.`course_id` = $cid
   AND ivd.`desigation_id` = $pid 
   ORDER BY ivd.region_id;");
	return $query->result_array(); 
}




/*--------------------------------------------------------------------------*/

}
?>