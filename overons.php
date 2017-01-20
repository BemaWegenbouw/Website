<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "overons";
require_once("inc/engine.php");
include("inc/parts/header.php");
?>
	<!--Start container-->
	<div id="diensten" class="container text-center">
		<!--Start COL /Offset-->
		<div class="col-sm-8 col-sm-offset-2">
			<!--Start Row-->
			<div class="row">
			<h1>Deze pagina is onder constructie!!!</h1>
			<h1>Deze wordt na het inleveren van het project afgerond door de project aannemer!!!</h1>
				<!--Start Title-->
				<h2 class="text-center"><?php echo(lang('overons_column1_title')); ?></h2><br>
				<!--End Title-->
				<!--Start head-->
				<h4 style="margin-top: -25px;"><?php echo(lang('overons_column1_head')); ?></h4><br>
				<!--End head-->
				<!--Start text-->
				<p><?php echo(lang('overons_column1_text')); ?></p>
				<!--End text-->
			</div>  
			<!--End Row-->
			<BR><BR><BR>
		</div>
		<!--End COL / Offset-->
	</div>
	<!--end container-->
<!--Start Footer-->	
<?php include("inc/parts/footer.php"); ?>