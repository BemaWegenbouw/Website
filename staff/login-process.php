<?php

//Bema Wegenbouw BV Website
//Made by J.E. v.d. Heide
//Copyright 2016

$page = "login-process"; //Stel pagina in
require_once("../inc/engine.php"); //Laad nodige bestanden

if (isset($_POST) && !empty($_POST) && !empty($_POST['token']) &&// Check correcte post
    isset($_POST["username"]) && !empty($_POST["username"]) && //Check of gebruikersnaam is gepost
    isset($_POST["password"]) && !empty($_POST["password"]) && //Check of wachtwoord is gepost
    isset($_SESSION['token']) && //Check of token is gepost
    $_SESSION['token'] == $_POST['token']) { //Check of token klopt en zo ja...
    
    $_SESSION["token"] = ""; //Zet token naar niks
    
    $username = $_POST["username"]; //Bewaar gebruikersnaam als variabele
    $password = $_POST["password"]; //Bewaar wachtwoord als variabele
    
    $sanitizedusername = $security->sanitize($username); //Maak gebruikersnaam schoon
    $sanitizedpassword = $security->sanitize($password); //Maak wachtwoord schoon
    
    if($username != $sanitizedusername && $password != $sanitizedpassword) { //Indien opgeschoond niet met onopgeschoond overeenkomt
        
        //Onveilige invoer
        $security->log("Insecure password/username given. Hack attempt possible."); //Leg vast in log
        die(lang("login_error3_text")); //Stop met het laden van de pagina
        
    } else { //Indien het wel schoon is
        
        $checkusername = $user->checkUser($username); //Check gebruikersnaam
        $checkpassword = $security->checkPassword($username, $password); //Check wachtwoord
    
        if($checkusername && $checkpassword) { //Indien beide "true" zijn...
            $user->authorize($username); //Log gebruiker in
            header("Location: dashboard.php"); //Doorverwijzen naar dashboard
        } else { //Indien gebruikersnaam/wachtwoord niet klopt
            
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