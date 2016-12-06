<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-edit";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

$dutyadjustbutton= isset($_POST['adjustduty']);

if (isset($_GET) && !empty($_GET)) { //Check of er een GET is
  
    //Stel variabelen in
    $dutyID = $_GET["duty_id"];

    //Check of de duty bestaat
    if($calendar->checkDuty_ID($dutyID)) {
        
        //Gebruiker+duty bestaat, haal gegevens op>>>
        
        $start_timeDB = $calendar->GetDbValue($dutyID, 'start_time');
         $end_timeDB = $calendar->GetDbValue($dutyID, 'end_time');
        $dateDB= $calendar->GetDbvalue($dutyID, 'date');
         
        
     
        
        if(isset($_POST) && !empty($_POST)) {
        
            //Indien gepost, check post
            
            if(isset($_POST["start_time"]) && isset($_POST["end_time"]) && isset($_POST["date"]) ) {
            
            //Stel post variabelen in
            $post_start_timeDB = $_POST["start_time"];
            $post_end_timeDB = $_POST["end_time"];;
            $post_dateDB = $_POST["date"];
          
          
               
                
                //Rang edit check
                if($post_start_timeDB != $start_timeDB) {
                    $calendar->SetTheUpdateAvailability("$dutyID","start_time","$post_start_timeDB");
                    $start_timeDB = $post_start_timeDB;
                }
                
                if($post_end_timeDB != $end_timeDB) {
                    $calendar->SetTheUpdateAvailability("$dutyID", "end_time", "$post_end_timeDB");
                    $end_timeDB = $end_timeDB;
                }
                
                if($post_dateDB != $dateDB) {
                   $calendar->SetTheUpdateAvailability("$dutyID","date","$post_dateDB");
                    $dateDB = $postdateDB;
                }
               
                
            $_SESSION["successmsg"] = "Uw wijzigingen zijn succesvol doorgevoerd.";
            
            }
        
        }
        
    } else {
        
        //Gebruiker bestaat niet
        die("User does not exist."); //Stop met het laden van de pagina
        
    }
    
} else {
    
    //Indien geen variabele meegegeven
    die("Ongeldig paginaverzoek. Uw gegevens staan opgeslagen voor nader onderzoek."); //Stop met laden en geef een melding
    
}


if(isset($_SESSION["successmsg"])) {
    $successmsg = $_SESSION["successmsg"];
    print("<script src='../assets/js/noty/jquery.noty.js'></script><script type='text/javascript'>noty({text: '$successmsg', type: 'success', layout: 'top', theme: 'relax', timeout: 10000});</script>");
    unset($_SESSION["successmsg"]);
}

?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid" style="position: relative;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Adjust Time</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    
           <form class="form" action="" method="POST" style="width: 300px;">
               
                
                <p>
                
                <label for="inputFirstname">Starting Time</label><br />
                <input type="text" id="inputFirstname" class="form-control" placeholder="StartTime" value="<?php echo($start_timeDB); ?>" required name="start_time"><br />
                
                <label for="inputLastname">Ending Time</label><br />
                <input type="text" id="inputLastname" class="form-control" placeholder="EndTime" value="<?php echo($end_timeDB); ?>" required name="end_time"><br />
                
                <label for="inputAddress">Date</label><br />
                <input type="text" id="inputAddress" class="form-control" placeholder="Date" value="<?php echo($dateDB); ?>" required name="date"><br />
                
                </p>
                
                <button class="btn btn-lg btn-primary btn-right" backgroundcolor="grey" type="submit" name="adjustduty">Adjust</button><br />
                <p />
            </form>
                    
            <table border='1' style='position: absolute; left: 350px; top: 15%;'>
   
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->


<?php include("../inc/parts/staff-footer.php"); 

if ($dutyadjustbutton){
    
    print "<table style='background:green; color:white; '> <th>Record Modified!</th> </table>"
    
    ;
    
}


?>