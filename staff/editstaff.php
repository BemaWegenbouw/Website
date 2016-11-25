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
            
            //if(isset($_POST["username"]) && isset($_POST["password"])) {
            
            //Stel post variabelen in
            $post_username = $_POST["username"];
            $post_password = $_POST["password"];
            $post_rank = $_POST["rank"];
            
                //Gebruikersnaam edit check
                if($post_username != $username) {
                    $user->Set("$userid", "username", "$post_username");
                }
                
                //Rang edit check
                if($post_username != $username) {
                    $user->Set("$userid", "rank_id", "$post_rank");
                }
            
            //}
        
        }
        
    } else {
        
        //Gebruiker bestaat niet
        die("User does not exist."); //Stop met het laden van de pagina
        
    }
    
} else {
    
    //Indien geen variabele meegegeven
    die("Ongeldig paginaverzoek. Uw gegevens staan opgeslagen voor nader onderzoek."); //Stop met laden en geef een melding
    
}

?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Personeel Wijzigen</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    
            <div class="container">
            <form class="form-signin" action="" method="POST">
                <p>
                
                <label for="inputUsername">Gebruikersnaam</label>
                <input type="text" id="inputUsername" class="form-control" placeholder="Gebruikersnaam" value="<?php echo($username); ?>" disabled autofocus name="username">
                
                <label for="inputPassword">Wachtwoord (invullen indien je dit aan wilt passen)</label>
                <input type="password" id="inputPassword" autocomplete="off" class="form-control" placeholder="Alleen invullen als je dit aan wilt passen!" value="" name="password">
                
                </p>
                
                <p>
                
                <label for="inputFirstname">Voornaam</label>
                <input type="text" id="inputFirstname" class="form-control" placeholder="Voornaam" value="<?php echo($first_name); ?>" required autofocus name="firstname">
                
                <label for="inputLastname">Achernaam</label>
                <input type="text" id="inputLastname" class="form-control" placeholder="Achternaam" value="<?php echo($last_name); ?>" required autofocus name="lastname">
                
                <label for="inputAddress">Adres</label>
                <input type="text" id="inputAddress" class="form-control" placeholder="Adres" value="<?php echo($address); ?>" required autofocus name="address">
                
                <label for="inputLastname">Postcode</label>
                <input type="text" id="inputPostalcode" class="form-control" placeholder="Postcode" value="<?php echo($postal_code); ?>" required autofocus name="postalcode">
                    
                <label for="inputEmail">Email adres</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email" value="<?php echo($email); ?>" required autofocus name="email">
                
                <label for="inputRank">Rang</label>
                <input type="text" id="inputRank" class="form-control" placeholder="Email" value="<?php echo($rank); ?>" required autofocus name="rank">
                
                </p>
                
                <button class="btn btn-lg btn-primary btn-block" backgroundcolor="grey" type="submit" name="submit">Aanpassen</button>
                <p />
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