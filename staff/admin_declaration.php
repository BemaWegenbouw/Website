<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "admin-declaration";
require_once("../inc/engine.php");

if ($user->Get($_SESSION["uid"], "rank_id") < $permission->Get("decl_admin")) {
    header("Location: dashboard.php");
    die("Unauthorized.");
}

if (isset($_POST) && !empty($_POST)) {
    foreach ($_POST as $key => $value) {
        if ($value == 'true') {
            $declaration->approveFree($key);
        }
        if ($value == 'false') {
            $declaration->denyFree($key);
        }
    }
	print
		"<script type='text/javascript'>
		window.location.href = 'admin_declaration.php';
		</script>";
}
include("../inc/parts/staff-header.php");
$uid = $_SESSION["uid"];
?>
<link href="../assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">

<!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Uren inzien</h1>
                    </div>
                    <!-- /.col-lg-12 -->
	</div>
                <div class='container-fluid'>
                    <div class='row'>
                        <div class='col-lg-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'><h4>Ongekeurde uren</h4>
                                </div>
                                <form method='POST'>
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
                                                    <th>Goedkeuring</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $declaration->declist();
                                                ?>
                                            </tbody>
                                        </table>
										<div><button class='btn btn-sm btn-primary btn-right pull-right' style='margin-right:1%' backgroundcolor='blue' type='submit' name='submit'>Verzenden</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            

            <div class='container-fluid'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'><h4>Goedgekeurde uren</h4>
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
											<th>Verwijder</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $declaration->declistgoedgekeurd();
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