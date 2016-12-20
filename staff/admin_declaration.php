<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "admin-declaration";
require_once("../inc/engine.php");

if ($user->Get($_SESSION["uid"], "rank_id") < $permission->Get("decl_admin")) {
    header("Location: dashboard.php");
    die("Unauthorized.");
}

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
                                <form method='POST' action="admin_declaration.php">
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
                                                $userid = $uid;
                                                $declaration->declist($userid);
                                                ?>
                                            </tbody>
                                            <div><button class='btn btn-lg btn-primary btn-right pull-right' style='margin-right:1%' backgroundcolor='blue' type='submit' name='submit'>Verzenden</button></div>
                                        </table>
                                    </div>
                                </form>
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
        if (isset($_POST) && !empty($_POST)) {

            foreach ($_POST as $key => $value) {

                $value = $_POST["verify"];

                if ($value == 'false') {

                    $declaration->denyFree(4);
                } elseif ($value == 'true') {

                    $declaration->approveFree(4);
                }
            }
        }
        ?>

        <?php
        include("../inc/parts/staff-footer.php");
        ?>




