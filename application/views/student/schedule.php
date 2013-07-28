<?php
/**
 * Created by JetBrains PhpStorm.
 * User: irfan
 * Date: 7/28/13
 * Time: 11:14 AM
 * To change this template use File | Settings | File Templates.
 */
?>

<link rel='stylesheet' href='<?php echo site_url("css/fullcalendar/theme.css");?>' />
<link href='<?php echo site_url("css/fullcalendar/fullcalendar.css");?>' rel='stylesheet' />
<script src='<?php echo site_url("js/fullcalendar/jquery-1.9.1.min.js");?>'></script>
<script src='<?php echo site_url("js/fullcalendar/jquery-ui-1.10.2.custom.min.js");?>'></script>
<script src='<?php echo site_url("js/fullcalendar/fullcalendar.min.js");?>'></script>
<script>

    $(document).ready(function() {

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
            theme: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: ''
            },
            allDaySlot: false,
            defaultView:'agendaWeek',
            weekends: false,
/*            hiddenDays:[7],*/
            editable: false,
            minTime: 8,
            maxTime: 18,
            events: {
                url: '<?php echo site_url('student/dashboard/get_schedule'); ?>',
                cache: true
            }
            /*events: [
                {
                    id: 999,
                    title: 'Repeating Event GOOGLE DOOGEL',
                    start: '2013-07-30 14:00',
                    allDay: false
                },]*/
/*                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d+4, 16, 0),
                    allDay: false
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d+1, 10, 30),
                    allDay: false
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d+1, 15, 0),
                    end: new Date(y, m, d+1, 16, 0),
                    allDay: false
                }

               *//* {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/'
                }*//*
            ]*/
        });

    });

</script>
<style>
    #calendar {
        width: 700px;
        /*margin: 0 auto;*/
        text-align: center;
        font-size: 13px;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    }
</style>

<div id='calendar'></div>