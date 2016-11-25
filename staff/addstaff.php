<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-add";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

if (isset($_POST) && !empty($_POST)) { //Check of er een post is
    
    
    
}

?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Personeel Toevoegen</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    
            <div class="container">
            <form class="form-signin" action="" method="POST">
                <label for="inputEmail" class="sr-only">Email adres</label>
                <input type="text" id="inputEmail" class="form-control" placeholder="Gebruikersnaam" required autofocus name="username">
                <label for="inputPassword" class="sr-only">wachtwoord</label>
                <input type="password" id="inputPassword" autocomplete="off" class="form-control" placeholder="Wachtwoord" required name="password">
                <button class="btn btn-lg btn-primary btn-block" backgroundcolor="grey" type="submit" name="submit">Aanpassen</button>
            </form>
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include("../inc/parts/staff-footer.php"); ?>