<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-dashboard";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

 $uid = $_SESSION["uid"];
  
  $sending = '';
  if(isset($_POST) && !empty($_POST)) {
       
		$userid = $uid;
		$start_date = $_POST["start_date"];
		$end_date = $_POST["end_date"];
		$start = $_POST['start_time'];
		$start_time = "$start:00";
		$end = $_POST['end_time'];
		$end_time = "$end:00";
		$comment = $_POST["comment"];
	
		$free->insert($userid, $start_date,$end_date,$start_time,$end_time,$comment); // insert the free form into the FREE table
	$sending = true;
}else {
	$sending = false;
}
?>

<!--start gebruiker dashboard-->
   <?php if ($user->Get($_SESSION["uid"], "rank_id") < $permission->Get("menu_admin")) { ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-apple fa-5x"></i>
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
                                    <i class="fa fa-lock fa-5x"></i>
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
                            Van:
                            <div class="input-group date datepicker" data-provide="datepicker">
                                <input type="date" name="start_date"class="form-control" placeholder="yyyy-mm-dd" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                        </div>
						<div class="col-sm-12 form-group">
                            Tot:
                            <div class="input-group date datepicker" data-provide="datepicker">
                                <input type="date" name="end_date"class="form-control" placeholder="yyyy-mm-dd" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            Begintijd:
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="start_time" class="form-control" placeholder="00:00" value="" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            Eindtijd:
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="end_time"class="form-control" placeholder="00:00" value="" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
							
                        </div>
						<div class="col-sm-12 form-group">
                            Reden:
                            <textarea class="form-control" id="comment" name="comment" placeholder="Reden"  value="" rows="10" requierd></textarea>
                        </div>
						
						
                        <div class="col-sm-6 form-group">
                        <button class="btn btn-lg btn-primary btn-right" backgroundcolor="blue" type="submit" name="submit">Verzenden</button><br />
                        </div>
                       
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
        
   <?php } ?>
   <!--eind gebruiker dashboard-->
   <!--start admin dashboard-->
   <?php if ($user->Get($_SESSION["uid"], "rank_id") >= $permission->Get("menu_admin")) { ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">               
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
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
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-lock fa-5x"></i>
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-apple fa-5x"></i>
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
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-android fa-5x"></i>
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
			
                        
			
         </div>
        
   <?php } ?>
   <!--einde admin dashboard-->
	
		</div>
        <!-- /#page-wrapper -->
<?php
include("../inc/parts/staff-footer.php");
?>

