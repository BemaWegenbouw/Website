<?php
//Bema Wegenbouw BV Website
//Copyright 2016

require_once("inc/engine.php");
$page = "grondwerk";
include("inc/parts/header.php");
?>

<div class="container"id="Grondwerk">
    <h2 class="text-center"><?php echo(lang('grondwerk_column1_title')); ?></h2><br>
    <div class="row">
        <div class="col-sm-4 col-md-4" style="background-color:yellow;">
            <img src="assets/img/img3.jpg" alt="grondwerk" width="100%" >
        </div>
        <div class="col-sm-8 col-md-8" style="background-color:pink;">
            <p><strong><?php echo(lang('grondwerk_column1_head')); ?></strong></p>
            <p><?php echo(lang('grondwerk_column1_text1')); ?></p>
        </div>
    </div>
</div>   
<br>

<?php include("inc/parts/footer.php"); ?>