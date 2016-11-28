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
                    <form method="Post" action="declaration.php">
<!--                        datum: <input type="text" name="date" placeholder="dd-mm-jjjj" required><br>-->
                        <div class="col-sm-12 form-group">
                            datum:<input class="form-control" id="date" name="date" placeholder="dd-mm-jjjj" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            begintijd:<input class="form-control" id="start_date" name="start_date" placeholder="(00:00)" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            eindtijd:<input class="form-control" id="end_date" name="end_date" placeholder="(00:00)" type="text" required>
                        </div>
                        <div class="col-sm-12 form-group">
                            pauze:<input class="form-control" id="break" name="break" placeholder="(in minuten)" type="text" required>
                        </div>
                        <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-left" type="submit" name="submit" value="Submit">verzenden</button>
                        </div>
                        <!--
                                                begintijd: <input type="text" name="start_date" placeholder="00:00" required>
                                                eindtijd: <input type="text" name="end_date" placeholder="00:00" required><br>
                                                <input type="checkbox" name="break" value="false"> ik heb geen pauze gehad.<br>
                                                pauze: <input type="text" name ="break_time" placeholder="in minuten"><br>
                                                <button class="btn btn-default pull-left" type="submit" name="submit" value="Submit">verzenden</button>-->

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