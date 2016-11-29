<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "overons";
require_once("inc/engine.php");
include("inc/parts/header.php");

?>
        <div id="Overons" class="container" style="margin-top: -50px; margin-bottom: 25px;">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <h2 class="text-center"><?php echo(lang('overons_column1_title')); ?></h2><br>
                    <h4 style="margin-top: -25px;"><?php echo(lang('overons_column1_head')); ?></h4><br>
                    <p><?php echo(lang('overons_column1_text')); ?></p>
                </div>
                <div class="col-sm-2">
                </div>
            </div>
        </div>

<?php include("inc/parts/footer.php"); ?>