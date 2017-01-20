<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "diensten";
require_once("inc/engine.php");
include("inc/parts/header.php");
?>
<!--Start Container-->
<div class="container-fluid">
	<!--Start Title-->
    <h2 class="text-center"><?php echo(lang('grondwerk_column1_title')); ?></h2><br>
    <!--End Title-->
	<!--Start Row 1-->
	<div class="row" id="grondwerk" id="riolering">
		<!--Start image grondwerk-->
    	<div class="col-sm-3 col-md-3">
            <img src="assets/img/img3.jpg" alt="grondwerk" width="100%" >
        </div>
		<!--End image grondwerk-->
			<!--Start text grondwerk-->
			<div class="col-sm-3 col-md-3">
				<p><strong><?php echo(lang('grondwerk_column1_head')); ?></strong></p>
				<p><?php echo(lang('grondwerk_column1_text1')); ?></p>
			</div>
			<!--End text grondwerk-->
			<!--Start image riolering-->
			<div class="col-sm-3 col-md-3">
				<img src="assets/img/img8.jpg" alt="riolering" width="100%" >
			</div>
			<!--End image riolering-->
		<!--Start text riolering-->
        <div class="col-sm-3 col-md-3">
            <p><strong><?php echo(lang('riolering_column1_head')); ?></strong></p>
            <p><?php echo(lang('riolering_column1_text1')); ?></p>
        </div>
		<!--End text riolering-->
    </div><br>
	<!--End Row 1-->
	<!--Start Row 2-->
	<div class="row" id="grondwerk" id="egaliseren">
		<!--Start image bestrating-->
        <div class="col-sm-3 col-md-3">
            <img src="assets/img/img13.jpg" alt="bestrating" width="100%" >
        </div>
		<!--End image bestarting-->
			<!--Start text bestarting-->
			<div class="col-sm-3 col-md-3">
				<p><strong><?php echo(lang('bestrating_column1_head')); ?></strong></p>
				<p><?php echo(lang('bestrating_column1_text1')); ?></p>
			</div>
			<!--End text bestarting-->
			<!--Start image egaliseren-->
			 <div class="col-sm-3 col-md-3">
				<img src="assets/img/img15.jpg" alt="Egaliseren" width="100%" >
			</div>
			<!--End image egaliseren-->
		<!--Start text egaliseren-->	
        <div class="col-sm-3 col-md-3">
            <p><strong><?php echo(lang('egaliseren_column1_head')); ?></strong></p>
            <p><?php echo(lang('egaliseren_column1_text1')); ?></p>
        </div>
		<!--End text egaliseren-->
    </div><br>
	<!--End Row 2-->
</div>
<!--End container-->
<!--Start Footer-->
<?php include("inc/parts/footer.php"); ?>