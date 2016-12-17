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
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Personeelslijst</h1>
                    </div>
                    <!-- /.col-lg-12 -->
			    </div>
       <div class='container-fluid'>
	   <div class='col-lg-12'>
		<div class='panel panel-default'>
		<div class='panel-heading'>
		<h1> Alle personeel</h1>
		</div>
		
		<div class='panel-body'>
		<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
		<tbody>
            <?php $user->staffList(); ?>
                    
                
                <!-- /.row -->
				<!-- start gehele vrijvraag tabel -->
		
				
		
		</table>
		</div>
		</div>
		</div>
		</div>
        <!-- eind gehele vrijvraag tabel -->
        </div>
        <!-- /#page-wrapper -->

   


<?php include("../inc/parts/staff-footer.php"); ?>