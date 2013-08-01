<?php
/**
 * Created by JetBrains PhpStorm.
 * User: irfan
 * Date: 7/28/13
 * Time: 1:41 PM
 * To change this template use File | Settings | File Templates.
 */

class Schedules_Model  extends CI_Model  {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('form');
    }

    function get_schedules($start,$end){

        $query = $this->db->query('SELECT s.*,c.code,c.name as course_name,t.name as teacher_name
                                  FROM schedules as s
                                  INNER JOIN assign_course as ac on s.assignment_id = ac.id
                                  INNER JOIN courses as c on c.id = ac.course_id
                                  INNER JOIN user_teacher as t on t.user_id = ac.assigned_to
                                  WHERE s.start_on > ? AND s.end_on < ?
                                  ', array($start, $end));

        $ret = $query->result_array();
        return $ret;
    }

    function get_schedulesByYear($year){
        $query = $this->db->query('SELECT s.*,c.code,c.name as course_name,t.name as teacher_name
                                  FROM schedules as s
                                  INNER JOIN assign_course as ac on s.assignment_id = ac.id
                                  INNER JOIN courses as c on c.id = ac.course_id
                                  INNER JOIN user_teacher as t on t.user_id = ac.assigned_to
                                  WHERE ac.batch_year = ?
                                  GROUP BY s.day,s.start_on
                                  ', array($year));
        $ret = $query->result_array();
        return $ret;
    }
}


?>