<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

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

		
	}




	function index()
	{
		//$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}



	function view()
	{		
		

		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('courses');
			$crud->set_subject('Courses');
			$crud->required_fields('city');
			
			$crud->columns('course_code','course_name','course_desc','course_status','section_id');
			
			/*Generating dropdwons for year section and course status*/
			$crud->callback_add_field('course_status',array($this,'course_status_dropdown'));
			$crud->callback_add_field('section_id',array($this,'section_dropdown'));
			$crud->callback_add_field('year_id',array($this,'years_dropdown'));
   			
			/*used to display fields when adding items*/
			$crud->fields('course_code','course_name','course_desc','course_status','section_id','year_id','created_by');
			
			/*hidding a field for insertion via call_before_insert crud requires field to be present in Crud->fields*/
			$crud->change_field_type('created_by','invisible');
			
			/*used to change names of the fields*/
			$crud->display_as('course_desc','Description');
			$crud->display_as('course_name','Name');
			$crud->display_as('course_status','Status');
			$crud->display_as('section_id','Section');
			$crud->display_as('year_id','Year');
			
			//insertion of created by not present in form
			$crud->callback_before_insert(array($this,'call_before_insert'));
			//$this->pr($crud); 
			//die;
			$output = $crud->render();
			//$this->pr($output);


			$this->load->view('admin/courses.php',$output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
    
	function call_before_insert($post_array){
		
		$user = $this->ion_auth->user()->row();
		$post_array['created_by']=$user->id;
		return $post_array;
		
	
	}

	function course_status_dropdown($param) {
		$options = array(
				'1'  => 'Active',
				'2'    => 'Inactive',

		);
		return  form_dropdown('course_status', $options, '1');
	}


	function section_dropdown($param) {

		return  form_dropdown('section_id', $this->sections->get_section_dropdown());
	}

	function years_dropdown($param) {

		return  form_dropdown('year_id', $this->years->get_years_dropdown());
	}




}