<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "contact";
require_once("inc/engine.php");
include("inc/parts/header.php");
?>

<div class="container" id="Contact">
    
	
        <div class="row">

            <div class="col-sm-5">
                <h2 class=""><?php echo(lang('contact_column1_title')); ?></h2>
                <p><?php echo(lang('contact_column1_head')); ?></p>
                <p><span class="glyphicon glyphicon-map-marker orangeglyph"></span><?php echo(lang('contact_column1_text1')); ?></p>
                <p><span class="glyphicon glyphicon-earphone orangeglyph"></span><?php echo(lang('contact_column1_text2')); ?></p>
                <p><span class="glyphicon glyphicon-phone orangeglyph"></span><?php echo(lang('contact_column1_text3')); ?></p>
                <p><span class="glyphicon glyphicon-envelope orangeglyph"></span> <a href="mailto:info@bemawegenbouw.nl"><?php echo(lang('contact_column1_text4')); ?></a> </p>
            </div>
            <div class="col-sm-7">

                <h2 class=""><?php echo(lang('contact_column2_title')); ?></h2>
                <p> <?php echo(lang('contact_column2_head')); ?></p>

                <form action="#" method="post">
                    <div class="row">

                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="name" name="name" placeholder="<?php echo(lang('contact_column2_placeholder1')); ?>" type="text" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="<?php echo(lang('contact_column2_placeholder2')); ?>" type="email" required>
                        </div>

                        <div class="col-sm-12 form-group">
                            <input class="form-control" id="subject" name="subject" placeholder="<?php echo(lang('contact_column2_placeholder3')); ?>" type="text" required>
                        </div>

                        <div class="col-sm-12 form-group">
                            <textarea class="form-control" id="comments" name="comments" placeholder="<?php echo(lang('contact_column2_placeholder4')); ?>" rows="5" requierd></textarea>
                        </div>

                        <div class="col-sm-12 form-group">
                            <div class="g-recaptcha" data-sitekey="6LfplgwUAAAAAOzIgDSwZHltB5niJ5mIvrsq0mzZ"></div>
                        </div>

                        <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-left" type="submit" name="submit" value="Submit"><?php echo(lang('contact_column2_button')); ?></button><br>
                        </div>

                    </div>			
<?php
//captcha code
require_once "inc/phpmailer/PHPMailerAutoload.php";
	if(isset($_POST['submit'])){
		
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$privatekey = "6LfplgwUAAAAAEya75YiEoIAvz5bqdmXbOHtnawI";
		
		$response = file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
		
		$data = json_decode($response);
		
		if(isset($data->success) AND $data->success==true){
			
				////true - What happens when user is verified
				
				if (empty($_POST["name"])) {
					print(
						'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_error1_2")); ?></span>
                                    </div>');
				}elseif (empty($_POST["email"])) {
					print(
							'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_error1_3")); ?></span>
                                    </div>');
				}elseif (empty($_POST["subject"])) {
					print(
							'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_error1_4")); ?></span>
                                    </div>');
				}elseif (empty($_POST["comments"])) {
					print(
							'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_error1_5")); ?></span>
                                    </div>');
				}
				
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
					$m->addAddress("j.benning@hotmail.nl", "bema");
					$m->Subject = $subject;
					$m->Body = $message;

					$m->send();
					
					 
					print (
					
					'<br>
                                    <div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-success alert-dismissable" role="alert">
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
?>

        </form>

    </div>
</div>

</div>


<div class = "container">
<div >
  <h2 class="text-center">Bema Wegenbouw BV - Hoofdkantoor</h2>
    <div id="googleMap" class="container gmap"></div>


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
</div>
</div>
<br>
<?php include("inc/parts/footer.php"); ?>



