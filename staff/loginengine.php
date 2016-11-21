<?php

// Laad configuratie
require_once("../inc/config.php");

//Sessie opstarten
session_start();

//Laad controllers
require_once("../inc/controller/db.controller.php"); //Importeer DB controller
require_once("../inc/controller/user.controller.php"); //Importeer user controller
require_once("../inc/controller/staff.controller.php"); //Importeer staff controller
require_once("../inc/controller/content.controller.php"); //Importeer inhoud controller
require_once("../inc/controller/lang.controller.php"); //Importeer lang controller
?>