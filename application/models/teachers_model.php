<?php

class Teachers_Model  extends CI_Model  {
    
	
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('form');
    }
    /*value parameter is passed when the function is called on edit form*/
    function get_teachers_dropdown($value)
    {   
    	
    	$value=(!empty($value))? $value : 1;
    	$arrTeachers=array();
    	
    	$this->db->select('id,name');
     	$query = $this->db->get('user_teacher');
       
		foreach ($query->result() as $data ){
			
			$arrTeachers[$data->id]=$data->name;
		}
		
		return form_dropdown('teacher_id', $arrTeachers,$value);
    }
    
    
    function get_teacher_by_id($teacher_id)
    {
    	$query = $this->db->get_where('user_teacher', array('id' => $teacher_id));
    	$result=$query->result();
    	return $result[0]->name;
    }
    
    
    //returns teacher row in form of object required params id
    
    function get_teacher_row($id)
    {
    	$query = $this->db->get_where('user_teacher', array('id' => $id));
    	$result=$query->result();
    	return $result[0];
    }
    
    
		
}


