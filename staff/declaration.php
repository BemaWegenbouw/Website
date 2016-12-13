<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-declaration";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");
$uid = $_SESSION["uid"];
?>

<?php
if (isset($_POST) && !empty($_POST)) {

    $userid = $uid;
    $date = $_POST['date'];
    $start = $_POST['start_time'];
    $start_time = "$start:00";
    $end = $_POST['end_time'];
    $end_time = "$end:00";
    $break = $_POST['break'];

    $declaration->insert($userid, $date, $start_time, $end_time, $break);
} else

    ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Urendeclaratie</h1>
                <div class="col-sm-4">
                    <form method="post" action="declaration.php">
                        <div class="col-sm-12 form-group">
                            datum:
                            <div class="input-group date datepicker" data-provide="datepicker">
                                <input type="date" name="date"class="form-control" placeholder="yyyy-mm-dd" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            begintijd:
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="start_time"class="form-control" placeholder="00:00" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            eindtijd:
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="end_time"class="form-control" placeholder="00:00" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group">
                            pauze:

                            <div >
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-number" type="button" data-type="minus" data-field="break" ><span class="glyphicon glyphicon-minus"></span></button>
                                    </span>
                                    <input type="text" class="form-control" name="break" value="0" min="0" max="150">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-number" type="button" data-type="plus" data-field="break"><span class="glyphicon glyphicon-plus"></span></button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 form-group">
                            <button class="btn btn-block btn-default pull-left" type="submit" name="submit" value="Submit">verzenden</button>
                        </div>
                    </form>
                </div>

                <?php {
                    $declaration->declist();
                }
                ?>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
		
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php
include("../inc/parts/staff-footer.php");
?>



