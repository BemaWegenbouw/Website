<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-blank";
require_once("../inc/engine.php");

$uid = $_SESSION["uid"];

?>
        <!-- Page Content -->
       
                        
               <?php  
               
               $knopavailability = $_POST["knopavailability"];
               
               $start_time_monday = $_POST["starttimemonday"];
               $end_time_monday = $_POST["endtimemonday"];
               
                 $start_time_tuesday = $_POST["starttimetuesday"];
               $end_time_tuesday = $_POST["endtimetuesday"];
               
                 $start_time_wednesday = $_POST["starttimewednesday"];
               $end_time_wednesday = $_POST["endtimewednesday"];
               
               $start_time_thursday = $_POST["starttimethursday"];
               $end_time_thursday = $_POST["endtimethursday"];
               
               $start_time_friday = $_POST["starttimefriday"];
               $end_time_friday = $_POST["endtimefriday"];               
                             
               $start_time_saturday = $_POST["starttimesaturday"];
               $end_time_saturday = $_POST["endtimesaturday"];    
               
               $start_time_sunday = $_POST["starttimesunday"];
               $end_time_sunday = $_POST["endtimesunday"];  
               
               
           
                
                  if ($knopavailability){
                   $calendar->SetTheUpdateAvailability($uid, $start_time_monday, $end_time_monday, 'maandag');
                   $calendar->SetTheUpdateAvailability($uid, $start_time_tuesday, $end_time_tuesday, 'dinsdag');
                   $calendar->SetTheUpdateAvailability($uid, $start_time_wednesday, $end_time_wednesday, 'woensdag');
                   $calendar->SetTheUpdateAvailability($uid, $start_time_thursday, $end_time_thursday, 'donderdag');
                   $calendar->SetTheUpdateAvailability($uid, $start_time_friday, $end_time_friday, 'vrijdag');
                   $calendar->SetTheUpdateAvailability($uid, $start_time_saturday, $end_time_saturday, 'zaterdag');
                  $calendar->SetTheUpdateAvailability($uid, $start_time_sunday, $end_time_sunday, 'zondag');      }             
                   
               
            
               
               
               ?>
                        
               

<?php

include("../inc/parts/staff-footer.php");

?>