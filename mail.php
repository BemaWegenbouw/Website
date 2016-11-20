<?php

//if ($_POST['submit']) {
/* Anything that goes in here is only performed if the form is submitted */
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['comments'];
$from = "From: $name";
$to = 'P.h.vanurk@gmail.com';
$subject = 'Hello';

$body = "From: $name\n E-Mail: $email\n Message:\n $message";

if (mail($to, $subject, $body, $from)) {
    echo '<p>Your message has been sent!</p>';
} else {
    echo '<p>Something went wrong, go back and try again!</p>';
}
//} else {
//print ("er is iets fout gegaan.");
//print(" <a href='index.php'>hoofdpagina</a> ");
//}
?>