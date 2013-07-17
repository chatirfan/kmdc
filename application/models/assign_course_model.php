<?php

class assign_Course_Model  extends CI_Model  {
    
	
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   
   //checks for duplicate entries in db return 1 if exist else 0
    function check_duplicate($data)
    {
    	$query = $this->db->get_where('assign_course',$data);
    	$result=$query->result();
    	return (empty($result)) ? 0 : 1;
    }
    
    ////if items above in $data are peresent in assign_course insert student and assign_course id to student_course
    function is_assigned($data,$user_student_id)
    {
    	$query = $this->db->get_where('assign_course',$data);
    	$result=$query->result();
    	
    	 if(!empty($result)){
    	 	//inserting student and assign_course id to student_course
    	 	$dataArr = array('student_id' => $user_student_id,'assign_course_id' => $result[0]->id);
    	 	$this->db->insert('student_course', $dataArr);
    	 	
    	 }
    }
		
}




