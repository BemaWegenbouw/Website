 <?php 
 require_once "inc/phpmailer/PHPMailerAutoload.php";
 
//mail info
			
				$post_name = 'joey';
				$email = 'j.benning@hotmail.nl';
				$subject = '2 attachments';
				$msg = 'hahahahahaa';
				$headers = "From: $email";

		// did files get send
			if(isset($_FILES['file']) && !empty($_FILES['file'])){
				$files = array();
				
			 $have_file = ($_FILES['file']['error'] != UPLOAD_ERR_NO_FILE);
			if($have_file){
			// define allowed extensions
				$allowedExtensions = array("pdf","doc","docx","gif","jpeg","jpg","png","rtf","txt");	
				
			//loop trough all the files
			foreach($_FILES as $name=>$file) {
				
		
			// define some variables
				$file_name = $file['name']; 
				$temp_name = $file['tmp_name'];
				$file_type = $file['type'];
			// check if this file type is allowed
				$path_parts = pathinfo($file_name);
				$ext = $path_parts['extension'];
				if(!in_array($ext,$allowedExtensions)) {
						die("File $file_name has the extensions $ext which is not allowed");
					}
					
			// move this file to the server YOU HAVE TO do THIS.
				$server_file = "upload/$path_parts[basename]";
				move_uploaded_file($temp_name,$server_file);
			//add this file to the array of files
				array_push($files,$file);
			}
			
			// boundary
				$semi_rand = md5(time()); 
				$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
			
			// tell header about the boundary
				$headers .= "\nMIME-Version: 1.0\n";
				$headers .= "Content-Type: multipart/mixed;\n";
				$headers .= " boundary=\"{$mime_boundary}\"";
				$headers .= "\nMIME-Version: 1.0\n";
			
			// part 1 define plain text email
			//	$message ="\n\n--{$mime_boundary}\n";
			//	$message .="Content-Type: text/plain; charset=\"iso-8859-1\"\n";
			//	$message .="Content-Transfer-Encoding: 7bit\n\n" . $msg . "\n\n";
			//	$message .= "--{$mime_boundary}\n";
			// part 2 loop and define mail attachements 
				for($i = 0; $i<count($server_file); $i++) {
					$afile = fopen($server_file[$i],"rb");
					$data = fread($afile,filesize($server_file[$i]));
					fclose($afile);
					$name = $file_name[$i];
					$data = chunk_split(base64_encode($data));
				//	$message .= "Content-Type: {\"application/octet-stream\"};\n";
				//	$message .= "name=\"$file_name\"\n";
				//	$message .= "Content-Disposition: attachment;\n";
				//	$message .= "filename=\"$file_name\"\n";
				//	$message .=	"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
				//	$message .= "--{$mime_boundary}\n";
				}

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
					
					$m->addAttachment($server_file);
					$m->From = $email;
					$m->FromName = $post_name;
					$m->addReplyTo($email, $post_name);
					$m->addAddress("j.benning@hotmail.nl", "bema");
					$m->Subject = $subject;
					$m->Body = $msg;

					$m->send();
					
					print "succes attachement";
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
					print "succes";
			}
			}
					 
		
				
					

	

 

?>

 

<html>

	<body>

		<form method="post" action="test.php" enctype="multipart/form-data">

			<input type="file" name="file1"/>
		<input type="file" name="file1"/>
			<input type="submit" value="submit"/>

		</form>

	</body>

</html>