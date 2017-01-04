<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-edit";
require_once("../inc/engine.php");

if($user->Get($_SESSION["uid"], "rank_id") < $permission->Get("edit_staff")) {
header("Location: dashboard.php");
die("Unauthorized."); }

include("../inc/parts/staff-header.php");
$checkrank = false;
$changeinfo = '';
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
            
			
            if($user->Get($_SESSION["uid"], "rank_id") < $user->Get($userid, "rank_id")) {
				$checkrank = true;	
			}else{
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
                
           
            $changeinfo = true;
            }
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-header">Personeel Wijzigen</h1>
                    </div>
                    <!-- /.col-lg-12 -->
				</div>	
        <!-- start gehele vrijvraag tabel -->
		<div class='row'>
		<div class='col-sm-8'>
		<div class='col-sm-12 panel panel-default'>
		<div class='panel'>
		<h1> Complete Personeelslijst</h1>
		</div>
		
		<div  width="auto" class='panel-body'>
		<table width="100%"class='table table-striped table-bordered table-hover' id='scrolltable'>
		<thead>
			<tr>
				<th>GebruikerID</th>
				<th>Accountnaam</th>
				<th>Rang</th>
				<th>Voornaam</th>
				<th>Achternaam</th>
				<th>Adres</th>
				<th>Postcode</th>
				<th>E-mail</th>	
				<th>Functie</th>
				<th>Bewerken</th>				
			</tr>
        </thead>
		<tbody>
		<?php $user->staffList();?>		
		</tbody>
		</table>
		</div>
		</div>
		</div>
		
        <!-- eind gehele vrijvraag tabel -->
		
		   
           <form class="form col-sm-4" action="" method="POST" style="width: 300px;">
                <?php if ($checkrank) { ?>
						<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">Uw rank is niet hoog genoeg om gegevens van de admin te wijzigen</span>
                        </div>
						<?php } ?>
						<?php if ($changeinfo) { ?>
						<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-success alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">De gegevens zijn succesvol gewijzigd.</span>
                        </div>
						<?php } ?>					
                <div class="form-group">
                
                <label for="inputUsername">Gebruikersnaam</label><br />
                <input type="text" id="inputUsername" class="form-control" placeholder="Gebruikersnaam" value="<?php echo($username); ?>" disabled autofocus name="username"><br />
                
                <label for="inputPassword">Wachtwoord (invullen = aanpassen)</label><br />
                <input type="password" id="inputPassword" autocomplete="off" class="form-control" placeholder="Alleen invullen als je dit aan wilt passen!" value="" name="password"><br />
                
                </div>
                
                
                
                <label for="inputFirstname">Voornaam</label><br />
                <input type="text" id="inputFirstname" class="form-control" placeholder="Voornaam" value="<?php echo($first_name); ?>" required name="firstname"><br />
                
                <label for="inputLastname">Achernaam</label>
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
                              
                </div>
                <!-- /.row -->
			
			</div>
			<!-- /.container-fluid -->

		
        </div>  
       
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->


<?php include("../inc/parts/staff-footer.php"); ?>