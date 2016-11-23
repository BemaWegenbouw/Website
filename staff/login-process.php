<?php

//Bema Wegenbouw BV Website
//Made by J.E. v.d. Heide
//Copyright 2016

$page = "login-process";
require_once("../inc/engine.php");

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
    } else {
        
        $checkusername = $user->checkUser($username);
        $checkpassword = $security->checkPassword($username, $password);
    
        if($checkusername && $checkpassword) {
            $user->authorize($username);
            header("Location: dashboard.php");
        }
        
    }
    
    

} else {
    $security->log("Visited login-process.php without form submission.");
    echo("Invalid form submission detected! Hack attempt blocked and logged.");
    die();
}

?>