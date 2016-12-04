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
            <div class="container col-xs-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Personeelslijst</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    
            <div class="container">
                
                <table border='1'>
            <?php $user->staffList(); ?>
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include("../inc/parts/staff-footer.php"); ?>