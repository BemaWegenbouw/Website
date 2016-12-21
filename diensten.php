<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "diensten";
require_once("inc/engine.php");
include("inc/parts/header.php");
?>

<div class="container-fluid">
    <h2 class="text-center"><?php echo(lang('grondwerk_column1_title')); ?></h2><br>
    
	<div class="row" id="grondwerk" id="riolering">
    	<div class="col-sm-3 col-md-3">
            <img src="assets/img/img3.jpg" alt="grondwerk" width="100%" >
        </div>
        <div class="col-sm-3 col-md-3">
            <p><strong><?php echo(lang('grondwerk_column1_head')); ?></strong></p>
            <p><?php echo(lang('grondwerk_column1_text1')); ?></p>
        </div>
		 <div class="col-sm-3 col-md-3">
            <img src="assets/img/img8.jpg" alt="riolering" width="100%" >
        </div>
        <div class="col-sm-3 col-md-3">
            <p><strong><?php echo(lang('riolering_column1_head')); ?></strong></p>
            <p><?php echo(lang('riolering_column1_text1')); ?></p>
        </div>
    </div>
	<br>
	<div class="row" id="grondwerk" id="egaliseren">
        <div class="col-sm-3 col-md-3">
            <img src="assets/img/img13.jpg" alt="bestrating" width="100%" >
        </div>
        <div class="col-sm-3 col-md-3">
            <p><strong><?php echo(lang('bestrating_column1_head')); ?></strong></p>
            <p><?php echo(lang('bestrating_column1_text1')); ?></p>
        </div>
		 <div class="col-sm-3 col-md-3">
            <img src="assets/img/img15.jpg" alt="Egaliseren" width="100%" >
        </div>
        <div class="col-sm-3 col-md-3">
            <p><strong><?php echo(lang('egaliseren_column1_head')); ?></strong></p>
            <p><?php echo(lang('egaliseren_column1_text1')); ?></p>
        </div>
    </div>
</div> 
<br>  


<?php include("inc/parts/footer.php"); ?>