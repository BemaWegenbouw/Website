<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "resetpassword";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

$tempcode = $_GET['tempcode'];
$userID = $restore->getID($tempcode);	
$userNAME = $user->get($userID,'username');

$resetsuccess = '';

$tempcodeexists = array_search($tempcode, $restore->checkTempc($userID));

if($tempcodeexists == false) {
header("Location:login.php");
die("Unauthorized."); 

}else{

		if(isset($_POST) && !empty($_POST)) {
        
			$checknewpassword1 = $_POST["newpassword1"];
			$checknewpassword2 = $_POST["newpassword2"];    
			
			if ($checknewpassword1 == $checknewpassword2){
				//Stel post variabelen in	
				$post_newpassword = $_POST["newpassword1"];	
				$hashedpassword = $security->Hash($post_newpassword); //Hash het wachtwoord
				$user->Set("$userID", "password", "$hashedpassword"); //Sla het wachtwoord op
				
				$restore->del($userID); // delete alle tijdelijke passwords
				
				$resetsuccess = 'true';
			}else{
				$resetsuccess = 'false';	
				}
			
		}
}
?>


    <div class="container">

        <form class="form-signin" action="" method="POST" style="width: 300px;">

                <div class="form-group">
                        <h2 class="form-signin-heading">Verander uw wachtwoord</h2>
                <label for="inputUsername">Gebruikersnaam</label><br />
                <input type="text" id="inputUsername" class="form-control" placeholder="Gebruikersnaam" value="<?php echo($userNAME); ?>" disabled autofocus name="username"><br />
                
				<label for="inputPassword">Nieuwe wachtwoord</label><br />
                <input type="password" id="inputPassword" autocomplete="off" class="form-control" placeholder="Nieuwe wachtwoord" value="" name="newpassword1"><br />
                
				<label for="inputPassword">Nieuwe wachtwoord (check)</label><br />
                <input type="password" id="inputPassword" autocomplete="off" class="form-control" placeholder="Herhaal wachtwoord" value="" name="newpassword2"><br />
                
                </div>
				
                <button class="btn btn-lg btn-primary btn-right" backgroundcolor="grey" type="submit" name="submit">Aanpassen</button><br />
                <p />
				<?php if($resetsuccess == 'true') { ?>
				<meta http-equiv="refresh" content="7;url=login.php"> 
				<div data-notify="container" class="col-xs-12 col-sm-12 alert alert-{0}alert alert-success alert-dismissable" role="alert">
				<button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
				<span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
				<p>De instellingen zijn successvol gewijzigd!<br>U wordt doorverwezen naar het inlogscherm in 7 seconden</p>				
				</div>
				<?php } ?>
				<?php if($resetsuccess == 'false') { ?>
				<div data-notify="container" class="col-xs-12 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
				<button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
				<span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
				<p>De instellinge zijn niet verzonden!</p>				
				</div>
				<?php } ?>
            </form>

    </div> <!-- /container -->

<?php

include("../inc/parts/staff-footer.php");

?>