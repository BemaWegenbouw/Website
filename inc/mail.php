<?php

require_once "PHPMailer/PHPMailerAutoload.php";

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

var_dump($m->send());
?>