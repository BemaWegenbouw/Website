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
require_once("controller/permission.controller.php"); //Importeer permission controller
require_once("controller/restore.controller.php"); //Importeer restore controller
require_once("controller/calendar.controller.php"); //Importeer permission controller
require_once("controller/declaration.controller.php");
//Login check. Later verplaatsen naar los bestand!
if (strpos($page, 'staff') !== false) { //Check of paginanaam 'staff' bevat.
    if ($user->LoggedIn()) {//Check login
        //Doe niets
    } else { //Indien niet ingelogd
        header("Location: login.php"); //Redirect naar inlogpagina
        die("Not logged in! Redirecting to login..."); //Stop met het laden van de paginainhoud, geef melding
    } //Stop de staff check
} //Stop de page check
//Check ingelogd en pagina, indien inlogpagina, redirect.
if ($user->LoggedIn() && $page == "login") {
    header("Location: dashboard.php"); //Doorverwijzing
    die(); //Stop met het laden van de pagina
} //Einde inlogpagina redirect
?>