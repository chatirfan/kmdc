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

        $student =  $this->students->get_student_row_by_userid($user->id);
        $studentInfo = $this->load->view('student/studentinfo', array('student'=> $student), true);
        // Pass to the master view
        $this->load->view('student/master', array('studentInfo' => $studentInfo));
	}


    function schedule(){


        $user = $this->ion_auth->user()->row();

        $student = $this->students->get_student_row_by_userid($user->id);
        $studentInfo = $this->load->view('student/studentinfo', array('student'=> $student), true);
        // Pass to the master view
        $content = $this->load->view('student/schedule', array(),true);
        $this->load->view('student/master', array('studentInfo' => $studentInfo, 'content' => $content));
    }

    function get_schedule(){

        $start = date("Y-m-d H:i:s",$_GET['start']);
        $end = date("Y-m-d H:i:s",$_GET['end']);



        $item = array(
            'id' => 999,
            'title' => 'Repeating Event GOOGLE DOOGEL',
            'start' => '2013-07-30 14:00',
            'allDay' => false
        );
        echo json_encode(array($item));
    }


}