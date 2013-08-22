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
<div class="floatleft" style="width:300px;">
    <div class="box">
        <h2>Teachers</h2>
        <?php
            $html = "";
            foreach($course_assignments as $assignment) {
                $html .= "<table>".
                    "<tr><td colspan='2'><h6>". $assignment['name'] ."</h6></td></tr>".
                    "<tr><td>Designation:</td><td>". $assignment['designation'] ."</td></tr>".
                    "<tr><td>Code:</td><td>". $assignment['teacher_id'] ."</td></tr>".
                    "<tr><td>Email:</td><td>". $assignment['email'] ."</td></tr>".
                    "<tr><td>Phone:</td><td>". $assignment['phone'] ."</td></tr>".
                        "</table>";
        }
        echo $html;
        ?>
    </div>
</div>
<div class="floatleft" style="width:635px;">
    <h3>Lectures</h3>
    <?php
    $html = "<table>".
        "<tr><td>Topic</td><td>Topic Desc</td><td>Lecture Date</td><td>PPT</td><td>Audio</td></tr>";
    foreach($lectures as $lecture) {
           $html .= "<tr><td>". $lecture->topic ."</td><td>". $lecture->topic_desc ."</td><td>". $lecture->lecture_date ."</td><td>". $lecture->uploaded_file ."</td><td>". $lecture->uploaded_audio ."</td></tr>";
    }
    $html .= "</table>";

    echo $html;
    ?>
</div>

