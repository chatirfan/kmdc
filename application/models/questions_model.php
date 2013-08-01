<?php

class Questions_Model  extends CI_Model  {
    
	
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
 


    function get_question_type($question_id) // pass id and get question type
    {
    	$query = $this->db->get_where('questions', array('id' => $question_id));
    	$result=$query->result();
    	if(!empty($result)){
    	return $result[0]->type;
    	}
    }
  
    
   
		
}


