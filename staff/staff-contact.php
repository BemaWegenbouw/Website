<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-contact";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

	//check of laatste page staff-contact / staff-contactMail is dan onthoud FORM INFORMATIE Anders UNSET SESSION
	$url = $_SERVER['HTTP_REFERER'];
	$pageRefreshed = basename(parse_url($url, PHP_URL_PATH));
	if($pageRefreshed == 'staff-contactMail.php'){
		//
	}elseif($pageRefreshed == 'staff-contact.php'){
		if(!empty($_GET['status']) || !empty($_GET['name']) || !empty($_GET['email']) || !empty($_GET['subject'])
			|| !empty($_GET['comments'])){
				print "<script type='text/javascript'>window.location.href = 'staff-contact.php';</script>";
			}
	}else{
		//enter code here
		unset($_SESSION['name']); unset($_SESSION['email']); unset($_SESSION['subject']); unset($_SESSION['comments']);
	}

	if (empty($_GET['status'])) {
		//doe niets
	}else{
		if($status = $_GET['status']){
			print("<script type='text/javascript'>noty({text: 'Uw e-mail is verzonden.', type: 'success', layout: 'top', theme: 'relax', timeout: 10000});</script>");//foutmelding
		}else{
			print("<script type='text/javascript'>noty({text: 'Uw e-mail is niet verzonden.', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");//foutmelding
		}
	}
	if (empty($_GET['name'])) {
		//doe niets
	}else{
		if($name = $_GET['name']){
				print("<script type='text/javascript'>noty({text: 'Uw naam is niet ingevuld.', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");//foutmelding
		}
	}
	if (empty($_GET['email'])) {
		//doe niets
	}else{
		if($email = $_GET['email']){
				print("<script type='text/javascript'>noty({text: 'Uw e-mail is niet ingevuld.', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");//foutmelding
		}
	}
	if (empty($_GET['subject'])) {
		//doe niets
	}else{
		if($subject = $_GET['subject']){
				print("<script type='text/javascript'>noty({text: 'Uw onderwerp is niet ingevuld.', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");//foutmelding
		}
	}
	if (empty($_GET['comments'])) {
		//doe niets
	}else{
	if($comments = $_GET['comments']){
			print("<script type='text/javascript'>noty({text: 'Uw commentaar is niet ingevuld.', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");//foutmelding
	}else{
		//doe niets
	}
	}
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Contact</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid header -->
			<div class="container-fluid">
                <div class="row">
			<!--Start right COL row 1-->
				<div class="col-sm-7">
					<h2 class=""><?php echo(lang('contact_column2_title')); ?></h2>
					<p>Indien u contact wilt opnemen met uw werkgever kunt u het onderstaande formulier invullen.						
						Alle mails worden verstuurd naar info@bemawegenbouw.nl.<br><br><span style="color:red;">LET OP: Alle velden zijn verplicht.</span></p>
					<!--Start Form contact-->
					<form action="staff-contactMail.php" enctype="multipart/form-data" method="post">
						<!--Start Row 2-->
						<div class="row">
							<!--Start input name-->
							<div class="col-sm-6 form-group">
								<input class="form-control" id="name" name="name" value="<?php if(isset($_SESSION['name'])){ echo $_SESSION['name'];}?>" placeholder="<?php echo(lang('contact_column2_placeholder1')); ?>" type="text" required>
							</div>
							<!--End input name-->
							<!--Start input email-->
							<div class="col-sm-6 form-group">
								<input class="form-control" id="email" name="email" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];}?>" placeholder="<?php echo(lang('contact_column2_placeholder2')); ?>" type="email" required>
							</div>
							<!--End input email-->
							<!--Start input subject-->
							<div class="col-sm-12 form-group">
								<input class="form-control" id="subject" name="subject" value="<?php if(isset($_SESSION['subject'])){ echo $_SESSION['subject'];}?>" placeholder="<?php echo(lang('contact_column2_placeholder3')); ?>" type="text" required>
							</div>
							<!--End input subject-->
							<!--Start input comments-->
							<div class="col-sm-12 form-group">
								<textarea class="form-control" id="comments" name="comments" placeholder="<?php echo(lang('contact_column2_placeholder4')); ?>" rows="10" requierd><?php echo $var = isset($_SESSION['comments']) ? $_SESSION['comments'] : ''; ?></textarea>
							</div>
							<!--End input comments-->	
							<!--Start Multiple file input-->
							<div class="col-sm-6 form-group">									
							<div class="input-group">
								<label class="input-group-btn">
									<span class="btn btn-primary">
										Browse&hellip; <input type="file" name="upload[]" style="display: none;" multiple>
								</span>
								</label>
								<input type="text" class="form-control" readonly>
							</div>					
							</div>
							<!--End multiple file input-->
							<!--Start Form submit-->
							<div class="col-sm-12 form-group">
								<button class="btn btn-sm btn-primary btn-right" backgroundcolor="grey" type="submit" name="submit">Verzenden</button><br /><br>
							</div>
							<!--End form submit-->
						</div>
						<!--End row 2-->						
					</form>
					<!--End contact form-->
				</div>
				<!--End right COL row 1-->
			</div>
			</div>	
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php


include("../inc/parts/staff-footer.php");

?>