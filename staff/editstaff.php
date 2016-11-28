<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-edit";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

if (isset($_GET) && !empty($_GET)) { //Check of er een GET is
    
    //Stel variabelen in
    $userid = $_GET["uid"];
    
    //Check of de gebruiker bestaat
    if($user->checkID($userid)) {
        
        //Gebruiker bestaat
        
        $username = $user->Get($userid, 'username');
        $rank = $user->Get($userid, 'rank_id');
        $first_name = $user->Get($userid, 'first_name');
        $last_name = $user->Get($userid, 'last_name');
        $address = $user->Get($userid, 'address');
        $postal_code = $user->Get($userid, 'postal_code');
        $email = $user->Get($userid, 'email');
        $function = $user->Get($userid, 'function');
        
        if(isset($_POST) && !empty($_POST)) {
        
            //Indien gepost, check post
            
            if(isset($_POST["rank"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["address"]) && isset($_POST["postalcode"]) && isset($_POST["email"])) {
            
            //Stel post variabelen in
            $post_rank = $_POST["rank"];
            $post_firstname = $_POST["firstname"];;
            $post_lastname = $_POST["lastname"];
            $post_address = $_POST["address"];
            $post_postalcode = $_POST["postalcode"];
            $post_email = $_POST["email"];
                
                //Wachtwoord check
                if(isset($_POST["password"]) && !empty($_POST["password"])) {
                    
                    $post_password = $_POST["password"]; //Stel wachtwoord post variabele in
                    
                    $password = $user->Get($userid, 'password'); //Haal wachtwoord op uit database
                    
                    $passverify = $security->checkPassword($username, $post_password); //Check of het ingevoerde wachtwoord hetzelfde is
                    
                        if($passverify != true) { //Als het ingevoerde wachtwoord niet hetzelfde is
                            $hashedpassword = $security->Hash($post_password); //Hash het wachtwoord
                            $user->Set("$userid", "password", "$hashedpassword"); //Sla het wachtwoord op
                        }
                }
                
                //Rang edit check
                if($post_rank != $rank) {
                    $user->Set("$userid", "rank_id", "$post_rank");
                    $rank = $post_rank;
                }
                
                if($post_firstname != $first_name) {
                    $user->Set("$userid", "first_name", "$post_firstname");
                    $first_name = $post_firstname;
                }
                
                if($post_lastname != $last_name) {
                    $user->Set("$userid", "last_name", "$post_lastname");
                    $last_name = $post_lastname;
                }
                
                if($post_address != $address) {
                    $user->Set("$userid", "address", "$post_address");
                    $address = $post_address;
                }
                
                if($post_postalcode != $postal_code) {
                    $user->Set("$userid", "postal_code", "$post_postalcode");
                    $postal_code = $post_postalcode;
                }
                
                if($post_email != $email) {
                    $user->Set("$userid", "email", "$post_email");
                    $email = $post_email;
                }
                
            $_SESSION["successmsg"] = "Uw wijzigingen zijn succesvol doorgevoerd.";
            
            }
        
        }
        
    } else {
        
        //Gebruiker bestaat niet
        die("User does not exist."); //Stop met het laden van de pagina
        
    }
    
} else {
    
    //Indien geen variabele meegegeven
    die("Ongeldig paginaverzoek. Uw gegevens staan opgeslagen voor nader onderzoek."); //Stop met laden en geef een melding
    
}


if(isset($_SESSION["successmsg"])) {
    $successmsg = $_SESSION["successmsg"];
    print("<script src='../assets/js/noty/jquery.noty.js'></script><script type='text/javascript'>noty({text: '$successmsg', type: 'success', layout: 'top', theme: 'relax', timeout: 10000});</script>");
    unset($_SESSION["successmsg"]);
}

?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid" style="position: relative;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Personeel Wijzigen</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    
           <form class="form" action="" method="POST" style="width: 300px;">
                
                <div class="form-group">
                
                <label for="inputUsername">Gebruikersnaam</label><br />
                <input type="text" id="inputUsername" class="form-control" placeholder="Gebruikersnaam" value="<?php echo($username); ?>" disabled autofocus name="username"><br />
                
                <label for="inputPassword">Wachtwoord (invullen = aanpassen)</label><br />
                <input type="text" id="inputPassword" autocomplete="off" class="form-control" placeholder="Alleen invullen als je dit aan wilt passen!" value="" name="password"><br />
                
                </div>
                
                <p>
                
                <label for="inputFirstname">Voornaam</label><br />
                <input type="text" id="inputFirstname" class="form-control" placeholder="Voornaam" value="<?php echo($first_name); ?>" required name="firstname"><br />
                
                <label for="inputLastname">Achernaam</label><br />
                <input type="text" id="inputLastname" class="form-control" placeholder="Achternaam" value="<?php echo($last_name); ?>" required name="lastname"><br />
                
                <label for="inputAddress">Adres</label><br />
                <input type="text" id="inputAddress" class="form-control" placeholder="Adres" value="<?php echo($address); ?>" required name="address"><br />
                
                <label for="inputLastname">Postcode</label><br />
                <input type="text" id="inputPostalcode" class="form-control" placeholder="Postcode" value="<?php echo($postal_code); ?>" required name="postalcode"><br />
                    
                <label for="inputEmail">Email adres</label><br />
                <input type="email" id="inputEmail" class="form-control" placeholder="Email" value="<?php echo($email); ?>" required name="email"><br />
                
                <label for="inputRank">Rang</label><br />
                <input type="text" id="inputRank" class="form-control" placeholder="Email" value="<?php echo($rank); ?>" required name="rank"><br />
                
                </p>
                
                <button class="btn btn-lg btn-primary btn-right" backgroundcolor="grey" type="submit" name="submit">Aanpassen</button><br />
                <p />
            </form>
                    
            <table border='1' style='position: absolute; left: 350px; top: 15%;'>
            <?php $user->staffList(); ?>
            
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->


<?php include("../inc/parts/staff-footer.php"); ?>