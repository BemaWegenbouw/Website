<!DOCTYPE html>
<html>
    <head>
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
                    defaultDate: '2016-09-12',
                    navLinks: true, // can click day/week names to navigate views

                    weekNumbers: true,
                    weekNumbersWithinDays: true,
                    weekNumberCalculation: 'ISO',
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: [
                        {
                            title: 'All Day Event',
                            start: '2016-09-01'
                        },
                        {
                            title: 'Long Event',
                            start: '2016-09-07',
                            end: '2016-09-10'
                        },
                        {
                            id: 999,
                            title: 'Repeating Event',
                            start: '2016-09-09T16:00:00'
                        },
                        {
                            id: 999,
                            title: 'Repeating Event',
                            start: '2016-09-16T16:00:00'
                        },
                        {
                            title: 'Conference',
                            start: '2016-09-11',
                            end: '2016-09-13'
                        },
                        {
                            title: 'Meeting',
                            start: '2016-09-12T10:30:00',
                            end: '2016-09-12T12:30:00'
                        },
                        {
                            title: 'Lunch',
                            start: '2016-09-12T12:00:00'
                        },
                        {
                            title: 'Meeting',
                            start: '2016-09-12T14:30:00'
                        },
                        {
                            title: 'Happy Hour',
                            start: '2016-09-12T17:30:00'
                        },
                        {
                            title: 'Dinner',
                            start: '2016-09-12T20:00:00'
                        },
                        {
                            title: 'Birthday Party',
                            start: '2016-09-13T07:00:00'
                        },
                        {
                            title: 'Click for Google',
                            url: 'http://google.com/',
                            start: '2016-09-28'
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

            #calendar {
                width: 100%; border: none; overflow-y: auto; overflow-x: hidden; position:relative; height: 100%;
                margin: 0 auto;
                -ms-transform: scale(1.2);
                -moz-transform: scale(1.2);
                -o-transform: scale(1.2);
                -webkit-transform: scale(1.2);
                transform: scale(0.70);

                -ms-transform-origin: 0 0;
                -moz-transform-origin: 0 0;
                -o-transform-origin: 0 0;
                -webkit-transform-origin: 0 0;
                transform-origin: 0 0;} 


        </style>
    </head>
    <body>

        <div id='calendar' class='fc fc-unthemed fc-ltr'></div>

    </body>
</html>
