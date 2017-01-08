<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-contact";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Contact</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid header -->
			<div class="container-fluid">
                <div class="row">
			<!--Start right COL row 1-->
				<div class="col-sm-7">
					<h2 class=""><?php echo(lang('contact_column2_title')); ?></h2>
					<p>Indien u contact wilt opnemen met uw werkgever kunt u het onderstaande formulier invullen.						
						Alle mails worden verstuurd naar info@bemawegenbouw.nl.<br><br><span style="color:red;">LET OP: Alle velden zijn verplicht.</span></p>
					<!--Start Form contact-->
					<form action="staff-contact.php" enctype="multipart/form-data" method="post">
						<!--Start Row 2-->
						<div class="row">
							<!--Start input name-->
							<div class="col-sm-6 form-group">
								<input class="form-control" id="name" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];}?>" placeholder="<?php echo(lang('contact_column2_placeholder1')); ?>" type="text" required>
							</div>
							<!--End input name-->
							<!--Start input email-->
							<div class="col-sm-6 form-group">
								<input class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>" placeholder="<?php echo(lang('contact_column2_placeholder2')); ?>" type="email" required>
							</div>
							<!--End input email-->
							<!--Start input subject-->
							<div class="col-sm-12 form-group">
								<input class="form-control" id="subject" name="subject" value="<?php if(isset($_POST['subject'])){ echo $_POST['subject'];}?>" placeholder="<?php echo(lang('contact_column2_placeholder3')); ?>" type="text" required>
							</div>
							<!--End input subject-->
							<!--Start input comments-->
							<div class="col-sm-12 form-group">
								<textarea class="form-control" id="comments" name="comments" placeholder="<?php echo(lang('contact_column2_placeholder4')); ?>" rows="10" requierd><?php echo $var = isset($_POST['comments']) ? $_POST['comments'] : ''; ?></textarea>
							</div>
							<!--End input comments-->	
							<!--Start Multiple file input-->
							<div class="col-sm-6 form-group">									
							<div class="input-group">
								<label class="input-group-btn">
									<span class="btn btn-primary">
										Browse&hellip; <input type="file" name="upload[]" style="display: none;" multiple>
								</span>
								</label>
								<input type="text" class="form-control" readonly>
							</div>					
							</div>
							<!--End multiple file input-->
							<!--Start Form submit-->
							<div class="col-sm-12 form-group">
								<button class="btn btn-sm btn-primary btn-right" backgroundcolor="grey" type="submit" name="submit">Verzenden</button><br /><br>
							</div>
							<!--End form submit-->
						</div>
						<!--End row 2-->						
<?php
// start contact form
require_once "../inc/phpmailer/PHPMailerAutoload.php";
	if(isset($_POST['submit'])){		

			//check if all fields are filled in
			if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['comments'])){
			//Mail content 
			
				$post_name = $_POST['name'];
				$email = $_POST['email'];
				$subject = $_POST['subject'];
				$msg = $_POST['comments'];
				$headers = "From: $email";
				
				// send account information
					$m = new PHPMailer;
					$m->isSMTP();
					$m->SMTPAuth = true;
					$m->SMTPDebug = 0;
					$m->Host = "smtp.gmail.com";
					$m->Username = "testbema@gmail.com";
					$m->Password = "BEMAtest1234";
					$m->SMTPSecure = 'ssl';
					$m->Port = 465;
					
			//start input file check					
			if(isset($_FILES) && !empty($_FILES)){
				// Count # of uploaded files in array
				$total = count($_FILES['upload']['name']);
					// define allowed extensions && file size
					$allowedExtensions = array("pdf","doc","docx","gif","jpeg","jpg","png","rtf","txt","rar","zip");					
						//check if there is an attached file	
						$noFile = $_FILES['upload']['size'][0] == 0 
							 && $_FILES['upload']['tmp_name'][0] == '';
			//start loop if file is present
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
						$newFilePath = "../upload/" . $_FILES['upload']['name'][$i];

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
			
					
					// prepair en send email
					$m->From = $email;
					$m->FromName = $post_name;
					$m->addReplyTo($email, $post_name);
					$m->addAddress("j.benning@hotmail.nl", "bema");
					$m->Subject = $subject;
					$m->Body = $msg;

					$m->send();
					//delete uploaded files after mail has been send
					$files = glob('../upload/*'); // get all file names
						foreach($files as $file){ // iterate files
						  if(is_file($file))
							unlink($file); // delete file
						}
					if ($m){     // check if mail has been send
						
					
					print (  // print this when mail was send successvoly
					
					'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-success alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">'.(lang("contact_column2_success")).'</span>
                                    </div>');
					}else{
					print ( // print this when mail was not send successvoly
					
					'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">'.(lang("contact_column2_error1")).'</span>
                                        <span data-notify="message"><br>'.(lang("contact_column2_error2_1")).'</span>
                                    </div>');	
					}
					
			}else {  //if no file present do this
				
					// account information
					$m = new PHPMailer;
					$m->isSMTP();
					$m->SMTPAuth = true;
					$m->SMTPDebug = 0;
					$m->Host = "smtp.gmail.com";
					$m->Username = "testbema@gmail.com";
					$m->Password = "BEMAtest1234";
					$m->SMTPSecure = 'ssl';
					$m->Port = 465;
					
					//prepair and send email
					$m->From = $email;
					$m->FromName = $post_name;
					$m->addReplyTo($email, $post_name);
					$m->addAddress("j.benning@hotmail.nl", "bema");
					$m->Subject = $subject;
					$m->Body = $msg;

					$m->send();
					
					if ($m){  //check if mail has been send
						
					
					print (  // print this when mail was send successvoly
					
					'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-success alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">'.(lang("contact_column2_success")).'</span>
                                    </div>');
					}else{
					print (  // print this when mail was not send successvoly
					
					'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">'.(lang("contact_column2_error1")).'</span>
                                        <span data-notify="message"><br>'.(lang("contact_column2_error2_1")).'</span>
                                    </div>');	
					}
			}
		}
		
			}else{
				
				
				// check missing inputs
				if (empty($_POST["name"])) {
					print(
						'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">'.(lang("contact_column2_error1")).'</span>
                                        <span data-notify="message"><br>'.(lang("contact_column2_error2_3")).'</span>
                                    </div>');
				}elseif (empty($_POST["email"])) {
					print(
							'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">'.(lang("contact_column2_error1")).'</span>
                                        <span data-notify="message"><br>'.(lang("contact_column2_error2_4")).'</span>
                                    </div>');
				}elseif (empty($_POST["subject"])) {
					print(
							'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">'.(lang("contact_column2_error1")).'</span>
                                        <span data-notify="message"><br>'.(lang("contact_column2_error2_5")).'</span>
                                    </div>');
				}elseif (empty($_POST["comments"])) {
					print(
							'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">'.(lang("contact_column2_error1")).'</span>
                                        <span data-notify="message"><br>'.(lang("contact_column2_error2_6")).'></span>
                                    </div>');
				}
			}
		
	}			
	
?>
					</form>
					<!--End contact form-->
				</div>
				<!--End right COL row 1-->
			</div>
			</div>	
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php

include("../inc/parts/staff-footer.php");

?>