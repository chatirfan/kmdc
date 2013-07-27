<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions extends CI_Controller {

	function __construct()
	{   
		
		
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('grocery_CRUD');
		$this->load->library('ion_auth');
		$this->load->model('course_Lecture_Model','lectures');
		
		
		
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
		$this->view();
		//$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}



	function view()
	{		
		

		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('questions');
			$crud->set_subject('Questions');
			$crud->required_fields('city');
			
			$crud->columns('lecture_id','question');
			
			
			
			/*used to display fields when adding items*/
			$crud->fields('lecture_id','question');
			
			/*hidding a field for insertion via call_before_insert crud requires field to be present in Crud->fields*/
			//$crud->change_field_type('created_by','invisible');
			
			/*used to change names of the fields*/
			$crud->display_as('lecture_id','Topic');
			$crud->display_as('question','Question');
			
			$crud->callback_add_field('lecture_id',array($this->lectures,'get_topic_dropdown'));
			
			/*call back for edit form->passes value attribute with items value to the function*/
		/* 	$crud->callback_edit_field('status',array($this->common,'status_dropdown'));
			$crud->callback_edit_field('section_id',array($this->sections,'get_sections_dropdown'));
			$crud->callback_edit_field('year_id',array($this->years,'get_years_dropdown'));
			$crud->callback_edit_field('group_id',array($this->groups,'get_groups_dropdown')); */
			
			/*callback for table view */
			$crud->callback_column('lecture_id',array($this->lectures,'get_topic_by_lectureid'));
			$crud->callback_edit_field('lecture_id',array($this->lectures,'get_topic_dropdown'));
				

			
			$output = $crud->render();
			//$this->pr($output);


            $content = $this->load->view('admin/questions.php',$output, true);
            // Pass to the master view
            $this->load->view('admin/master', array('content' => $content));


        }catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
    
	




}