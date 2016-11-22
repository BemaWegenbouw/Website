<?php

//Bema Wegenbouw BV Website
//Copyright 2016

require_once("../inc/engine.php");
$page = "login-process";

if (isset($_POST) && !empty($_POST) && !empty($_POST['token']) &&
    isset($_POST["username"]) && !empty($_POST["username"]) &&
    isset($_POST["password"]) && !empty($_POST["password"]) &&
    isset($_SESSION['token']) &&
    $_SESSION['token'] == $_POST['token']) {
    
    $_SESSION["token"] = "";
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sanitizedusername = $security->sanitize($username);
    $sanitizedpassword = $security->sanitize($password);
    
    if($username != $sanitizedusername && $password != $sanitizedpassword) {
        
        //Insecure username/password given
        $security->log("Insecure password/username given. Hack attempt possible.");
        echo("Insecure login details used.");
        die();
    }
    
    $checkusername = $user->checkUser($username);
    $checkpassword = $user->checkPassword($username, $password);
    
    if($checkusername == true && $checkpassword == true) {
            
        echo("succes!");
//Josha maakt dit af!!!!!!!!!!!!!!!
            
    }


} else {
    $security->log("Visited login-process.php without form submission.");
    echo("Invalid form submission detected! Hack attempt blocked and logged.");
    die();
}

?>