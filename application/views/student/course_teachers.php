        <h1>Course Teachers</h1>
        <?php
            $html = "";
            foreach($course_assignments as $assignment) {
                $html .= "<table width='100%'>".
                    "<tr><td colspan='2'><h4>". $assignment['name'] ."</h4></td></tr>".
                    "<tr><td>Designation:</td><td>". $assignment['designation'] ."</td></tr>".
                    "<tr><td>Code:</td><td>". $assignment['teacher_id'] ."</td></tr>".
                    "<tr><td>Email:</td><td>". $assignment['email'] ."</td></tr>".
                    "<tr><td>Phone:</td><td>". $assignment['phone'] ."</td></tr>".
                    "</table>";
            }
        echo $html;
        ?>
