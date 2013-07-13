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
		$this->load->model('Sections_Model','sections');
		$this->load->model('Years_Model','years');
		$this->load->model('Teachers_Model','teachers');
		$this->load->model('Courses_Model','courses');
		$this->load->model('Users_Model','users');
		$this->load->helper('common_helper');
		
		
		
		if (!$this->ion_auth->logged_in())
		{
			ci_redirect('auth/login');
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
			$crud->required_fields('city');
			
			$crud->columns('course_id','assigned_by','assigned_to','year_id','section_id','batch_year','status');
			
			/*Generating dropdwons for year section and course status*/
			$crud->callback_add_field('status',array($this,'status_dropdown'));
			$crud->callback_add_field('section_id',array($this->sections,'get_sections_dropdown'));
			$crud->callback_add_field('year_id',array($this->years,'get_years_dropdown'));
			$crud->callback_add_field('assigned_to',array($this->teachers,'get_teachers_dropdown'));
			$crud->callback_add_field('course_id',array($this->courses,'get_courses_dropdown'));
			
			/*call back for edit form->passes value attribute with items value to the function*/
			$crud->callback_edit_field('status',array($this,'status_dropdown'));
			$crud->callback_edit_field('section_id',array($this->sections,'get_sections_dropdown'));
			$crud->callback_edit_field('year_id',array($this->years,'get_years_dropdown'));
			$crud->callback_edit_field('course_id',array($this->courses,'get_courses_dropdown'));
			$crud->callback_edit_field('assigned_to',array($this->teachers,'get_teachers_dropdown'));
			
			//insertion of created_by not present in form whilst updation
			$crud->callback_before_update(array($this,'call_before_update'));
			
			//insertion of created_by not present in form whilst adition
			$crud->callback_before_insert(array($this,'call_before_insert'));
			
			
			
		

			/*callback for table view */
			$crud->callback_column('status',array($this,'_status'));
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
		/* 	$crud->display_as('description','Description');
			$crud->display_as('name','Name');
			$crud->display_as('status','Status');
			$crud->display_as('section_id','Section');
			$crud->display_as('year_id','Year'); */
			
			
			//$this->pr($crud); 
			//die;
			$output = $crud->render();
			//$this->pr($output);


			$this->load->view('admin/assign_course.php',$output);

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
	
	function call_before_update($post_array){
	
		//getting user id of logged in user from auth
		$post_array['assigned_by']=$this->users->get_user_id();
	
		//drop down for teachers return teacher_id mapping it with field for this table
		$post_array['assigned_to']=$post_array['teacher_id'];
		return $post_array;
	
	
	}
	
	
	

	function status_dropdown($value) {
		$value=(!empty($value))? $value : 1;
		$options = array(
				'1'  => 'Active',
				'2'    => 'Inactive',

		);
		return  form_dropdown('status', $options, $value);
	}

	function _status($value) {
		return $value=($value==1)? 'Active' : 'Inactive';
		
	}
	
	
	

	

	




}