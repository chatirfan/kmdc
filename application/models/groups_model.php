<?php

class Groups_Model  extends CI_Model  {
    
	
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
        $this->load->helper('form');
    }
    
    function get_groups_dropdown()
    {   
    	$arrGroups=array();
    	
    	$this->db->select('id,name');
     	$query = $this->db->get('groups');
       
		foreach ($query->result() as $data ){
			
			$arrGroups[$data->id]=$data->name;
		}
		
		
		return form_dropdown('group_id', $arrGroups);
    }
    
   
		
}


