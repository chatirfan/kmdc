<?php

class Sections_Model  extends CI_Model  {
    
	
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_section_dropdown()
    {   
    	$arrSections=array();
    	
    	$this->db->select('id,section');
     	$query = $this->db->get('sections');
       
		foreach ($query->result() as $data ){
			
			$arrSections[$data->id]=$data->section;
		}
		
		return $arrSections;
    }
		
}


