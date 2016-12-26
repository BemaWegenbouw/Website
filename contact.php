<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "contact";
require_once("inc/engine.php");
include("inc/parts/header.php");



?>
 <div id="page-wrapper">
<div class="container" id="Contact">
    
	
        <div class="row">

            <div class="col-sm-5">
                <h2 class=""><?php echo(lang('contact_column1_title')); ?></h2>
                <p><?php echo(lang('contact_column1_head')); ?></p>
                <p><span class="glyphicon glyphicon-map-marker orangeglyph"></span><?php echo(lang('contact_column1_text1')); ?><br><?php echo(lang('contact_column1_text1_2')); ?><br><?php echo(lang('contact_column1_text1_3')); ?></p>
																														
                <p><span class="glyphicon glyphicon-earphone orangeglyph"></span><?php echo(lang('contact_column1_text2')); ?></p>
                <p><span class="glyphicon glyphicon-phone orangeglyph"></span><?php echo(lang('contact_column1_text3')); ?></p>
                <p><span class="glyphicon glyphicon-envelope orangeglyph"></span> <a href="mailto:info@bemawegenbouw.nl"><?php echo(lang('contact_column1_text4')); ?></a> </p>
            </div>
            <div class="col-sm-7">

                <h2 class=""><?php echo(lang('contact_column2_title')); ?></h2>
                <p> <?php echo(lang('contact_column2_head')); ?></p>

                <form action="contact.php" enctype="multipart/form-data" method="post">
                    <div class="row">

                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="name" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];}?>" placeholder="<?php echo(lang('contact_column2_placeholder1')); ?>" type="text" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>" placeholder="<?php echo(lang('contact_column2_placeholder2')); ?>" type="email" required>
                        </div>

                        <div class="col-sm-12 form-group">
                            <input class="form-control" id="subject" name="subject" value="<?php if(isset($_POST['subject'])){ echo $_POST['subject'];}?>" placeholder="<?php echo(lang('contact_column2_placeholder3')); ?>" type="text" required>
                        </div>

                        <div class="col-sm-12 form-group">
                            <textarea class="form-control" id="comments" name="comments" placeholder="Vul hier uw bericht in." rows="10" requierd><?php echo $var = isset($_POST['comments']) ? $_POST['comments'] : ''; ?></textarea>
                        </div>
						
                        <div class="col-sm-6 form-group">
                            <div class="g-recaptcha" data-sitekey="6LfqqwwUAAAAAOYfMohh04UsOIsYB1viYok9blcC"></div>
                        </div>
						
						<div class="col-sm-6 form-group">
						<!-- COMPONENT START -->
						
						<div class="input-group">
							<label class="input-group-btn">
								<span class="btn btn-primary">
									Browse&hellip; <input type="file" name="upload[]" style="display: none;" multiple>
							</span>
							</label>
							<input type="text" class="form-control" readonly>
						</div>
						<!-- COMPONENT END -->
						</div>
						
                        <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-left" type="submit" name="submit" value="Submit"><?php echo(lang('contact_column2_button')); ?></button><br>
                        </div>
						

                    </div>			
