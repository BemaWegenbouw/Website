<?php

// Laad configuratie
require_once("config.php");

//Sessie opstarten
session_start();

//Laad controllers
require_once("controller/db.controller.php"); //Importeer DB controller
require_once("controller/user.controller.php"); //Importeer user controller
require_once("controller/staff.controller.php"); //Importeer staff controller
require_once("controller/content.controller.php"); //Importeer inhoud controller
require_once("controller/lang.controller.php"); //Importeer lang controller
require_once("controller/security.controller.php"); //Importeer security controller

//Login check. Later verplaatsen naar los bestand!
//Check of paginanaam 'staff' bevat.
if (strpos($page, 'staff') !== false) {
    
    //Indien ja, check login
    if(isset($_SESSION["username"]) && isset($_SESSION["uid"])) {
        //Doe niks indien ingelogd
    } else {
        header("Location: login.php");
        die("Not logged in! Redirecting to login...");
    }
    
}

?>