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
                            <input class="form-control" id="subject" name="subject" placeholder="Onderwerp" type="text" required>
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
                                    '<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">Uw mail is niet verzonden.</span>
                                        <span data-notify="message"><br>De naam is nog niet ingevuld.</span>
                                    </div>'
                            );
                        } elseif (empty($_POST["email"])) {
                            print(
                                    '<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">Uw mail is niet verzonden.</span>
                                        <span data-notify="message"><br>het emailadres is nog niet ingevuld.</span>
                                    </div>'
                            );
                        } elseif (empty($_POST["subject"])) {
                            print(
                                    '<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">Uw mail is niet verzonden.</span>
                                        <span data-notify="message"><br>Het onderwerp is nog niet ingevuld.</span>
                                    </div>'
                            );
                        } elseif (empty($_POST["comments"])) {
                            print(
                                    '<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">Uw mail is niet verzonden.</span>
                                        <span data-notify="message"><br>Het tekstveld is nog niet ingevuld.</span>
                                    </div>'
                            );
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
                                    '<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-success alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-envelope"></span>
                                        <span data-notify="title">Uw mail is succesvol verzonden.</span>
                                        <!--<span data-notify="message">{2}</span>-->
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
<script src="assets/js/bootstrap-notify.js"></script>
<?php include("inc/parts/footer.php"); ?>