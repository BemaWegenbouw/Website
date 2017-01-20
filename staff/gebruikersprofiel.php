<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-blank";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");


		$userid= $_SESSION["uid"];
 
        $username = $user->Get($userid, 'username');
		$rank = $user->Get($userid, 'rank_id');
        $first_name = $user->Get($userid, 'first_name');
        $last_name = $user->Get($userid, 'last_name');
        $address = $user->Get($userid, 'address');
        $postal_code = $user->Get($userid, 'postal_code');
        $email = $user->Get($userid, 'email');
        $function = $user->Get($userid, 'function');

		$geslaagdbericht = false;
		
		if(isset($_POST) && !empty($_POST)) {
        
            //Indien gepost, check post
            
            if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["address"]) && isset($_POST["postalcode"]) && isset($_POST["email"])) {
            
            //Stel post variabelen in
            $post_firstname = $_POST["firstname"];;
            $post_lastname = $_POST["lastname"];
            $post_address = $_POST["address"];
            $post_postalcode = $_POST["postalcode"];
            $post_email = $_POST["email"];
                
            
                
                //Rang edit check
                if($post_firstname != $first_name) {
                    $user->Set("$userid", "first_name", "$post_firstname");
                    $first_name = $user->Get($userid, 'first_name');
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
                
				$geslaagdbericht = true;
            
            }
        
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
              <?php if($geslaagdbericht) { ?>
				<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-success alert-dismissable" role="alert">
				<button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
				<span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
				<p>De instellinge zijn successvol gewijzigd!</p>				
				</div>
			  <?php } ?>
                <div class="form-group">
                
                <label for="inputUsername">Gebruikersnaam</label><br />
                <input type="text" id="inputUsername" class="form-control" placeholder="Gebruikersnaam" value="<?php echo($username); ?>" disabled autofocus name="username"><br />
              
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
                
                <label for="inputRank">Rank</label><br />
                <input type="text" id="inputRank" class="form-control" placeholder="rang" value="<?php echo($rank); ?>" disabled autofocus name="rank"><br />
                
				<label for="inputFunction">Functie</label><br />
                <input type="text" id="inputFunction" class="form-control" placeholder="functie" value="<?php echo($function); ?>" disabled autofocus name="function"><br />
                
                </p>
                
                <button class="btn btn-lg btn-primary btn-right" backgroundcolor="grey" type="submit" name="submit">Aanpassen</button><br />
                <p />
            </form>                                        
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->

<?php

include("../inc/parts/staff-footer.php");

?>