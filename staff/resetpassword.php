<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "resetpassword";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");
require_once "../inc/phpmailer/PHPMailerAutoload.php";

	$sendstatus = '';

	if(isset($_POST) && !empty($_POST)) {
				
	$unknown_username = $_POST['username'];
	$unknowm_user_id = $user->getID($unknown_username);
	
		if ($unknowm_user_id != 0){
				
				if (empty($_POST["username"])) {
					print(
						'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">'."Vul a.u.b. uw account naam in.".'</span>
                                    </div>');
				}
				
				if(isset($_POST['username']) && !empty($_POST['username'])){
						
						$temp_code =  substr(md5(uniqid(mt_rand(), true)) , 0, 8);
						$currenturl = $_SERVER['REQUEST_URI'];
						$url = $currenturl."?tempcode=".$temp_code;
						$name = $_POST['username'];
						$userid= $user->getID($name);
						$useremail = $user->Get($userid, 'email');
						$fromemail = 'j.benning@hotmail.nl';
						$subject = 'Wachtwoord reset';
						$message = 'Klik op de onderstaande link om uw wachtwoord te resetten';

						$m = new PHPMailer;

						$m->isSMTP();
						$m->SMTPAuth = true;
						$m->SMTPDebug = 0;
						$m->Host = "smtp.gmail.com";
						$m->Username = "testbema@gmail.com";
						$m->Password = "BEMAtest1234";
						$m->SMTPSecure = 'ssl';
						$m->Port = 465;

						$m->From = $fromemail;
						$m->FromName = $name;
						$m->addReplyTo($fromemail, $name);
						$m->addAddress($useremail, "Wachtwoord reset");
						$m->Subject = $subject;
						$m->Body = $message. "\n". "http://localhost/staff/passwordresetForm.php?tempcode=".$temp_code;

						$m->send();
						$restore->insert($userid,$temp_code);	
						$sendstatus = 'success';	
						
						
				}else{
					$sendstatus = 'failed';
				}
		}else {
			$sendstatus = 'unknown';
		}
}
?>
	<!-- start contrainer pagina-->
    <div class="container">
        <form class="form-signin" action="" method="POST" style="width: 300px;">

                <div class="form-group">
                <h2 class="form-signin-heading">Wachtwoord vergeten?</h2>
                <label for="inputUsername">Vul uw gebruikersnaam in.</label><br />
                <input type="text" id="inputUsername" class="form-control" placeholder="Gebruikersnaam" value="" required name="username"><br />
                </div>				
                <button class="btn btn-lg btn-primary btn-right" backgroundcolor="grey" type="submit" name="submit">verzenden</button><br />
				<br>
				<?php if($sendstatus == 'success') { ?>
				<div data-notify="container" class="col-xs-12 col-sm-12 alert alert-{0}alert alert-success alert-dismissable" role="alert">
				<button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
				<span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
				<p>Er is een mail verzonden naar het gekoppelde mail adres van dit account.</p>				
				</div>
				<?php } ?>
				<?php if($sendstatus == 'failed') { ?>
				<div data-notify="container" class="col-xs-12 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
				<button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
				<span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
				<p>Er is geen mail verzonden probeer het opnieuw.</p>				
				</div>
				<?php } ?>
				<?php if($sendstatus == 'unknown') { ?>
				<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
				<button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
				<span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
				<span data-notify="title">Dit account wordt niet herkend, probeer het opnieuw.</span>
				</div>
				<?php } ?>
				</form>		           
    </div> 
	<!-- /container -->

<?php

include("../inc/parts/staff-footer.php");

?>
