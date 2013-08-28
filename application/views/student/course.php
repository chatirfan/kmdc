<h1>Courses</h1>
<div>Year: <?php echo  $year; ?></div>
<div>
    <div id="courseList"></div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        getCourses();
    });

    function getCourses(){

        var year = $('#year_id').val();
        var section = $('#section_id').val();
        var student_id = $('#student_id').val();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('student/courses/list_all'); ?>/"+ year + "/"+ section+ "/"+ student_id,
            dataType: "html",
            success: function(data) {
                $('#courseList').html(data);
            }
        })
    }


</script>