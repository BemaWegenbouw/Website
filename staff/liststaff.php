<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-list";
require_once("../inc/engine.php");
if($user->Get($_SESSION["uid"], "rank_id") < $permission->Get("edit_staff")) {
header("Location: dashboard.php");
die("Unauthorized."); }

include("../inc/parts/staff-header.php");

?>

        <!-- Page Content -->
        <div  id="page-wrapper">
            
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Personeelslijst</h1>
                    </div>
                    <!-- /.col-lg-12 -->
			    </div>
       <!-- start gehele vrijvraag tabel -->
	   <div class='container-fluid'>
		<div class='row'>
		<div class='col-sm-12'>
		<div class='col-sm-12 panel panel-default'>
		<div class='panel'>
		<h1> Complete Personeelslijst</h1>
		</div>
		
		<div  width="auto" class='panel-body'>
		<table width="100%"class='table table-striped table-bordered table-hover' id='scrolltable'>
		<thead>
			<tr>
				<th>GebruikerID</th>
				<th>Accountnaam</th>
				<th>Rang</th>
				<th>Voornaam</th>
				<th>Achternaam</th>
				<th>Adres</th>
				<th>Postcode</th>
				<th>E-mail</th>	
				<th>Functie</th>
				<th>Bewerken</th>		
				<th>Verwijder</th>	
			</tr>
        </thead>
		<tbody>
		<?php $user->staffList();?>		
		</tbody>
		</table>
		</div>
		</div>
		</div>
		
        <!-- eind gehele vrijvraag tabel -->
		</div>
		<!-- einde row-->
		</div>
		<!-- einde container -->
		</div>
        <!-- /#page-wrapper -->

   


<?php include("../inc/parts/staff-footer.php"); ?>