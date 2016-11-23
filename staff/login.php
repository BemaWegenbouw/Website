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

?>

        <div class="container">
            <form class="form-signin" action="login-process.php" method="POST">
                <h2 class="form-signin-heading">Inloggen Personeel</h2>
                <label for="inputEmail" class="sr-only">Email adres</label>
                <input type="text" id="inputEmail" class="form-control" placeholder="Gebruikersnaam" required autofocus name="username">
                <label for="inputPassword" class="sr-only">wachtwoord</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" required name="password">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Onthoud mijn gegevens
                    </label>
                </div>
                <input type="hidden" name="token" value="<?php echo $token; ?>" />
                <button class="btn btn-lg btn-primary btn-block" backgroundcolor="grey" type="submit" name="submit">Inloggen</button>
            </form>

        </div> <!-- /container -->


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
	<script src="../assets/js/jquery.min.js"></script>
    	<script src="../assets/js/bootstrap.js"></script>
    </body>
    
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

</body>

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>

</html>