<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-freeapplications";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");
 $uid = $_SESSION["uid"];

?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
            
	
		<!-- start vrijvraag goedkeuring tabel -->	
		<div class='row'>
		<div class='col-lg-12'>
		<br>
		<form method='POST'>
		<div class='panel panel-default'>
		<div class='panel-heading'>
		<h1>Openstaande vrij aanvragingen</h1>
		</div>
		
		<div class='panel-body'>
		<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
		<thead>
			<tr>
				<th>Voornaam</th>
				<th>Achternaam</th>
				<th>Van</th>
				<th>Tot</th>
				<th>Start tijd</th>
				<th>Eind tijd</th>
				<th>Reden</th>
				<th>Goedkeuring</th>		
			</tr>
        </thead>
		<tbody>
		<?php $free->approveRequest();?>
		
		</tbody>
		</table>
		<div><button class='btn btn-lg btn-primary btn-right pull-right' style='margin-right:1%' backgroundcolor='blue' type='submit' name='submit'>Verzenden</button></div>
		</div>
		</div>
		</form>
		</div>
		</div><br>
		<!-- eind vrijvraag goedkeuring tabel -->
		<!-- start gehele vrijvraag tabel -->
		<div class='row'>
		<div class='col-lg-12'>
		<div class='panel panel-default'>
		<div class='panel-heading'>
		<h1> Opgeslagen vrij aanvragingen</h1>
		</div>
		
		<div class='panel-body'>
		<table class='table table-striped table-bordered table-hover' id='example'>
		<thead>
			<tr>
				<th>Voornaam</th>
				<th>Achternaam</th>
				<th>Van</th>
				<th>Tot</th>
				<th>Start tijd</th>
				<th>Eind tijd</th>
				<th>Reden</th>
				<th>Goedkeuring</th>		
			</tr>
        </thead>
		<tbody>
		<?php $free->freeListCompleet();?>		
		</tbody>
		</table>
		</div>
		</div>
		</div>
		</div>
        <!-- eind gehele vrijvraag tabel -->
		
    <?php
	require_once "../inc/phpmailer/PHPMailerAutoload.php";
	if(isset($_POST) && !empty($_POST)){
	
	foreach ( $_POST as $key => $value){

		
		
		/* controleer of er user al is ingeroosterd*/
		$startdate = $free->get($key,'start_date');
		$enddate = $free->get($key,'end_date');
		$uidKey = $free->get($key,'uid');
		/* naam voor de email */
		$firstname = $user->get($uidKey,'first_name');
		$lastname= $user->get($uidKey,'last_name');
		
		
		/*
		$datetime1 =new Datetime('2006-11-12');
		$datetime2 = new Datetime('2006-11-16');
		$interval = $datetime1->diff($datetime2);
		$temp = $interval->format('%d%');
		
		 */

			if($value == 'false'){
			
			$free->denyFree($key);
			
			/* 	in verify moet true of false komen te staan.
				andere tabel wijzigen rooster ( nu comment naar foutgekeurd)
				Verwijder de record en en sla het op in een backup tabel.
				*/
				
				
				     $name= $firstname . " " .$lastname;
						$useremail = $user->Get($uidKey, 'email');
						$fromemail = 'j.benning@hotmail.nl';
						$subject = 'Vrij aanvraag van ' . $startdate . ' tot ' . $enddate;
						$messagePart1 = 'Geachte ' . $name ; 
						$messagePart2 = 'Uw aanvraag om vrij te zijn van ' . $startdate . ' tot ' . $enddate . ' is helaas niet goedgekeurd.' ;
						$m = new PHPMailer;

						$m->isSMTP();
						$m->SMTPAuth = true;
						$m->SMTPDebug = 0;
						$m->Host = "smtp.gmail.com";
						$m->Username = "testbema@gmail.com";
						$m->Password = "BEMAtest1234";
						$m->SMTPSecure = 'ssl';
						$m->Port = 465;

						$m->From = $fromemail;
						$m->FromName = 'Bema wegenbouw bv';
						$m->addReplyTo($fromemail, $name);
						$m->addAddress($useremail);
						$m->Subject = $subject;
						$m->Body = $messagePart1. "\n". "\n". $messagePart2;

						$m->send();
						
						
		}if ($value == 'true'){ 
			
			
			print $key . " " . $value;
		    
			$free->approveFree($key);
			/* 	in verify moet true of false komen te staan.
				andere tabel wijzigen rooster ( nu comment naar goedgekeurd)
				Verwijder de record en en sla het op in een backup tabel.
				*/
			
			$free->updateWorkHours($uidKey,$startdate,$enddate);
			
			
						
						$name= $firstname . " " .$lastname;
						$useremail = $user->Get($uidKey, 'email');
						$fromemail = 'j.benning@hotmail.nl';
						$subject = 'Vrij aanvraag van ' . $startdate . ' tot ' . $enddate;
						$messagePart1 = 'Geachte ' . $name ; 
						$messagePart2 = 'Uw aanvraag om vrij te zijn van ' . $startdate . ' tot ' . $enddate . ' is goedgekeurd.' ;

						$m = new PHPMailer;

						$m->isSMTP();
						$m->SMTPAuth = true;
						$m->SMTPDebug = 0;
						$m->Host = "smtp.gmail.com";
						$m->Username = "testbema@gmail.com";
						$m->Password = "BEMAtest1234";
						$m->SMTPSecure = 'ssl';
						$m->Port = 465;

						$m->From = $fromemail;
						$m->FromName = 'Bema wegenbouw bv';
						$m->addReplyTo($fromemail, $name);
						$m->addAddress($useremail);
						$m->Subject = $subject;
						$m->Body = $messagePart1. "\n". "\n". $messagePart2;

						$m->send();
						
			
			}
		
		
		
		 
		} 
		$currenturl = $_SERVER['REQUEST_URI'];
		print
		"<script type='text/javascript'>
		window.location.href = 'freeapplications.php';
		</script>";
		
	}
		
	
	
	
	 
	?>
	</div>
    <!-- /container -->
	</div>
	<!-- /page wrapper -->

<?php

include("../inc/parts/staff-footer.php");

?>