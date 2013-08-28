<?php
$html =  "";
foreach($list as $item){
    $html .= '<div class="job-cat">
                <ul>
                <li>Code : '.$item['code'].'</li>
                <li>Course : '.$item['name'].'</li>
                <li>Department : '.$item['department'].'</li>
                <li>Description : '.$item['description'].'</li>
                <li>Year : '.$item['year'].'</li>
                <li>Section : '.$item['section'].'</li>
                <li>Detail : '.anchor('student/courses/view/'. $item['assign_course_id'] , 'click here').'</li>
                </ul>
            </div>';
}
echo $html;
?>
