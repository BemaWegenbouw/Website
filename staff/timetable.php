<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-calendar";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");
?>




<!-- /.row -->
<div id="page-wrapper" class="col-sm-12">
    <iframe src="calendar/timetableengine.php" frameborder="0" marginheight="0" marginwidth="0" scrolling="no"></iframe> 


    <!-- /.col-lg-12 -->



    <?php
    include("../inc/parts/staff-footer.php");
    