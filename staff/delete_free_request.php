<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff_delete_free";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");
$id = $_GET['id']; 
if(isset($_POST['ja'])){
	
	$free->deleteRecord($id);
	print
		"<script type='text/javascript'>
		window.location.href = 'freeapplications.php';
		</script>";
}
if(isset($_POST['nee'])){
	
	print
		"<script type='text/javascript'>
		window.location.href = 'freeapplications.php';
		</script>";
}

?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Vrij aanvraag</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
			<div class="container-fluid">
                    <div class="col-lg-12">
					<div class="row">
									
					<div class="col-sm-6">
					<?php 
						// haalt gegevens op bij de bijbehorende ID
						$free->ShowDeleteRecord($id);?>
					</div>
					</div>
					<!-- /.row -->
					<div class="row">
					<div class="col-sm-6">
					<form method="POST">	
					<h4>Weet je zeker dat je deze record wilt deleten?<h4>
					<div class="col-sm-3"><button class='btn btn-sm btn-primary btn-right pull-right' backgroundcolor='blue' type='submit' name='ja'>Ja</button></div>
					<div class="col-sm-3"><button class='btn btn-sm btn-primary btn-right pull-right'  backgroundcolor='blue' type='submit' name='nee'>Nee</button></div>
					</form>
					</div>
					<!-- /.col-lg-12 -->
				</div>
				<!-- /.row -->
			</div>
			 <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php

include("../inc/parts/staff-footer.php");

?>