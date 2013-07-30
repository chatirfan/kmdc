<?php

class Answers_Model  extends CI_Model  {
    
	
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   
   
    
    function insert_answers($post_array,$question_id)
    {
    	$arrCount= array(); //counter for options set a ket for each option 
    	$dataArr= array();
    	$answerArr= array();
    	if($post_array['type']=='MCQ'){
    		
    	if(!empty($post_array['option_1'])){
    		$arrCount[0]['option']=$post_array['option_1'];
    		$arrCount[0]['checked']=(array_key_exists('checked_1', $post_array))? 1 :0 ;
    	}
    	if(!empty($post_array['option_2'])){
    		$arrCount[1]['option']=$post_array['option_2'];
    		$arrCount[1]['checked']=(array_key_exists('checked_2', $post_array))? 1 :0 ;
    	}
    	if(!empty($post_array['option_3'])){
    		$arrCount[2]['option']=$post_array['option_3'];
    		$arrCount[2]['checked']=(array_key_exists('checked_3', $post_array))? 1 :0 ;
    	}
    	if(!empty($post_array['option_4'])){
    		$arrCount[3]['option']=$post_array['option_4'];
    		$arrCount[3]['checked']=(array_key_exists('checked_4', $post_array))? 1 :0 ;
    	}
    	if(!empty($post_array['option_5'])){
    		$arrCount[4]['option']=$post_array['option_5'];
    		$arrCount[4]['checked']=(array_key_exists('checked_5', $post_array))? 1 :0 ;
    	}
    	
 
    	if(!empty($arrCount)){
    		foreach ($arrCount as $key=>$data){
    			$dataArr['question_id']=$question_id;
    			$dataArr['answer']=$data['option'];
    			$dataArr['is_correct']=$data['checked'];
    				
    			$answerArr[$key]=$dataArr;
    		}
    		//bulk insertion to answers table
    		$final_result=$this->db->insert_batch('answers', $answerArr);
    		
    	
    	}
    	}
    	if($post_array['type']=='TRUE/FALSE'){
    		$answer=($post_array['answer']==0)? 'FALSE' : 'TRUE';
    		$array = array('question_id' => $question_id, 'answer' => $answer, 'is_correct' => $post_array['answer']);
    		$this->db->set($array);
    		$this->db->insert('answers');
    		
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
		
}
/*
 $SQL_QUERY= */



