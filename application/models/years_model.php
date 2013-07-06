<?php

class Years_Model  extends CI_Model  {
    
	
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_years_dropdown($value)
    {   
    	$value=(!empty($value))? $value : 1;
    	$arrYears=array();
    	
    	$this->db->select('id,year');
     	$query = $this->db->get('years');
       
		foreach ($query->result() as $data ){
			
			$arrYears[$data->id]=$data->year;
		}
		
		return form_dropdown('year_id', $arrYears,$value);
    }
    
    function get_year_by_id($year_id)
    {
    	$query = $this->db->get_where('years', array('id' => $year_id));
    	$result=$query->result();
    	return $result[0]->year;
    }
    
   
		
}


