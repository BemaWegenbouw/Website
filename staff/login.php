<?php
//Bema Wegenbouw BV Website
//Copyright 2016

require_once("../inc/engine.php");
$page = "index";
include("../inc/parts/staff-header.php");

?>

        <div class="container">

            <form class="form-signin"  method="POST">
                <h2 class="form-signin-heading">Hieronder kunt u inloggen</h2>
                <label for="inputEmail" class="sr-only">Email adres</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email adres" required autofocus name="username">
                <label for="inputPassword" class="sr-only">wachtwoord</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" required name="password">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Onthoud mijn gegevens
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" backgroundcolor="grey" type="submit" name="submit">Inloggen</button>
            </form>

        </div> <!-- /container -->


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

</body>

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>

</html>