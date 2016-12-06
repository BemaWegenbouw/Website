<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-blank";
require_once("../inc/engine.php");

?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Availability</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <?php 
                     $uid = $_SESSION["uid"];
                    $calendar->GetAvailability($uid); ?>
                     <?php
                     
                    
$start_time=($_POST["start_time"]);
$end_time=  ($_POST["end_time"]);
$knopcalendar=  ($_POST['knopcalendar']);
$workingdate= ($_POST['workingdate']);
print $knopcalendar;
if ($knopcalendar){
    $eenvagegetal=1;
  
    
}


$calendar->InsertAvailability($uid, $start_time, $end_time , $workingdate);






?>
                    <a href="timetable.php">go back to the availability-page</a>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php

include("../inc/parts/staff-footer.php");