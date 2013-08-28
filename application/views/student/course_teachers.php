        <h1>Course Teachers</h1>
        <?php
            $html = "";
            foreach($course_assignments as $assignment) {
                $html .= "<ul>".
                    "<li><h1>". $assignment['name'] ."</h1></li>".
                    "<li><h1>Designation:</h1>". $assignment['designation'] ."</li>".
                    "<li><h1>Code:</h1>". $assignment['teacher_id'] ."</li>".
                    "<li><h1>Email:</h1>". $assignment['email'] ."</li>".
                    "<li><h1>Phone:</h1>". $assignment['phone'] ."</li>".
                    "</ul>";
            }
        echo $html;
        ?>
