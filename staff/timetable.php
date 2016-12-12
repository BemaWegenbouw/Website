<!DOCTYPE html>
<html>
    <?php
//Bema Wegenbouw BV Website
//Copyright 2016

    $page = "staff-calendar";
   
    require_once("../inc/engine.php"); //voegt de controllers toe
    include("../inc/parts/staff-header.php");

    $uid = $_SESSION["uid"];
    ?>

    <body>
        <div id="page-wrapper" class="col-sm-14">
            <div class="container-fluid" style="position: relative;">
                <div id='calendar'  ></div><br />
                <!--                roept de calender aan-->
                <div align="center"><?php $calendar->GetAvailability($uid); ?></div>
                <!--                vraagt de huidige beschikbaarheid op-->
                <br />
                <div align="center"> <form method="post" action="calendar-process.php">



                        Begintijd <input type="text"     name="start_time"        value="08:00">
                        Eindtijd <input type="text"      name="end_time"  value="09:00">
                        date <input type="date" name="workingdate"  >
                        <input type="submit"             name="knopcalendar"        value="verstuur">  </form> </div>
                <!--                        dit is het invoerformulier voor nieuwe uren-->
                <br />
            </div>
        </div>
    </div>
</body>
</html>
