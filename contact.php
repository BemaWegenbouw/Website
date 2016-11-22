<?php
//Bema Wegenbouw BV Website
//Copyright 2016

require_once("inc/engine.php");
$page = "contact";
include("inc/parts/header.php");
?>

<div class="container" id="Contact">
<div id="contact" class="container-fluid" style="margin-top: -125px;">

<div class="row">

    <div class="col-sm-5">
        <h2 class="">Contactinformatie</h2>
        <p>Neem contact met ons op en u ontvangt binnen 24 uur een bericht terug.</p>
        <p><span class="glyphicon glyphicon-map-marker orangeglyph"></span> Enschede, NL</p>
        <p><span class="glyphicon glyphicon-earphone orangeglyph"></span> +31 (0)534779223</p>
        <p><span class="glyphicon glyphicon-phone orangeglyph"></span> +31 (0)613471605</p>
        <p><span class="glyphicon glyphicon-envelope orangeglyph"></span> <a href="mailto:info@bemawegenbouw.nl">info@bemawegenbouw.nl</a> </p>
    </div>
    <div class="col-sm-7">
        <h2 class="">Contactformulier</h2>
        <p>Indien u een afspraak wilt maken, of als u vragen heeft.
            Kunt u hieronder een email naar sturen. </p>
        
        <form action="#" method="post">
            <div class="row">
                
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Naam" type="text" required>
                </div>
                
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
                
                <div class="col-sm-12 form-group">
                    <input class="form-control" id="subject" name="subject" placeholder="onderwerp" type="text" required>
                </div>
                
                <div class="col-sm-12 form-group">
                <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5" requierd></textarea>
                </div>
                
                <div class="col-sm-12 form-group">
                <div class="g-recaptcha" data-sitekey="6Ld3mQwUAAAAADPQ8o2-v5q5PGg2ExDm9_f0lmF4"></div>
                </div>
                    
                <div class="col-sm-12 form-group">
                <button class="btn btn-default pull-left" type="submit" name="submit" value="Submit">Verzenden</button>
                </div>
                    
                </div>
                

<?php
require_once "inc/phpmailer/PHPMailerAutoload.php";
if (isset($_POST) && !empty($_POST)) {

    if (empty($_POST["name"])) {
        print(
                '<div id="mailfail" class="alert alert-succes alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Naam ontbreekt.</strong>
                </div>');
    } elseif (empty($_POST["email"])) {
        print(
                '<div id="mailfail" class="alert alert-succes alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Email ontbreekt.</strong>
                </div>');
    } elseif (empty($_POST["subject"])) {
        print(
                '<div id="mailfail" class="alert alert-succes alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Onderwerp ontbreekt.</strong>
                </div>');
    } elseif (empty($_POST["comments"])) {
        print(
                '<div id="mailfail" class="alert alert-succes alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Tekstveld is leeg.</strong>
                </div>');
    } else {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['comments'];


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
        $m->FromName = $name;
        $m->addReplyTo($email, $name);
        $m->addAddress("testbema@gmail.com", "bema");
        $m->Subject = $subject;
        $m->Body = $message;

        $m->send();

        print(
                '<div id="mailsuccess" class="alert alert-succes alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Uw mail is succesvol verzonden.</strong>
                </div>'
        );
    }
}
?>

        </form>
    </div>
</div>
</div>
</div>

<div style="margin-left: 17.5%; margin-right: 17.5%; border-top-style: dotted; padding-bottom: 50px; color: #AEAEAE99;"></div>

<div class="container-fluid" style="margin-top: -75px;">
  <h2 class="text-center">Bema Wegenbouw BV - Hoofdkantoor</h2>
    <div id="googleMap" class="container gmap"></div>
</div>
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

<?php include("inc/parts/footer.php"); ?>