<div class="box">
        <h2>Student Profile</h2>
        <table>
            <tr>
                <td>Batch</td>
                <td><?php echo $student['batch_year'];?></td>
            </tr>
            <tr>
                <td>Session</td>
                <td><?php echo $student['year'];?></td>
            </tr>
            <tr>
                <td>Section</td>
                <td><?php echo $student['section'];?></td>
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