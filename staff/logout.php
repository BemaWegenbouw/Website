<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "logout";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

$user->logout($_SESSION["uid"]);
header("Location: login.php");
die("Redirecting to login...");

?>