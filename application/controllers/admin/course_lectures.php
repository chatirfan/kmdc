<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_lectures extends CI_Controller {

	function __construct()
	{   
		
		
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('grocery_CRUD');
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->model('Sections_Model','sections');
		$this->load->model('Years_Model','years');
		$this->load->model('Common_Model','common');
		$this->load->model('assign_Course_Model','assign');
		$this->load->model('Teachers_Model','teachers');
		$this->load->model('Students_Model','students');
		$this->load->model('Courses_Model','courses');
		$this->load->model('Users_Model','users');
		$this->load->model('course_Content_Model','content');
		
		$this->load->helper('common_helper');
		
		
		
		if (!$this->ion_auth->logged_in())
		{
			ci_redirect('authenticate/login');
		}
		
		if (!$this->ion_auth->is_admin())
		{
			$this->session->set_flashdata('message', 'You must be an admin to view this page');
			ci_redirect('');
		}
		
	}




	function index()
	{    
	    
		//pr($query->result()); die;
		 //test_method('Hello World');
		//$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}



	function view()
	{		
	
		

		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('course_lectures');
			$crud->set_subject('Course Lectures');
						
			$crud->columns('course_id','topic','topic_desc','lecture_date','created_by',
							'created_on','day','content_id','section_id','batch_year');
			
			/*Generating dropdwons for year section and course status*/
			
			$crud->callback_add_field('section_id',array($this->sections,'get_sections_dropdown'));
			$crud->callback_add_field('course_id',array($this->courses,'get_courses_dropdown'));
			$crud->callback_add_field('batch_year',array($this->common,'get_batch_years_dropdown'));
			
			
			/*call back for edit form->passes value attribute with items value to the function*/
			
			$crud->callback_edit_field('section_id',array($this->sections,'get_sections_dropdown'));
			$crud->callback_edit_field('course_id',array($this->courses,'get_courses_dropdown'));
			$crud->callback_edit_field('batch_year',array($this->common,'get_batch_years_dropdown'));
			//insertion of created_by not present in form whilst updation
			
			//$crud->callback_before_update(array($this,'call_before_update'));
			//$crud->callback_after_update(array($this,'call_after_update'));
			
			//insertion of created_by not present in form whilst adition
			$crud->callback_before_insert(array($this,'call_before_insert'));
			
			//bulk insertion  in sudent_course table
		//	$crud->callback_after_insert(array($this,'call_after_insert'));

			
			/*callback for table view */
			
			$crud->callback_column('section_id',array($this->sections,'get_section_by_id'));
			$crud->callback_column('course_id',array($this->courses,'get_course_by_id'));
			$crud->callback_column('created_by',array($this->users,'get_user_by_id'));
			$crud->callback_column('content_id',array($this->content,'get_content_by_id'));
			
			/*used to display fields when adding items*/
			$crud->fields('course_id','topic','lecture_date','topic_desc','created_by','created_on',
							'day','content_id','section_id','batch_year');
			
			/*hidding a field for insertion via call_before_insert crud requires field to be present in Crud->fields*/
			$crud->change_field_type('created_by','invisible');
			$crud->change_field_type('created_on','invisible');
			
			$crud->set_field_upload('content_id',UPLOAD_LECTURES);
			
			/*used to change names of the fields*/
			$crud->display_as('course_id','Course');
		//$crud->display_as('assigned_by','Assignee');
			
			$crud->display_as('section_id','Section');
			$crud->display_as('content_id','Upload');
			$crud->display_as('batch_year','Batch');
			
			
			//$this->pr($crud); 
			//die;
			$crud->set_rules('batch_year','Batch Year','numeric|required');
			//$crud->set_rules('course_id', 'Course id', 'callback_check_duplicate');
			
			$output = $crud->render();
			//$this->pr($output);


			$content = $this->load->view('admin/course_lectures.php',$output,true);
			// Pass to the master view
			$this->load->view('admin/master', array('content' => $content));
				

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
    
	function call_before_insert($post_array){
		
		$post_array['created_by']=$this->users->get_user_id();  				//getting user id of logged in user from auth
		$post_array['created_on']= date("Y-m-d H:i:s"); 						//mysql date time
		$post_array['content_id']=$this->content->insert_content($post_array); 	//returns content id else retuens 0
		return $post_array;
			
	}
	
	function call_after_insert($post_array,$assign_course_id){
	
		
		
	}
	
	
	function call_before_update($post_array,$assign_course_id){
		/* @todo*/
	
	
	}
	
	function call_after_update($post_array,$assign_course_id){
		
	}


}