<?php

class Students_Model  extends CI_Model  {
    
	
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('form');
    }
    /*value parameter is passed when the function is called on edit form*/
   /*  function get_teachers_dropdown($value)
    {   
    	
    	$value=(!empty($value))? $value : 1;
    	$arrTeachers=array();
    	
    	$this->db->select('id,name');
     	$query = $this->db->get('user_teacher');
       
		foreach ($query->result() as $data ){
			
			$arrTeachers[$data->id]=$data->name;
		}
		
		return form_dropdown('teacher_id', $arrTeachers,$value);
    } */
    
    
    function get_student_by_id($student_id)
    {
    	$query = $this->db->get_where('user_student', array('id' => $student_id));
    	$result=$query->result();
    	return $result[0]->name;
    }
    
    
    //returns student row in form of object required params id
    
    function get_student_row($id)
    {
    	$query = $this->db->get_where('user_student', array('id' => $id));
    	$result=$query->result();
    	return $result[0];
    }
    
    //return 0 if insertion is successfull else return 1 
    /**
     * @first parameter:Post array
     * @2nd parameter :id of assign_course
     * */
    function bulk_insert_student_course($post,$assign_course_id)
    {
    	//returns users array having year batch and section id which is passed
    	$studentsArr=array();
    	$dataArr=array();
    	$array = array('section_id' =>$post['section_id'], 'year_id' => $post['year_id'], 'batch_year' => $post['batch_year']);
    	
    	$query = $this->db->get_where('user_student', $array);
    	
    	
    	$result=$query->result();
    	if(!empty($result)){
    		foreach ($result as $key=>$data){
    			$dataArr['student_id']=$data->id;
    			$dataArr['assign_course_id']=$assign_course_id;
    			    		
    			$studentsArr[$key]=$dataArr;
    		}
    			//bulk insertion to student_courses table
    			 $final_result=$this->db->insert_batch('student_course', $studentsArr);
    			  
    			if($final_result){
    			
    			return 0;
    			} 
    		
    	}
    	else {
    		return 1 ;
    	}
    	
    		
    //	}
    	return 2 ;
    		
    }
    
    
    
    
		
}


