<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-calendar";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");



$uid = $_SESSION["uid"];
//$calendar->SetStartTime($uid, '2016-11-24', '10:00');




?>




<!-- /.row -->
<div id="page-wrapper" class="col-sm-12">
    <iframe src="calendar/timetableengine.php" frameborder="0" marginheight="0" marginwidth="0" scrolling="no"></iframe> 

<?php $calendar->GetAvailability($uid);  ?>
    <!-- /.col-lg-12 -->
    <div> <form method="post" action="calendar-process.php">
        
          
      Begintijd <input type="text"     name="start_time"        value="08:00">
      Eindtijd <input type="text"      name="end_time"  value="09:00">
        date <input type="date" name="workingdate"  >
        <input type="submit"             name="knopcalendar"        value="verstuur">  </form> </div> 
    
    
    <?php   
  
     
//       if (isset($knopcalendar)){

    
    
    include("../inc/parts/staff-footer.php");
    