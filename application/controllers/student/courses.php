<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

    function __construct()
    {


        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('ion_auth');
        $this->load->model('Sections_Model','sections');
        $this->load->model('Years_Model','years');
        $this->load->model('Groups_Model','groups');



        if (!$this->ion_auth->logged_in())
        {
            ci_redirect('authenticate/login');
        }
    }

    function index()
    {
        $user = $this->ion_auth->user()->row();
        $content = $this->load->view('student/dashboard',$user, true);
        // Pass to the master view
        $this->load->view('student/master', array('content' => $content));
    }







}