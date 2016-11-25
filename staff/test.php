<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-test";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

?>
        
        <center>
        <h1>Test</h1>
        <h3>Welkom op de testpagina!</h3>
        
        <p><br /><br />
            
            <link rel="stylesheet" type="text/css" href="../assets/css/staff-custom.css">
            <?php $user->staffList(); $user->Set('1', 'username', 'tuser'); ?>
            
            <!--<strong><h4><a href="logout.php">Loguit</a></h4></strong>-->
        </p>
        </center>
        

<?php include("../inc/parts/staff-footer.php"); ?>