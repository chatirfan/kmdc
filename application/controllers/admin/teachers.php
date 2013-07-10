<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachers extends CI_Controller {

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
		$this->load->model('Groups_Model','groups');
		
		
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
		
		if (!$this->ion_auth->is_admin())
		{
			$this->session->set_flashdata('message', 'You must be an admin to view this page');
			redirect('/');
		}
		
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
			$crud->set_table('user_teacher');
			$crud->set_subject('Teachers');
			$crud->required_fields('city');
			
			$crud->columns('teacher_id','name','email','phone','qualification','institution','skills','designation');
			
			/*used to display fields when adding items*/
			$crud->fields('user_id','name','teacher_id','email','phone','qualification','institution','skills','designation');
			
			/*hidding a field for insertion via call_before_insert crud requires field to be present in Crud->fields*/
			$crud->change_field_type('user_id','invisible');
			

			
			
			/*hidding a field for insertion via call_before_insert crud requires field to be present in Crud->fields*/
			//$crud->change_field_type('created_by','invisible');
			
			/*used to change names of the fields*/
			$crud->display_as('teacher_id','Teacher Id');
			$crud->display_as('name','Name');
			$crud->display_as('email','Email');
			$crud->display_as('phone','Phone#');
			$crud->display_as('qualification','Qualification');
			$crud->display_as('skill','Skills');
			$crud->display_as('designation','Designation');
			$crud->display_as('institution','Institution');
			
			
			
			//creating a user before creation of teacher
			$crud->callback_before_insert(array($this,'call_before_insert'));
			
			$output = $crud->render();
			//$this->pr($output);

            $content = $this->load->view('admin/teachers.php',$output,true);
            // Pass to the master view
            $this->load->view('admin/master', array('content' => $content));



		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
    
	

	function call_before_insert($post_array){
		
		$username = $post_array['name'];
		$password = 'password';
		$email = $post_array['email'];
		$additional_data = array(
				'first_name' => $post_array['name'],
				'phone' => $post_array['phone']
		);
		$group = array('3'); // Sets user to admin. No need for array('1', '2') as user is always set to member by default
		
		$user_id=$this->ion_auth->register($username, $password, $email,$additional_data,$group);
		if(!empty($user_id)){
		$post_array['user_id']=$user_id;
		}
		
		return $post_array;
	
	}




}