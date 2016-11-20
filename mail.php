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

$m->From = "testbema@gmail.com";
$m->FromName = $name;
$m->addReplyTo("testbema@gmail.com", $name);
$m->addAddress("testbema@gmail.com", "bema");
$m->subject = $subject;
$m->Body = $message;

var_dump($m->send());





//if ($_POST['submit']) {
/* Anything that goes in here is only performed if the form is submitted */

$from = "From: $name";
$to = 'P.h.vanurk@gmail.com';
$subject = 'Hello';

////$body = "From: $name\n E-Mail: $email\n Message:\n $message";
////
////if (mail($to, $subject, $body, $from)) {
///    echo '<p>Your message has been sent!</p>';
////} else {
///    echo '<p>Something went wrong, go back and try again!</p>';
////}
//} else {
//print ("er is iets fout gegaan.");
//print(" <a href='index.php'>hoofdpagina</a> ");
//}
?>