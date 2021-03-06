<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-freeapplications";
require_once("../inc/engine.php");

if($user->Get($_SESSION["uid"], "rank_id") < $permission->Get("free_form")) {
header("Location: dashboard.php");
die("Unauthorized."); }

include("../inc/parts/staff-header.php");
$uid = $_SESSION["uid"];

?>	
        <!-- Page Content -->
        <div id="page-wrapper">		
		 <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Vrij aanvragingen</h3>
                    </div>
                    <!-- /.col-lg-12 -->
		</div>	
	<!-- start ongekeurde vrijvraag tabel -->
	   <div class='container-fluid'>
	   <!-- start row -->
		<div class='row'>
		<div class='col-sm-12'>
		<form method='POST'>
		<div class='panel panel-default'>
			<div class='panel-heading'><h3>Openstaande vrijaanvragen</h3>
			</div>		
				<div  width="auto" class='panel-body'>
				<table width="100%"class='table table-striped table-bordered table-hover' id='scrolltable2'>
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
				<div><button class='btn btn-sm btn-primary btn-right pull-right' style='margin-right:1%' backgroundcolor='blue' type='submit' name='submit'>Verzenden</button></div>
				</div>
		</div>
		</form>
		</div>
		
        <!-- eind ongekeurde vrijvraag tabel -->
		<!-- start gekeurde vrijvraag tabel -->
	   
		<div class='col-sm-12'>
		<div class='panel panel-default'>
		<div class='panel-heading'>
		<h3> Opgeslagen vrij aanvragingen</h3>
		</div>
		
		<div  width="auto" class='panel-body'>
		<table width="100%"class='table table-striped table-bordered table-hover' id='scrolltable'>
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
				<th>Verwijder</th>		
			</tr>
        </thead>
		<tbody>
		<?php $free->freeListCompleet();?>		
		</tbody>
		</table>
		</div>
		</div>
		</div>		
        <!-- eind gekeurde vrijvraag tabel -->
		
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
		
			if($value == 'false'){
			
			$free->denyFree($key);
				// verzamel gegevens voor een afkeurings email en stell deze op.
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
						// verzend email
						$m->send();
												
		}if ($value == 'true'){ 
			//zet kolom verify in de tabel restore op goedgekeurd		    
			$free->approveFree($key);			
			//update de werktijden van de medewerker in de tabel work_hour
			$free->updateWorkHours($uidKey,$startdate,$enddate);
						// verzamel gegevens voor een goedkeurings email.
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
						//verzend de mail
						$m->send();								
			} 
		}  //refresh de pagina
			$currenturl = $_SERVER['REQUEST_URI'];
			print
			"<script type='text/javascript'>
			window.location.href = 'freeapplications.php';
			</script>";		
	} 
	?>
	</div>
    <!-- /row-->
	</div>
	<!-- / container fluid -->
	</div>
	<!-- /page wrapper -->

<?php

include("../inc/parts/staff-footer.php");

?>