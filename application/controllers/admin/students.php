<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('grocery_CRUD');
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
			$crud->columns('course_code','course_name','course_desc','course_status','section_id','created_by');
			$crud->callback_add_field('course_status',array($this,'course_status_select'));
				

			$output = $crud->render();
			//$this->pr($output);
				
				
			$this->load->view('admin/courses.php',$output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}


	function course_status_select($param) {
		$options = array(
				'1'  => 'Active',
				'2'    => 'Inactive',

		);



		return  form_dropdown('course_status', $options, '1');
	}

}