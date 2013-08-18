<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

    function __construct()
    {


        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('common_helper');

        $this->load->library('grocery_CRUD');
        $this->load->library('ion_auth');
        $this->load->library('form_validation');

        $this->load->model('Sections_Model','sections');
        $this->load->model('Years_Model','years');
        $this->load->model('Students_Model','students');
        $this->load->model('Courses_Model','courses');
        $this->load->model('Assign_Course_Model','assign_courses');


        if (!$this->ion_auth->logged_in())
        {
            ci_redirect('authenticate/login');
        }
    }

    function index()
    {
        $user = $this->ion_auth->user()->row();
        $student = $this->students->get_student_row_by_userid($user->id);
        $year_dropdown = $this->years->get_studentsyear_dropdown($student['year_id']);

        $studentInfo = $this->load->view('student/studentinfo', array('student'=> $student), true);
        // Pass to the master view
        $content = $this->load->view('student/course', array('year' => $year_dropdown), true);

        $this->load->view('student/master', array('studentInfo' => $studentInfo , 'content'=> $content));
    }

    function list_all($year,$section,$student_id){
        $courseList = $this->courses->get_all_courses($year,$section,$student_id);

        $this->load->view('student/courselist',array('list'=> $courseList));
    }

    function view(){

        $courseId = $this->uri->segment(4);

        if($courseId==0){
            ci_redirect('student/courses');
        }

        // Get Course Detail
        $course = $this->courses->get_course($courseId);
        if($course==null){
            ci_redirect('student/courses');
        }

        $courseAssignments = $this->assign_courses->get_assigned_course($courseId);

        $user = $this->ion_auth->user()->row();
        $student = $this->students->get_student_row_by_userid($user->id);
        $studentInfo = $this->load->view('student/studentinfo', array('student'=> $student), true);


        $content = $this->load->view('student/coursedetail', array('course' => $course, 'course_assignments'=> $courseAssignments), true);

        $this->load->view('student/master', array('studentInfo' => $studentInfo , 'content'=> $content));
    }



}