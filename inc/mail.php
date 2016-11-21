<?php

require_once "phpmailer/PHPMailerAutoload.php";

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['comments'];


$m = new PHPMailer;

$m->isSMTP();
$m->SMTPAuth = true;
$m->SMTPDebug = 2;
$m->Host = "smtp.gmail.com";
$m->Username = "testbema@gmail.com";
$m->Password = "BEMAtest1234";
$m->SMTPSecure = 'ssl';
$m->Port = 465;

$m->From = $email;
$m->FromName = $name;
$m->addReplyTo($email, $name);
$m->addAddress("testbema@gmail.com", "bema");
$m->Subject = $subject;
$m->Body = $message;
//
//var_dump($m->send());
$m->send();
?>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/bootstrap.js"></script>
<div class="alert alert-succes">
    <strong>mail is succesvol verstuurd.</strong> <br> u word nu verwezen naar de hoofdpagina.
</div>

<?php

sleep(3);
header("Location: ../index.php");
?>