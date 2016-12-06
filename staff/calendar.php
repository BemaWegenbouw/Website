<?php
$page = "staff-calendarengine";
require_once("../inc/engine.php");
$uid = $_SESSION["uid"];
?>

<meta charset='utf-8' />
<link href='calendar/fullcalendar.css' rel='stylesheet' />
<link href='calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='calendar/lib/moment.min.js'></script>
<script src='calendar/lib/jquery.min.js'></script>
<script src='calendar/fullcalendar.min.js'></script>
<script src='calendar/fullcalendar.js'></script>
<script src='calendar/locale/nl.js'></script>
<script>

    $(document).ready(function () {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listMonth'
            },
            defaultDate: '<?php print date("Y-m-d"); ?>',
            navLinks: true, // can click day/week names to navigate views
            businessHours: true, // display business hours
            editable: false,
            events: [
<?php
$calendar->CalendarView($uid);
?>]
        });

    });

</script>
<style>

    body {
        margin: 40px 10px;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 18px;
    }







</style>