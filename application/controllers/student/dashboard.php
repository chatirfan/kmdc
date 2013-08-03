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
        $this->load->model('Schedules_Model','schedules');


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

        $start = date("Y-m-d 00:00:00",$_GET['start']);
        $end = date("Y-m-d 23:59:59",$_GET['end']);
        $batch_year = trim($_GET['batch_year']);
        $year = trim($_GET['year_id']);

        $timeStamp = strtotime($start);

        $actualYear= (int) $batch_year + (int) $year -1;

        //$result = $this->schedules->get_schedules($start,$end);
        $result = $this->schedules->get_schedulesByYear($actualYear);

        $returnArr = array();
        foreach($result  as $item){
            switch(strtolower($item['day'])){
                case 'sunday':{
                    $dayDate = mktime(0, 0, 0, date("m",$timeStamp)  , date("d",$timeStamp), date("Y",$timeStamp));
                    break;
                }
                case 'monday':{
                    $dayDate = mktime(0, 0, 0, date("m",$timeStamp)  , date("d",$timeStamp)+1, date("Y",$timeStamp));
                    break;
                }
                case 'tuesday':{
                    $dayDate = mktime(0, 0, 0, date("m",$timeStamp)  , date("d",$timeStamp)+2, date("Y",$timeStamp));
                    break;
                }
                case 'wednesday':{
                    $dayDate = mktime(0, 0, 0, date("m",$timeStamp)  , date("d",$timeStamp)+3, date("Y",$timeStamp));
                    break;
                }
                case 'thursday':{
                    $dayDate = mktime(0, 0, 0, date("m",$timeStamp)  , date("d",$timeStamp)+4, date("Y",$timeStamp));
                    break;
                }
                case 'friday':{
                    $dayDate = mktime(0, 0, 0, date("m",$timeStamp)  , date("d",$timeStamp)+5, date("Y",$timeStamp));
                    break;
                }
                case 'saturday':{
                    $dayDate = mktime(0, 0, 0, date("m",$timeStamp)  , date("d",$timeStamp)+6, date("Y",$timeStamp));
                    break;
                }
            }

            $km = array(
                'id' => $item['id'],
                'title' => $item['code']."\n". $item['course_name'],
                'start' => date('Y-m-d H:i:s', strtotime(date('Y-m-d', $dayDate).' '. date('H:i:s', strtotime($item['start_on'])))),
                'end'   => date('Y-m-d H:i:s', strtotime(date('Y-m-d', $dayDate).' '. date('H:i:s', strtotime($item['end_on'])))),
                'allDay' => false
            );

            $returnArr[] = $km;
        }

        echo json_encode($returnArr);
    }

    function noticeboard(){
        $user = $this->ion_auth->user()->row();
        $student = $this->students->get_student_row_by_userid($user->id);
        $studentInfo = $this->load->view('student/studentinfo', array('student'=> $student), true);

        $content = $this->load->view('student/noticeboard',array(),true);
        $this->load->view('student/master', array('studentInfo' => $studentInfo, 'content' => $content));
    }

}