<!DOCTYPE html>
<html>
    <head>
         <?php                            
 $page = "staff-calendarengine";
require_once("../../inc/engine.php");



                      $uid = $_SESSION["uid"];

  
       ?>
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
                    defaultDate: '        <?php print date("Y-m-d");?>',
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
                            title: 'een dienst' ,
                            start: '2016-11-29T10:30',
                            end: '2016-11-29T12:30'
                        },
                      
                      
                      
                      
                       
                     
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


            .input {
    position: absolute;
    left:150px;
    top:100px;
    z-index: -1;}
    
                
            
        </style>
    </head>
    <body>

       
        
        <div id='calendar' class='fc fc-unthemed fc-ltr'></div>

      
       
    </body>
</html>
