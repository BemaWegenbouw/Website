
<meta charset='utf-8' />
<link href='fullcalendar.css' rel='stylesheet' />
<link href='fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='fullcalendar.min.js'></script>
<script>

    $(document).ready(function () {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            defaultDate: '        <?php print date("Y-m-d"); ?>',
            navLinks: true, // can click day/week names to navigate views

            weekNumbers: true,
            weekNumbersWithinDays: true,
            weekNumberCalculation: 'ISO',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
<?php
$calendar->CalendarView($uid);
?>
                {
                    title: 'een dienst',
                    start: '2016-11-29T10:30',
                    end: '2016-11-29T12:30'
                }
            ]
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
