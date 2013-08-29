<?php
/**
 * Created by JetBrains PhpStorm.
 * User: irfan
 * Date: 8/5/13
 * Time: 5:45 AM
 * To change this template use File | Settings | File Templates.
 */

?>
<style>
    table {width: 100%;}
    #lecture {width: 100%; border: 1px solid black;border-collapse:collapse; }
    #lecture td {border-collapse:collapse;width: 100%; border: 1px solid black; }
</style>

<div class="floatleft" style="width:635px;">
<h3>Course</h3>
    <?php
        $html =  "";
            $html .= "<table>".
                "<tr><td>Code: </td><td>". $course->code ."</td></tr>".
                "<tr><td>Course: </td><td> ". $course->name."</td></tr>".
                "<tr><td>Department: </td><td>". $course->department ."</td></tr>".
                "<tr><td>Description: </td><td>". $course->description ."</td></tr>".
                "<tr><td>Year: </td><td>". $course->year ."</td></tr>".
                "<tr><td>Section: </td><td>". $course->section ."</td></tr>".
                "</table>";
    echo $html;
    ?>
</div>
<!--<div class="floatleft" style="width:300px;">-->
<!--    <div class="box">-->
<!--        <h2>Teachers</h2>-->
<!--        --><?php
//            $html = "";
//            foreach($course_assignments as $assignment) {
//                $html .= "<table>".
//                    "<tr><td colspan='2'><h6>". $assignment['name'] ."</h6></td></tr>".
//                    "<tr><td>Designation:</td><td>". $assignment['designation'] ."</td></tr>".
//                    "<tr><td>Code:</td><td>". $assignment['teacher_id'] ."</td></tr>".
//                    "<tr><td>Email:</td><td>". $assignment['email'] ."</td></tr>".
//                    "<tr><td>Phone:</td><td>". $assignment['phone'] ."</td></tr>".
//                        "</table>";
//        }
//        echo $html;
//        ?>
<!--    </div>-->
<!--</div>-->
<div class="floatleft" >
    <h3>Lectures</h3>
    <?php

    $html = "<table id='lecture'>".
        "<tr><td style='width:200px'>Topic</td><td style='width:200px'>Description</td><td style='width:80px'>Lecture Date</td><td style='width:40px'>PPT</td><td style='width:40px'>Audio</td></tr>";

    if(!empty($lectures)){
        foreach($lectures as $lecture) {
            $lec_file = "";
            if(!empty($lecture->uploaded_file)) {
                $lec_file = "<a href='".site_url(UPLOAD_LECTURES_FILE.'/'. $lecture->uploaded_file)."'>". $lecture->uploaded_file ."</a>";
            }
            $lec_audiofile = "";
            if(!empty($lecture->uploaded_audio)){
                $lec_audiofile = "<a href='".site_url(UPLOAD_LECTURES_AUDIO.'/'. $lecture->uploaded_audio)."'>". $lecture->uploaded_audio ."</a>";
            }

            $html .= "<tr><td style='width:200px'>". $lecture->topic ."</td><td style='width:200px'>". $lecture->topic_desc ."</td><td style='width:80px'>". $lecture->lecture_date ."</td><td style='width:40px'>". $lec_file ."</td><td style='width:40px'>". $lec_audiofile ."</td></tr>";
        }
    }else{
            $html .= "<tr><td colspan='5'>No lectures uploaded</td></tr>";
    }

    $html .= "</table>";

    echo $html;
    ?>
</div>