<?php
//captcha code
require_once "inc/phpmailer/PHPMailerAutoload.php";
	if(isset($_POST['submit'])){
		
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$privatekey = "6LfqqwwUAAAAAC6U79wrMeDciUwRKku4mb9nSK7Z";
		
		$response = file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
		
		$data = json_decode($response);
		
		if(isset($data->success) AND $data->success==true){
			
				////true - What happens when user is verified
				
				if (empty($_POST["name"])) {
					print(
						'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_error1_2")); ?></span>
                                    </div>');
				}elseif (empty($_POST["email"])) {
					print(
							'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_error1_3")); ?></span>
                                    </div>');
				}elseif (empty($_POST["subject"])) {
					print(
							'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_error1_4")); ?></span>
                                    </div>');
				}elseif (empty($_POST["comments"])) {
					print(
							'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_error1_5")); ?></span>
                                    </div>');
				}
				
			//mail info
			
				$post_name = $_POST['name'];
				$email = $_POST['email'];
				$subject = $_POST['subject'];
				$msg = $_POST['comments'];
				$headers = "From: $email";
				
				// send
					$m = new PHPMailer;
					$m->isSMTP();
					$m->SMTPAuth = true;
					$m->SMTPDebug = 0;
					$m->Host = "smtp.gmail.com";
					$m->Username = "testbema@gmail.com";
					$m->Password = "BEMAtest1234";
					$m->SMTPSecure = 'ssl';
					$m->Port = 465;
					
								
			if(isset($_FILES) && !empty($_FILES)){
			// Count # of uploaded files in array
			$total = count($_FILES['upload']['name']);
			// define allowed extensions && file size

			$allowedExtensions = array("pdf","doc","docx","gif","jpeg","jpg","png","rtf","txt","rar","zip");					
			//check if there is an attached file	
			$noFile = $_FILES['upload']['size'][0] == 0 
                 && $_FILES['upload']['tmp_name'][0] == '';
		
			if(!$noFile){	
				// Loop through each file
				for($i=0; $i<$total; $i++) {
				  //Get the temp file path
				$file_name = $_FILES['upload']['name'][$i];
				  $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
					$size = $_FILES['upload']['size'][$i];
					// check if this file type is allowed
					$path_parts = pathinfo($file_name);
					$ext = $path_parts['extension'];
					if(!in_array($ext,$allowedExtensions)) {
							die("Het bestand genaamd $file_name heeft de extentie $ext , wat niet is toegestaan.");
						}
							
					//check file size
					$maxsize = 4194304;
				
					if ($size > $maxsize){
						echo ($file_name . ' Is groter dan de maximale grote van 4 Megabytes.');
						die;
					 }
					  //Make sure we have a filepath
					  if ($tmpFilePath != ""){
						//Setup our new file path
						$newFilePath = "upload/" . $_FILES['upload']['name'][$i];

						//Upload the file into the temp dir
						if(move_uploaded_file($tmpFilePath, $newFilePath)) {
						
							//check if upload was successvol
							$check = $_FILES ['upload']['error'] == UPLOAD_ERR_OK;
							if($check == 0){								
								//attach content to email
								$m->addAttachment($newFilePath);								
						}else{
							echo 'Er was een probleem met het uploaden van het bestand genaamd '.$newFilePath;
							
					  }
					}
				}
				}	
			
					
					
					$m->From = $email;
					$m->FromName = $post_name;
					$m->addReplyTo($email, $post_name);
					$m->addAddress("j.benning@hotmail.nl", "bema");
					$m->Subject = $subject;
					$m->Body = $msg;

					$m->send();
					
					$files = glob('upload/*'); // get all file names
						foreach($files as $file){ // iterate files
						  if(is_file($file))
							unlink($file); // delete file
						}
					if ($m){
						
					
					print (
					
					'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-success alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_success")); ?></span>
                                    </div>');
					}else{
					print (
					
					'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_success")); ?></span>
                                    </div>');	
					}
					
			}else {
				
					// send
					$m = new PHPMailer;
					$m->isSMTP();
					$m->SMTPAuth = true;
					$m->SMTPDebug = 0;
					$m->Host = "smtp.gmail.com";
					$m->Username = "testbema@gmail.com";
					$m->Password = "BEMAtest1234";
					$m->SMTPSecure = 'ssl';
					$m->Port = 465;
					
					
					$m->From = $email;
					$m->FromName = $post_name;
					$m->addReplyTo($email, $post_name);
					$m->addAddress("j.benning@hotmail.nl", "bema");
					$m->Subject = $subject;
					$m->Body = $msg;

					$m->send();
					
					if ($m){
						
					
					print (
					
					'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-success alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_success")); ?></span>
                                    </div>');
					}else{
					print (
					
					'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_success")); ?></span>
                                    </div>');	
					}
			}
		}
					 
		
	}else{
		print (
					
					'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_success")); ?></span>
                                    </div>');	
	  }			
	}
?>

        </form>
    </div>
</div>
</div>


<div class = "container">
<div >
  <h2 class="text-center">Bema Wegenbouw BV - Hoofdkantoor</h2>
    <div id="googleMap" class="container gmap"></div>


<!-- Add Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4rGAUi21LFUmkpQ-DLAKdhaOxTXIlDLo&callback=initMap"></script>
<script>
    var myCenter = new google.maps.LatLng(52.18029079999999, 6.929297700000006);
    function initialize() {
        var mapProp = {
            center: myCenter,
            zoom: 12,
            scrollwheel: true,
            draggable: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        var marker = new google.maps.Marker({
            position: myCenter,
        });
        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
</div>
</div>
</div>
<br>
<?php include("inc/parts/footer.php"); ?>



