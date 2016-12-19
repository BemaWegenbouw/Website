<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "admin-declaration";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");
$uid = $_SESSION["uid"];
?>
<link href="../assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
				<h1 class="page-header">Uren Inzien</h1>
				
						<div class='container-fluid'>
                            <div class='row'>
                                <div class='col-lg-12'>
                                    <div class='panel panel-default'>
                                        <div class='panel-heading'>
											</div>

                                        <div width="auto" class='panel-body'>
                                            <table width="100%" class='table table-striped table-bordered table-hover' id='scrolltable'>
                                                <thead>
                                                    <tr>
                                                        <th>Voornaam</th>
                                                        <th>Achternaam</th>
                                                        <th>Datum</th>
                                                        <th>Start tijd</th>
                                                        <th>Eind tijd</th>
                                                        <th>Pauze</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $userid = $uid;
                                                    $declaration->declist($userid);
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>	
					</div>
					
					<div class='container-fluid'>
                            <div class='row'>
                                <div class='col-lg-12'>
                                    <div class='panel panel-default'>
                                        <div class='panel-heading'>
                                        </div>

                                        <div width="auto" class='panel-body'>
                                            <table width="100%" class='table table-striped table-bordered table-hover' id='scrolltable2'>
                                                <thead>
                                                    <tr>
                                                        <th>Voornaam</th>
                                                        <th>Achternaam</th>
                                                        <th>Datum</th>
                                                        <th>Start tijd</th>
                                                        <th>Eind tijd</th>
                                                        <th>Pauze</th>
														<th>Goedkeuring</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $userid = $uid;
                                                    $declaration->declistgoedgekeurd($userid);
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>	
					</div>
					
				<?php	
include("../inc/parts/staff-footer.php");
?>