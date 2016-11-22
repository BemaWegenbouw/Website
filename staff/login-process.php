<?php

//Bema Wegenbouw BV Website
//Copyright 2016

require_once("../inc/engine.php");
$page = "login-process";

if (isset($_POST) && !empty($_POST) && !empty($_POST['token'])) {

    //Check CSRF token
    if (!hash_equals($_SESSION['token'], $_POST['token'])) {
        die("Hack attempt detected!");
         //Log error
    }
    

} else {
    $security->log("Visited login-process.php without form submission.");
    die("No form submission detected! Hack attempt blocked and logged.");
}
    
?>