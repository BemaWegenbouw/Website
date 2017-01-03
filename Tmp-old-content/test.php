<?php 
 require_once "inc/phpmailer/PHPMailerAutoload.php";

 //mail info
			
				$post_name = "joey";
				$email = "j.benning@hotmail.nl";
				$subject = "fuck you";
				$msg = "hahahahahaha";
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
		
				
			// did files get send
			if(isset($_FILES) && !empty($_FILES)){
				$files = array();
				
			 $have_file = ($_FILES['file']['error'] != UPLOAD_ERR_NO_FILE);
			if($have_file){
			// define allowed extensions
				$allowedExtensions = array("pdf","doc","docx","gif","jpeg","jpg","png","rtf","txt","rar","zip");	
				
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
				foreach($files as $key => $value){
				$m->addAttachment($server_file,$file_name);
				}
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
				

					
					
					foreach($files as $file){
					$afile = fopen($server_file,"rb");
					$data = fread($afile,filesize($server_file));
					fclose($afile);
					$data = chunk_split(base64_encode($data));
					
				//	$message .= "Content-Type: {\"application/octet-stream\"};\n";
				//	$message .= "name=\"$file_name\"\n";
				//	$message .= "Content-Disposition: attachment;\n";
				//	$message .= "filename=\"$file_name\"\n";
				//	$message .=	"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
				//	$message .= "--{$mime_boundary}\n";
				}
					
					
					$m->From = $email;
					$m->FromName = $post_name;
					$m->addReplyTo($email, $post_name);
					$m->addAddress("j.benning@hotmail.nl", "bema");
					$m->Subject = $subject;
					$m->Body = $msg;

					$m->send();
					print_r($files);
					print (
					
					'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-success alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_success")); ?></span>
                                    </div>');
					
					
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
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
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
					 
		else{
			print (
					
					'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_success")); ?></span>
                                    </div>');
		}
?>

 

<html>
<head>
		<script type="text/javascript">
var i = 1;
function addKid(){
	if (i <= 3){
		i++;	
    	var div = document.createElement('div');
		div.setAttribute('class', 'myclass');
    	div.innerHTML = '<input type="button" value="-" onclick="removeKid(this)"><input type="file" name="file_'+i+'" >';
    	document.getElementById('kids').appendChild(div);
	}
}

function removeKid(div) {	
    document.getElementById('kids').removeChild( div.parentNode );
	i--;
}
</script>


</head>
	<body>
<form method="post" action="test.php" enctype="multipart/form-data" >
	
  <div class="col-sm-6 form-group">
						<input type="button" style="width:50%;" id="add_kid()" onClick="addKid()" value="+ (limit 4)" />
						
						<div id="kids">
							<input type="file" name="file_1" >
						</div>   				
						 </div>   
</form>


<script type="text/javascript">
var i = 1;
function addKid(){
	if (i <= 3){
		i++;	
    	var div = document.createElement('div');
		div.setAttribute('class', 'myclass');
    	div.innerHTML = '<input type="text" name="child_'+i+'" ><input type="button" value="-" onclick="removeKid(this)">';
    	document.getElementById('kids').appendChild(div);
	}
}

function removeKid(div) {	
    document.getElementById('kids').removeChild( div.parentNode );
	i--;
}
</script>

	</body>
</html>