<?php

//Bema Wegenbouw BV Website
//Copyright 2016

require_once("inc/engine.php");
$page = "index";
include("inc/parts/header.php");

?>

<div id="Overons" class="container slideanim">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h2>Wegenbouw op zijn best</h2><br>
            <h4>Bij Bema Wegenbouw is uw opdracht onze passie. Wij zorgen voor kwalitatief goed werk voor de beste prijzen. Met grote opdrachten in Nederland én Duitsland zijn wij een betrouwbare partner voor al uw wegenbouw zaken.</h4><br>
            <p><?php echo(lang('index_column1_text')); ?></p>

        </div>
        <div class="col-sm-2">
        </div>
    </div>
</div>

<?php include("inc/parts/footer.php"); ?>
