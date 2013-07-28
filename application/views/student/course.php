<?php
/**
 * Created by JetBrains PhpStorm.
 * User: irfan
 * Date: 7/27/13
 * Time: 11:46 AM
 * To change this template use File | Settings | File Templates.
 */
?>

<div>
    <div id="header">
        <div>Year: <?php echo  $year; ?></div>
        <div id="courseList"></div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        getCourses();
    });

    function getCourses(){

        var year = $('#year_id').val();
        var section = $('#section_id').val();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('student/courses/list_all'); ?>/"+ year + "/"+ section,
            dataType: "html",
            success: function(data) {
                $('#courseList').html(data);
            }
        })
    }


</script>