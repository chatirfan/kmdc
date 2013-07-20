<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assign_course extends CI_Controller {

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
			$crud->set_table('assign_course');
			$crud->set_subject('Assign Course');
						
			$crud->columns('course_id','assigned_by','assigned_to','year_id','section_id','batch_year','status');
			
			/*Generating dropdwons for year section and course status*/
			$crud->callback_add_field('status',array($this->common,'status_dropdown'));
			$crud->callback_add_field('section_id',array($this->sections,'get_sections_dropdown'));
			$crud->callback_add_field('year_id',array($this->years,'get_years_dropdown'));
			$crud->callback_add_field('assigned_to',array($this->teachers,'get_teachers_dropdown'));
			$crud->callback_add_field('course_id',array($this->courses,'get_courses_dropdown'));
			$crud->callback_add_field('batch_year',array($this->common,'get_batch_years_dropdown'));
			
			
			/*call back for edit form->passes value attribute with items value to the function*/
			$crud->callback_edit_field('status',array($this->common,'status_dropdown'));
			$crud->callback_edit_field('section_id',array($this->sections,'get_sections_dropdown'));
			$crud->callback_edit_field('year_id',array($this->years,'get_years_dropdown'));
			$crud->callback_edit_field('course_id',array($this->courses,'get_courses_dropdown'));
			$crud->callback_edit_field('assigned_to',array($this->teachers,'get_teachers_dropdown'));
			$crud->callback_edit_field('batch_year',array($this->common,'get_batch_years_dropdown'));
			//insertion of created_by not present in form whilst updation
			$crud->callback_before_update(array($this,'call_before_update'));
			$crud->callback_after_update(array($this,'call_after_update'));
			
			//insertion of created_by not present in form whilst adition
			$crud->callback_before_insert(array($this,'call_before_insert'));
			
			//bulk insertion  in sudent_course table
			$crud->callback_after_insert(array($this,'call_after_insert'));

			
			/*callback for table view */
			$crud->callback_column('status',array($this->common,'_status'));
			$crud->callback_column('section_id',array($this->sections,'get_section_by_id'));
			$crud->callback_column('year_id',array($this->years,'get_year_by_id'));
			$crud->callback_column('assigned_to',array($this->teachers,'get_teacher_by_id'));
			$crud->callback_column('course_id',array($this->courses,'get_course_by_id'));
			$crud->callback_column('assigned_by',array($this->users,'get_user_by_id'));
   			
			/*used to display fields when adding items*/
			$crud->fields('course_id','assigned_by','assigned_to','year_id','section_id','batch_year','status');
			
			/*hidding a field for insertion via call_before_insert crud requires field to be present in Crud->fields*/
			$crud->change_field_type('assigned_by','invisible');
			
			/*used to change names of the fields*/
			$crud->display_as('course_id','Course');
		//$crud->display_as('assigned_by','Assignee');
			$crud->display_as('assigned_to','Teacher');
			$crud->display_as('section_id','Section');
			$crud->display_as('year_id','Year');
			$crud->display_as('batch_year','Batch');
			
			
			//$this->pr($crud); 
			//die;
			$crud->set_rules('batch_year','Batch Year','numeric|required');
			$crud->set_rules('course_id', 'Course id', 'callback_check_duplicate');
			
			$output = $crud->render();
			//$this->pr($output);


			$content = $this->load->view('admin/assign_course.php',$output,true);
			// Pass to the master view
			$this->load->view('admin/master', array('content' => $content));
				

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
    
	function call_before_insert($post_array){
		
		//getting user id of logged in user from auth
		$post_array['assigned_by']=$this->users->get_user_id();
		
		//drop down for teachers return teacher_id mapping it with field for this table 
		$post_array['assigned_to']=$post_array['teacher_id'];
		return $post_array;
			
	}
	
	function call_after_insert($post_array,$assign_course_id){
	
		//return 1 if failure 0 if success	2 if alredy present
		if($this->students->bulk_insert_student_course($post_array,$assign_course_id)==0){
		
		}
		
	}
	
	
	function call_before_update($post_array,$assign_course_id){
		//chek if year /section or batch is changed whilst update
		$this->pr($assign_course_id); 
		$data=array();
		$data['id']=$assign_course_id;
		$data['year_id']=$this->input->post('year_id');
		$data['section_id']=$this->input->post('section_id');
		$data['batch_year']=$this->input->post('batch_year');
		
		/* 
		 * check_items function returns 1 if Section|Year|Batch is not changed else returns 0
		 * saving this value will tell us in after_update function whether we need to make bulk insertion to students_course 
		 * or not 
		*/
		$post_array['is_changed']= $this->assign->check_items($data);
		
		//getting user id of logged in user from auth
		$post_array['assigned_by']=$this->users->get_user_id();
	
		//drop down for teachers return teacher_id mapping it with field for this table
		$post_array['assigned_to']=$post_array['teacher_id'];
		return $post_array;
	
	
	}
	
	function call_after_update($post_array,$assign_course_id){
		$this->pr($post_array);
		
		if($post_array['is_changed']==0){
		$this->students->bulk_insert_student_course($post_array,$assign_course_id);
			}
	}
	
	function check_duplicate($str)
	{
		$data=array();
		$data['course_id']= $this->input->post('course_id');
		$data['assigned_to'] = $this->input->post('teacher_id');
		$data['year_id']=$this->input->post('year_id');
		$data['section_id']=$this->input->post('section_id');
		$data['batch_year']=$this->input->post('batch_year');
		
		//checks for duplicate entries in db return 1 if exist else 0
		if($this->assign->check_duplicate($data)==1){
			
			$this->form_validation->set_message('check_duplicate','Cannot Insert a Duplicate Entry');
			return false;
		}
		else{
			return true;
		}
		
		
		
		
		
	
	}
	
	

	

	




}