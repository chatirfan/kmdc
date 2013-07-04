<?php

class Years_Model  extends CI_Model  {
    
	
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_years_dropdown()
    {   
    	$arrYears=array();
    	
    	$this->db->select('id,year');
     	$query = $this->db->get('years');
       
		foreach ($query->result() as $data ){
			
			$arrYears[$data->id]=$data->year;
		}
		
		return $arrYears;
    }
		
}


