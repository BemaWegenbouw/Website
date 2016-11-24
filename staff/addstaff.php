<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-add";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

if (isset($_POST) && !empty($_POST)) { //Check of er een post is
    
    
    
}

?>

        <div class="container">
            <form class="form-signin" action="login-process.php" method="POST">
                <h2 class="form-signin-heading">Personeel Toevoegen</h2>
                <label for="inputEmail" class="sr-only">Gebruikersnaam</label>
                <input type="text" id="inputEmail" class="form-control" placeholder="Gebruikersnaam" required autofocus name="username">
                <label for="inputPassword" class="sr-only">wachtwoord</label>
                <input type="password" id="inputPassword" autocomplete="off" class="form-control" placeholder="Wachtwoord" required name="password">
                <input type="hidden" name="token" value="<?php echo $token; ?>" />
                <button class="btn btn-lg btn-primary btn-block" backgroundcolor="grey" type="submit" name="submit">Inloggen</button>
            </form>

        </div>