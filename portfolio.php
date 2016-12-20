<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "portfolio";
require_once("inc/engine.php");
include("inc/parts/header.php");
?>
<div class="container"id="Portfolio">
    <h2 class="text-center"><?php echo(lang('portfolio_column1_title')); ?></h2><br>
    <div class="col-sm-12">
	<div class="row">
        <div class="col-sm-4 col-md-4">
             <div id="bg-fade-carousel" class="carousel carousel-fade" data-interval="7000"  data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <div class="slide1"></div>
            </div>
            <div class="item">
                <div class="slide2"></div>
            </div>
            <div class="item">
                <div class="slide3"></div>
            </div>
        </div>
        </div>
    </div>
	<div class="col-sm-8 col-md-8">
            <p><strong><?php echo(lang('portfolio_column1_head')); ?></strong></p>
            <p><?php echo(lang('portfolio_column1_text1')); ?></p>
        </div>
</div>
</div>

</div><br>

<?php include("inc/parts/footer.php"); ?>

