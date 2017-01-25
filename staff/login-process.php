<?php

//Bema Wegenbouw BV Website
//Made by J.E. v.d. Heide
//Copyright 2016

$page = "login-process"; //Stel pagina in
require_once("../inc/engine.php"); //Laad nodige bestanden

if (isset($_POST) && !empty($_POST) && isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"]) && isset($_SESSION['token']) && $_SESSION['token'] == $_POST['token']) {
    
    $_SESSION["token"] = ""; //Zet token naar niks

    if(!isset($_SESSION["login-count"])) { //Indien geen login count ingesteld
        $_SESSION["login-count"] = 0; //Stel login-count in
    }
    
    $username = $_POST["username"]; //Bewaar gebruikersnaam als variabele
    $password = $_POST["password"]; //Bewaar wachtwoord als variabele
    
    $sanitizedusername = $security->sanitize($username); //Maak gebruikersnaam schoon
    $sanitizedpassword = $security->sanitize($password); //Maak wachtwoord schoon
    
    if($username != $sanitizedusername && $password != $sanitizedpassword) { //Indien opgeschoond niet met onopgeschoond overeenkomt
        
        //Onveilige invoer
        $security->log("Insecure password/username given. Hack attempt possible."); //Leg vast in log
        die(lang("login_error3_text")); //Stop met het laden van de pagina
        
    } else { //Indien het wel schoon is

        //Check ban
        $getban = $user->getBan($username);
        $logincount = $_SESSION["login-count"];

        if($getban) { //Indien gebruiker ban heeft

            $gotunban = $user->getUnban($username); //Check of ban opgeheven kan worden

            if($gotunban) { //Indien opgeheven

                // Doe niets, door naar login.

            } else { //Indien geen unban en verbannen

                $_SESSION["login-error"] = lang("login_error4_text"); //Stel foutmelding in
                header("Location: login.php"); //Verwijs door naar login.php
                die(lang("global_error_redirect")); //Stop met het laden van de pagina

            }

        } elseif ($getban == false && $logincount >= 2) { //Indien nog geen ban en 3x verkeerd ingelogd
            $time = time(); //Sla tijd op
            $user->ban($username, $time); //Verban gebruikersnaam
            $_SESSION["login-error"] = lang("login_error5_text"); //Stel foutmelding in
            header("Location: login.php"); //Verwijs door naar login.php
            die(lang("global_error_redirect")); //Stop met het laden van de pagina
        }

            $checkusername = $user->checkUser($username); //Check gebruikersnaam
            $checkpassword = $security->checkPassword($username, $password); //Check wachtwoord

            if ($checkusername && $checkpassword) { //Indien beide schoon zijn...

                $user->authorize($username); //Log gebruiker in
                header("Location: dashboard.php"); //Doorverwijzen naar dashboard

            } else { //Indien gebruikersnaam/wachtwoord niet klopt
                $_SESSION["login-count"] = $_SESSION["login-count"] + 1; //Login count
                $_SESSION["login-error"] = lang("login_error1_text"); //Stel foutmelding in
                header("Location: login.php"); //Verwijs door naar login.php
                die(lang("global_error_redirect")); //Stop met het laden van de pagina

            } //Stop met het checken van correcte login

    } // Stop met het checken van schone invoer

} else { //Indien er geen post is...
    $security->log("Visited login-process.php without form submission."); //Log de bezoekpoging
    $_SESSION["login-error"] = lang("login_error2_text"); //Stel foutmelding in
    header("Location: login.php"); //Verwijs door naar login.php
    die(lang("login_error2_text")); //Stop met het laden van de pagina
}

?>