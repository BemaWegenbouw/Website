<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-declaration";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Urendeclaratie</h1>
                <div class="col-sm-4">
                    <form method="get" action="declaration.php">
                        <div class="col-sm-12 form-group">
                            datum:<input class="form-control" id="date" name="date" placeholder="dd-mm-jjjj" type="text" pattern="[0-9.-]{3}+[0-9.-]{3}+[0-9]{4}" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            begintijd:
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="start_time"class="form-control" value="00:00" required disabled autofocus>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            eindtijd:
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="end_time"class="form-control" value="00:00" required disabled autofocus>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group">
                            pauze (in minuten):<input class="form-control" id="break" name="break" placeholder="(in minuten)" type="number" min="0" max="150" value="0" required>
                        </div>
                        <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-left" type="submit" name="submit" value="Submit">verzenden</button>
                        </div>
                    </form>
                </div>
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


