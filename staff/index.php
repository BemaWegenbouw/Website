<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-index";
require_once("../inc/engine.php");

if($user->loggedin()) {
    header("Location: dashboard.php");
    die();
} else {
    header("Location: login.php");
    die();
}

?>