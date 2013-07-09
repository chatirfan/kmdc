<?php

class Courses_Model  extends CI_Model  {
    
	
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('form');
    }
    /*value parameter is passed when the function is called on edit form*/
    function get_courses_dropdown($value)
    {   
    	
    	$value=(!empty($value))? $value : 1;
    	$arrCourses=array();
    	
    	$this->db->select('id,name');
     	$query = $this->db->get('courses');
       
		foreach ($query->result() as $data ){
			
			$arrCourses[$data->id]=$data->name;
		}
		
		return form_dropdown('course_id', $arrCourses,$value);
    }
    
    
    function get_course_by_id($course_id)
    {
    	$query = $this->db->get_where('courses', array('id' => $course_id));
    	$result=$query->result();
    	return $result[0]->name;
    }
    
    
		
}


