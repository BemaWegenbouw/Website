<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "login";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

if (empty($_SESSION['token'])) {
    if (function_exists('mcrypt_create_iv')) {
        $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    } else {
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
    }
}
$token = $_SESSION['token'];

if(isset($_SESSION["login-error"])) {
    $loginerror = $_SESSION["login-error"];
    print("<script type='text/javascript'>noty({text: '$loginerror', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");
    unset($_SESSION["login-error"]);
}

?>

        <div class="container">
            <form class="form-signin" action="login-process.php" method="POST">
                <h2 class="form-signin-heading">Inloggen Personeel</h2>
                <label for="inputEmail" class="sr-only">Email adres</label>
                <input type="text" id="inputEmail" class="form-control" placeholder="Gebruikersnaam" required autofocus name="username">
                <label for="inputPassword" class="sr-only">wachtwoord</label>
                <input type="password" id="inputPassword" autocomplete="off" class="form-control" placeholder="Wachtwoord" required name="password">
                <input type="hidden" name="token" value="<?php echo $token; ?>" />
                <button class="btn btn-lg btn-primary btn-block" backgroundcolor="grey" type="submit" name="submit">Inloggen</button>
            <br><h4><a class="button" href="resetpassword.php">Wachtwoord vergeten?</a></h4>
			</form>
		
        </div> <!-- /container -->

<?php
include("../inc/parts/staff-footer.php");
?>