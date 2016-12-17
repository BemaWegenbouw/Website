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
                        <h1 class="page-header">Verwijder Geplande Dienst</h1>
                    </div>
                  <style>
.deleteno{color: white;}
</style>
                    
                  
                    
                      <?php $uidd = $_GET["uid"];
                           $datee =$_GET["date"];
                      


$calendar->ShowDeleteData($uidd,$datee);
                     
                 
                      
                      ?>
                    <h3 style='color:#0066ff;'>Weet u het zeker om deze record te verwijderen?</h3>
                    <form method="post" action='<?php if(isset($_POST['yesdeleteit'])){print "planning-hours.php";} ?>'>
                        <a href="planning-hours.php"><button class="btn btn-lg btn-primary btn-right" backgroundcolor="white" type="submit" name="yesdeleteit">  <?php  if(isset($_POST['yesdeleteit'])){print "ga terug";}else {print "ja";}  ?></button> </a> 
                             <button class="btn btn-lg btn-primary btn-right" backgroundcolor="white" type="submit" name="nodonotdeleteit">  <a style='color:white;'  href="planning-hours.php"> <?php  if(isset($_POST['yesdeleteit'])){print "ga terug";}else{print "nee";}  ?></a></button>
                           
                            

 
                    </form>
                    
                   
                    
                    
                   <?php 
             
               
                   if(isset($_POST['yesdeleteit'])){
                      print "<br><br>Succesvol! Druk op iets om terug te gaan";
                    $calendar->DeletePlannedHour($_GET["uid"], $_GET["date"]);
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