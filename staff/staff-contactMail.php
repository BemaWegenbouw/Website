<?php
// start contact form
require_once "../inc/phpmailer/PHPMailerAutoload.php";
	if(isset($_POST['submit'])){		

				session_start();
				$_SESSION['name']= $_POST['name'];
				$_SESSION['email']= $_POST['email'];
				$_SESSION['subject']= $_POST['subject'];
				$_SESSION['comments']= $_POST['comments'];
				
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
					// print this when mail was send successvoly
						print "<script type='text/javascript'>window.location.href = 'staff-contact.php?status=true';</script>";		
					}else{
					 // print this when mail was not send successvoly
						print "<script type='text/javascript'>window.location.href = 'staff-contact.php?status=false';</script>";	
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
					// print this when mail was send successvoly
						print "<script type='text/javascript'>window.location.href = 'staff-contact.php?status=true';</script>";		
					}else{
					 // print this when mail was not send successvoly
						print "<script type='text/javascript'>window.location.href = 'staff-contact.php?status=false';</script>";
					}
			}
		}
		
			}else{
				
				
				// check missing inputs
				if (empty($_POST["name"])) {
						$name= true;
				}else{
					$name = false;
				}
				
				if (empty($_POST["email"])) {
						$email = true;
				}else{
					$email = false;
				}
				
				if (empty($_POST["subject"])) {
						$subject = true;
				}else{
					$subject = false;
				}
				
				if (empty($_POST["comments"])) {
						$comments = true;
				}else{
					$comments = false;
				}
				
				print "<script type='text/javascript'>window.location.href = 'staff-contact.php?name=".$name."&email=".$email."&subject=".$subject."&comments=".$comments."'</script>";
			}
	}			
	
?>