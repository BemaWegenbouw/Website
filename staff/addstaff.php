<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-add";
require_once("../inc/engine.php");

if($user->Get($_SESSION["uid"], "rank_id") < $permission->Get("add_staff")) {
header("Location: dashboard.php");
die("Unauthorized."); }

include("../inc/parts/staff-header.php");

if (isset($_POST) && !empty($_POST)) { //Check of er een post is
    
    if ( //Check of alles is gepost
        isset($_POST["username"]) && isset($_POST["password"]) &&
        isset($_POST["confirmpassword"]) && isset($_POST["firstname"]) &&
        isset($_POST["lastname"]) && isset($_POST["address"]) &&
        isset($_POST["postalcode"]) && isset($_POST["email"]) &&
        isset($_POST["rank"]) &&
        !empty($_POST["username"]) && !empty($_POST["password"]) &&
        !empty($_POST["confirmpassword"]) && !empty($_POST["firstname"]) &&
        !empty($_POST["lastname"]) && !empty($_POST["address"]) &&
        !empty($_POST["postalcode"]) && !empty($_POST["email"]) &&
        !empty($_POST["rank"])
    ) {
        
        //Alles is gepost! Tijd om alles makkelijker benaderbaar te maken.
        $post_username = $_POST["username"];
        $post_password = $_POST["password"];
        $post_confirmpass = $_POST["confirmpassword"];
        $post_firstname = $_POST["firstname"];;
        $post_lastname = $_POST["lastname"];
        $post_address = $_POST["address"];
        $post_postalcode = $_POST["postalcode"];
        $post_email = $_POST["email"];
        $post_rank = $_POST["rank"];
        
        //Tijd om de integriteit te gaan checken.
        
        //CHECK EMAIL ADRES\\
        if (!filter_var($post_email, FILTER_VALIDATE_EMAIL) === false) {
            //Email is goed! Doe niets.
        } else {
            //Email is fout!
            $_SESSION["error"] = "Er is een ongeldig e-mailadres opgegeven!";
        }
        
        //CHECK GEBRUIKERSNAAM\\
        if($security->Sanitize($post_username) == $post_username) {
            //Alles goed!
        } else {
            //Foute input!
            $_SESSION["error"] = "De formulering van de gebruikersnaam is incorrect!";
        }
        
        //CHECK OVEREENKOMST WACHTWOORD\\
        if($post_password == $post_confirmpass) {
            //Alles goed!
        } else {
            //Foute input!
            $_SESSION["error"] = "De wachtwoorden komen niet overeen!";
        }
        
        //CHECK DE VOORNAAM\\
        if($security->Sanitize($post_firstname) == $post_firstname) {
            //Alles goed!
        } else {
            //Foute input!
            $_SESSION["error"] = "De voornaam is incorrect!";
        }
        
        //Einde integriteitscheck
        
        //Begin integriteitsverwerking
        if(isset($_SESSION["error"])) {
            //Er is een fout opgetreden tijdens de integriteitscheck!
            //Stop met het uitvoeren van het script.
            //Laat verderop de melding zien.
        } else {
        
            //Alles is verder goed!
            //Begin verwerking
            
            //Add user hier
            
        }
        
        
    } else {
        
        //Er is iets niet gepost!
        die("Post error!");
        
    } //Einde post inhoud check
    
} //Einde if-post check

//Foutmeldingen weergeven
if(isset($_SESSION["error"])) {
    $error = $_SESSION["error"];
    print("<script type='text/javascript'>noty({text: '$error', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");
    unset($_SESSION["error"]);
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
                    
            <div class="container" style="padding: 0px; margin: 20px;">
                      <form class="form" action="" method="POST" style="">
                
                <div class="form-group">
                
                <label for="inputUsername">Gebruikersnaam</label><br />
                <input type="text" id="inputUsername" class="form-control" placeholder="Gebruikersnaam" autofocus name="username"><br />
                
                <label for="inputPassword">Wachtwoord</label><br />
                <input type="text" id="inputPassword" autocomplete="off" class="form-control" placeholder="Wachtwoord" value="" name="password"><br />
                
                <label for="inputPassword">Bevestig Wachtwoord</label><br />
                <input type="text" id="inputPassword" autocomplete="off" class="form-control" placeholder="Typ het wachtwoord over" value="" name="confirmpassword"><br />
                
                </div>
                
                <p>
                
                <label for="inputFirstname">Voornaam</label><br />
                <input type="text" id="inputFirstname" class="form-control" placeholder="Voornaam" required name="firstname"><br />
                
                <label for="inputLastname">Achernaam</label><br />
                <input type="text" id="inputLastname" class="form-control" placeholder="Achternaam" required name="lastname"><br />
                
                <label for="inputAddress">Adres</label><br />
                <input type="text" id="inputAddress" class="form-control" placeholder="Adres" required name="address"><br />
                
                <label for="inputLastname">Postcode</label><br />
                <input type="text" id="inputPostalcode" class="form-control" placeholder="Postcode" required name="postalcode"><br />
                    
                <label for="inputEmail">Email adres</label><br />
                <input type="email" id="inputEmail" class="form-control" placeholder="Email" required name="email"><br />
                
                <label for="inputRank">Rang</label><br />
                <select name="rank" id="inputRank" class="form-control" required><?php $permission->ListRanks(); ?></select>
                
                </p>
                
                <button class="btn btn-lg btn-primary btn-right" backgroundcolor="grey" type="submit" name="submit">Toevoegen</button><br />
                
                <p />
                
            </form>
            
                    </div>
                
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include("../inc/parts/staff-footer.php"); ?>