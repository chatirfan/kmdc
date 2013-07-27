<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{   
		
		
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('grocery_CRUD');
		$this->load->library('ion_auth');
		$this->load->library('Phpbb_bridge');
        $this->load->helper('common_helper');
        $this->load->model('Sections_Model','sections');
		$this->load->model('Years_Model','years');
        $this->load->model('Students_Model','students');
        $this->load->model('Groups_Model','groups');
		
		if (!$this->ion_auth->logged_in())
		{
			ci_redirect('authenticate/login');
		}

	}

	function index()
	{
		$user = $this->ion_auth->user()->row();
        $objStudent = new Students_Model();
        $student = $objStudent->get_student_row_by_userid($user->id);
        $studentInfo = $this->load->view('student/studentinfo', array('student'=> $student), true);
        // Pass to the master view
        $this->load->view('student/master', array('studentInfo' => $studentInfo));
	}







}