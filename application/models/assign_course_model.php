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
    
    //cehcks if years ,section or batch is updated during update and return 0 incase of change else 1
    function check_items($data)
    {
    	$query = $this->db->get_where('assign_course',$data);
    	$result=$query->result();
    	 
    	if(!empty($result)){
    		//if not empty means year,section,batch has not been changed so return 1
    		return 1 ;
    		 
    	}
    	else{
    		//delete all entries from student_course where id = $data['id'] because setion year or batch has been updated
    		$this->db->delete('student_course', array('assign_course_id ' => $data['id']));
    		return 0;
    	}
    }
    function get_assigned_course_dropdown($value=1){
    	
    	
    	$arrCourses=array();
    	    	
    	$query=$this->db->query("SELECT a.id,c.name
    			FROM assign_course a
    			INNER JOIN courses c ON a.course_id = c.id
    			GROUP BY c.name");
    	
    	$result=$query->result();
    	if(!empty($result)){
    		
    		foreach ($result as $data ){
    				
    			$arrCourses[$data->id]=$data->name;
    		}
    		
    		return form_dropdown('assign_course_id', $arrCourses,$value,'id="assign_course"');
    		 
    	}
    }
    
    function get_assigned_course_by_id($course_id)
    {
    	$query=$this->db->query("SELECT a.id, c.name
								FROM assign_course a
								INNER JOIN courses c ON a.course_id = c.id
								WHERE a.id={$course_id};");
    	$result=$query->result();
    	if(!empty($result)){
    		return $result[0]->name;
    	}
    }

    function get_assigned_course($course_id)
    {
        $query=$this->db->query("SELECT a.*, t.*
                                FROM assign_course a
                                INNER JOIN user_teacher as t on t.user_id = a.assigned_to
                                WHERE a.batch_year = ? and a.course_id = ? and a.status =1
                                ORDER BY a.id DESC", array(date('Y'),$course_id));
        $ret = $query->result_array();
        return $ret;
    }

}



