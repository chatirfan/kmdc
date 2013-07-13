<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students extends CI_Controller {

	function __construct()
	{   
		
		
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('grocery_CRUD');
		$this->load->library('ion_auth');
		$this->load->library('phpbb_bridge');
		$this->load->model('Sections_Model','sections');
		$this->load->model('Teachers_Model','teachers');
		$this->load->model('Years_Model','years');
		$this->load->model('Groups_Model','groups');
		
		
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
		//$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}



	function view()
	{		
		

		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('user_student');
			$crud->set_subject('Students');
			$crud->required_fields('city');
			
			$crud->columns('student_id','name','email','father_name','address','religion','phone','role_number','batch_year','section_id','year_id');
			
			/*used to display fields when adding items*/
			$crud->fields('user_id','name','student_id','email','father_name','address','religion','phone','role_number','batch_year','section_id','year_id');
			
			/*hidding a field for insertion via call_before_insert crud requires field to be present in Crud->fields*/
			$crud->change_field_type('user_id','invisible');
			
			/*Generating dropdwons for year section and course status*/
			//	$crud->callback_add_field('status',array($this,'status_dropdown'));
			$crud->callback_add_field('section_id',array($this->sections,'get_sections_dropdown'));
			$crud->callback_add_field('year_id',array($this->years,'get_years_dropdown'));
			
			/*hidding a field for insertion via call_before_insert crud requires field to be present in Crud->fields*/
			//$crud->change_field_type('created_by','invisible');
			
			/*used to change names of the fields*/
			$crud->display_as('student_id','Student Id');
			$crud->display_as('name','Name');
			$crud->display_as('email','Email');
			$crud->display_as('father_name','Fathers Name');
			$crud->display_as('address','Address');
			$crud->display_as('religion','Religion');
			$crud->display_as('role_number','Roll #');
			$crud->display_as('batch_year','Batch');
			$crud->display_as('section_id','Section');
			$crud->display_as('year_id','Year');
			
			
			/*call back for edit form->passes value attribute with items value to the function*/
			$crud->callback_edit_field('section_id',array($this->sections,'get_sections_dropdown'));
			$crud->callback_edit_field('year_id',array($this->years,'get_years_dropdown'));
			
			
			/*callback for table view */
			$crud->callback_column('section_id',array($this->sections,'get_section_by_id'));
			$crud->callback_column('year_id',array($this->years,'get_year_by_id'));
			//$crud->callback_column('group_id',array($this->groups,'get_group_by_id'));
			
			//creating a user before creation of student
			$crud->callback_before_insert(array($this,'call_before_insert'));
			//deleting user from forum_users and users table
			$crud->callback_before_delete(array($this,'call_before_delete'));
			
			$output = $crud->render();
			//$this->pr($output);


			$this->load->view('admin/students.php',$output);

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
				'last_name' => $post_array['name'],
				'phone' => $post_array['phone']
		);
		
		/****Adding a user to PhpBB forum *****/
		//inserts user to forum_users table in PhpBB
		$forum_user_id=$this->phpbb_bridge->user_add($email,$username,$password);
		
		$group = array('2'); // Sets user to admin. No need for array('1', '2') as user is always set to member by default
		
		$user_id=$this->ion_auth->register($username, $password, $email, $additional_data, $group);
		if(!empty($user_id)){
		$post_array['user_id']=$user_id;
		}
		return $post_array;
		
		
		
	
	}
	
function call_before_delete($user_teacher_id){
		
		//getting forums users id 
		$user_teacher_row=$this->teachers->get_teacher_row($user_teacher_id);
		$forum_id=$user_teacher_row->forum_id;
		$user_id=$user_teacher_row->user_id;
		
		if($forum_id > 0){  //default value of forum id in db is 0
			
			/*deletes the user from phpbb forum*/
			$this->phpbb_bridge->user_delete($forum_id);
		}
		

		/*deletes user from users table Ion_auth*/
		$this->ion_auth->delete_user($user_id);
	}




}