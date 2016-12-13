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
		<div><button class='btn btn-lg btn-primary btn-right pull-right' style='margin-right:1%' backgroundcolor='blue' type='submit' name='submit'>Verzenden</button></div>
		</table>
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
		<h1> Opgeslagen vrij aanvragen</h1>
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
	
	if(isset($_POST) && !empty($_POST)){
	
	foreach ( $_POST as $key => $value){
		print $key. " ". $value . " ";
		
		if($value == 'false'){
			
			$free->denyFree($key);
			
			/* 	in verify moet true of false komen te staan.
				andere tabel wijzigen rooster ( nu comment naar foutgekeurd)
				Verwijder de record en en sla het op in een backup tabel.
				*/
		}else {
			
			
			$startdate = $free->get($key,'start_date');
			$enddate = $free->get($key,'end_date');
			$free->approveFree($key);
			/* 	in verify moet true of false komen te staan.
				andere tabel wijzigen rooster ( nu comment naar goedgekeurd)
				Verwijder de record en en sla het op in een backup tabel.
				*/
		
			$free->updateWorkHours($uid,$startdate,$enddate);
			
		}
	}  
} 
	?>
	</div>
    <!-- /container -->
	</div>
	<!-- /page wrapper -->

<?php

include("../inc/parts/staff-footer.php");

?>