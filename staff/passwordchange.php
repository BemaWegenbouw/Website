<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-blank";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");


		$userid= $_SESSION["uid"];
        $username = $user->Get($userid, 'username');
		$passwordchange = '';
		
			
		if(isset($_POST["username"]) && isset($_POST["oldpassword"])
			&& isset($_POST["newpassword1"]) && isset($_POST["newpassword2"])){
		
		if(isset($_POST['newpassword1']) == isset($_POST['newpassword2'])) {      
			$post_password = $_POST["newpassword1"]; //Stel wachtwoord post variabele in               
				 
			$password = $user->Get($userid, 'password'); //Haal wachtwoord op uit database
                    
			$passverify = $security->checkPassword($username, $post_password); //Check of het ingevoerde wachtwoord hetzelfde is
			
				if($passverify != true) { //Als het ingevoerde wachtwoord niet hetzelfde is
					$hashedpassword = $security->Hash($post_password); //Hash het wachtwoord
					$user->Set("$userid", "password", "$hashedpassword"); //Sla het wachtwoord op
				}
		
			$passwordchange = true;
       
		}
	}else{
		$passwordchange = false;
	}
	

?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid" style="position: relative;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Wachtwoord Wijzigen</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    
           <form class="form" action="" method="POST" style="width: 300px;">
              <?php if($passwordchange) { ?>
				<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-success alert-dismissable" role="alert">
				<button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
				<span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
				<p>Het wachtwoord is successvol gewijzigd!</p>			
				</div>
			  <?php } ?>
			  <?php if($passwordchange == false) { ?>
				<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
				<button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
				<span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
				<p>Het wachtwoord is niet gewijzigd!</p>				
				</div>
			  <?php } ?>
                <div class="form-group">
                
                <label for="inputUsername">Gebruikersnaam</label><br />
                <input type="text" id="inputUsername" class="form-control" placeholder="Gebruikersnaam" value="<?php echo($username); ?>" disabled autofocus name="username"><br />
                
                <label for="inputPassword">Oude wachtwoord</label><br />
                <input type="text" id="inputPassword" autocomplete="off" class="form-control" placeholder="Oude wachtwoord" value="" name="oldpassword"><br />
                
				<label for="inputPassword">Nieuwe wachtwoord</label><br />
                <input type="text" id="inputPassword" autocomplete="off" class="form-control" placeholder="Nieuwe wachtwoord" value="" name="newpassword1"><br />
                
				<label for="inputPassword">Nieuwe wachtwoord (check)</label><br />
                <input type="text" id="inputPassword" autocomplete="off" class="form-control" placeholder="Herhaal wachtwoord" value="" name="newpassword2"><br />
                
                </div>
				
                <button class="btn btn-lg btn-primary btn-right" backgroundcolor="grey" type="submit" name="submit">Aanpassen</button><br />
                <p />
            </form>
                    
            <table border='1' style='position: absolute; left: 350px; top: 15%;'>
           
            
                    
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