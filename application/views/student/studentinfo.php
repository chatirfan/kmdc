<div class="box">
        <h2>Student Profile</h2>
        <table>
            <tr>
                <td>Batch</td>

                <td><?php echo $student['batch_year'];?>
                    <input type="hidden" id="batch_year" value="<?php echo $student['batch_year'];?>">
                    <input type="hidden" id="student_id" value="<?php echo $student['id'];?>">

                </td>
            </tr>
            <tr>
                <td>Session</td>
                <td><?php echo $student['year'];?>
                    <input type="hidden" id="year_id" value="<?php echo $student['year_id'];?>">
                </td>
            </tr>
            <tr>
                <td>Section</td>
                <td><?php echo trim($student['section']);?>
                    <input type="hidden" id="section_id" value="<?php echo $student['section_id'];?>">
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo $student['name'];?></td>
            </tr>
            <tr>
                <td>Role Number</td>
                <td><?php echo $student['role_number'];?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $student['email'];?></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><?php echo $student['dob'];?></td>
            </tr>
        </table>
    </div>
<div class="box">
    <h2>To do List</h2>
    <ul>
        <li><a href='' >Course Syllabus</a></li>
        <li><a href='' >Assignments</a></li>
        <li><a href='' >Schedules</a></li>
    </ul>
</div>