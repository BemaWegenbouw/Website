<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-delete";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Delete Availability</h1>
                    </div>
                  <style>
.deleteno{color: white;}
</style>
                    
                  
                    
                      <?php  $dutyID = $_GET["duty_id"];
$calendar->ShowAvailability($dutyID);

$yesdeletebottonavailability=isset($_POST['yesdeleteit']);

                     
                 
                      
                      ?>
                    <h3 style='color:#0066ff;'>Are you sure to delete this availability?</h3>
                    <form method="post" action=''>
                    <button class="btn btn-lg btn-primary btn-right" backgroundcolor="grey" type="submit" name="yesdeleteit"><a class="deleteno" href="timetable.php">Yes</a></button> 
                    <button class="btn btn-lg btn-primary btn-right" backgroundcolor="grey" type="submit" name="nodonotdeleteit"><a class="deleteno" href="timetable.php">No</a></button> 
                    </form>
                    
                   
                    
                    
                   <?php 
                   
                   if(isset($yesdeletebottonavailability)){
                       
                       $calendar->DeleteDutyID($dutyID);
                       //execute functie
                   }
                   
                   
                   
                   
                   
                   
                   ?>
                    
                    
                    
                    
                    
                    
                    
                    <!-- /.col-lg-12 -->
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