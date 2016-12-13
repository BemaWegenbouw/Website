<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-freeapplications";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
            <div>
			<h1> Test print vrij aanvragen</h1>
			
		<div class='row'>
		<div class='col-lg-12'>
		<div class='panel panel-default'>
		<div class='panel-heading'>
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
		<?php $free->freeListCompleet();?>

		</tbody>
		</table>
		</div>
		</div>
		</div>
		</div>
        </div>
        <!-- /#page-wrapper -->
		<div><button class='btn btn-lg btn-primary btn-right pull-right' style='margin-right:1%' backgroundcolor='blue' type='submit' name='submit'>Verzenden</button></div>
    </div>
    <!-- /#wrapper -->

<?php

include("../inc/parts/staff-footer.php");

?>