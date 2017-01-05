<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-dashboard";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

 $uid = $_SESSION["uid"];
  
 $sending = 0;
  if(isset($_POST['free_submit']) && !empty($_POST['free_submit'])) {
      	
	if(!empty($_POST['start_date']) && !empty($_POST['end_date']) && !empty($_POST['start_time']) && !empty($_POST['end_time']) && !empty($_POST['comment'])){
	
		if($_POST['end_date'] < $_POST['start_date']){
			$sending = 3;
		}else{
		$userid = $uid;
		$start_date = $_POST["start_date"];
		$end_date = $_POST["end_date"];
		$start = $_POST['start_time'];
		$start_time = "$start:00";
		$end = $_POST['end_time'];
		$end_time = "$end:00";
		$comment = $_POST["comment"];
	
	
		$free->insert($userid, $start_date,$end_date,$start_time,$end_time,$comment); // insert the free form into the FREE table
		
		$sending = 1;
		}
}else{
	$sending = 2;
	
}
  }

if (isset($_POST['resultradiobox'])) {
    $resultradiobox = $_POST['resultradiobox'];
}

?>

<!--start gebruiker dashboard-->
 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<!--start admin dashboard-->
   <?php if ($user->Get($_SESSION["uid"], "rank_id") >= $permission->Get("menu_admin")) { ?>
            <!-- /.row -->
			<div class="row">
                <div class="col-lg-12">
                    <h3 class="panel-header">Administratie</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row"> 
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   
                                    <h3>Vrij<br>aanvragingen</h3>
                                </div>
                            </div>
                        </div>
                        <a href="freeapplications.php">
                            <div class="panel-footer">
                                <span class="pull-left">Zie Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>			
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                    <h3>Gedeclareerde<br>uren</h3>
                                </div>
                            </div>
                        </div>
                        <a href="admin_declaration.php">
                            <div class="panel-footer">
                                <span class="pull-left">Zie Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>          
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                    <h3>Gebruikers<br>toevoegen</h3>
                                </div>
                            </div>
                        </div>
                        <a href="addstaff.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                    <h3>Gebruikers-<br>gegevens</h3>
                                </div>
                            </div>
                        </div>
                        <a href="liststaff.php">
                            <div class="panel-footer">
                                <span class="pull-left">Zie Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>		
            </div>
			<?php } ?>
			<!-- Eind admin dashboard-->
			<div class="row">
                <div class="col-lg-12">
                    <h3 class="panel-header">Eigen gegevens</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                    <h3>Beschikbaarheid<br>doorgeven</h3>
                                </div>
                            </div>
                        </div>
                        <a href="availability.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                    <h3>Uren<br>declareren</h3>
                                </div>
                            </div>
                        </div>
                        <a href="declaration.php">
                            <div class="panel-footer">
                                <span class="pull-left">Zie Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-key fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   
                                    <h3>Wijzig<br>wachtwoord</h3>
                                </div>
                            </div>
                        </div>
                        <a href="passwordchange.php">
                            <div class="panel-footer">
                                <span class="pull-left">Zie Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-android fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                    <h3>Gebruikers-<br>profiel</h3>
                                </div>
                            </div>
                        </div>
                        <a href="gebruikersprofiel.php">
                            <div class="panel-footer">
                                <span class="pull-left">Zie Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>		
            </div>
			<!-- start free && calender -->
			<div class="row">
				<div class="col-sm-4">
				<form method="POST">
						
						<div class="col-sm-12">
						<h1>Vrij vragen</h1>
						</div>
						<div class="col-sm-12 form-group">
                            Van:<span style="color:red;"> *</span>
                            <div class="input-group date datepicker" data-provide="datepicker">
                                <input type="date" name="start_date"class="form-control" placeholder="yyyy-mm-dd" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                        </div>
						<div class="col-sm-12 form-group">
                            Tot:<span style="color:red;"> *</span>
                            <div class="input-group date datepicker" data-provide="datepicker">
                                <input type="date" name="end_date"class="form-control" placeholder="yyyy-mm-dd" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            Begintijd:<span style="color:red;"> *</span>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="start_time" class="form-control" placeholder="00:00" value="" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            Eindtijd:<span style="color:red;"> *</span>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="end_time"class="form-control" placeholder="00:00" value="" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
							
                        </div>
						<div class="col-sm-12 form-group">
                            Reden:<span style="color:red;"> *</span>
                            <textarea class="form-control" id="comment" name="comment" placeholder="Reden"  value="" rows="10" requierd></textarea>
                        </div>
						
						
                        <div class="col-sm-6 form-group">
                        <button class="btn btn-lg btn-primary btn-right" backgroundcolor="blue" type="submit" name="free_submit" value="verzend">Verzenden</button><br />
                        </div>
						<div class="col-sm-12 form-group">
							Alles met een <span style="color:red;">*</span> is een verplicht veld.
						</div>
						<?php if ($sending == 1) { ?>
						<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-success alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">Uw vrij aanvraag is verzonden.</span>
                        </div>
						<?php } ?>
						<?php if ($sending == 2) { ?>
						<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">Uw vrij aanvraag is niet verzonden, probeer het opnieuw.</span>
                        </div>
						<?php } ?>
						<?php if ($sending == 3) { ?>
						<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">Uw vrij aanvraag is niet verzonden, de eind datum begint voor de start datum.</span>
                        </div>
						<?php } ?>
									
                        </form>
                        </div>
                        <!-- end free -->  
                        
                        <!-- start calender -->  
                        <div class="col-sm-8">
                            <h1>Kalender</h1>
                         <div class="container-fluid" style="position: relative;">
                        <div id='calendar'  ></div><br />
                        <!--                roept de calender aan-->
                         </div>
                        </div>
			<!-- end calender -->
                        
			
         </div>

   <!--eind gebruiker dashboard-->
 </div>
 <!-- /.page wrapper --> 		
<?php
include("../inc/parts/staff-footer.php");
?>

