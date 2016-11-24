<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "index";
require_once("inc/engine.php");
include("inc/parts/header.php");

?>

        <div id="diensten" class="container text-center" style="margin-top: -50px;">
            <h2><?php echo(lang('index_column1_title')); ?></h2>
            <h4 style="margin-top: -25px;"><?php echo(lang('index_column1_sub')); ?></h4>
            <div class="row text-center">
                <div class="col-sm-4" id="<?php echo(lang('index_column1_item1_name')); ?>">
                    <div class="thumbnail">
                        <img src="assets/img/img3.jpg" alt="Paris" width="400" height="300">
                        <p><strong><?php echo(lang('index_column1_item1_name')); ?></strong></p>
                        <p><?php echo(lang('index_column1_item1_desc')); ?></p>
                    </div>
                </div>
                <div class="col-sm-4" id="Riolering">
                    <div class="thumbnail">
                        <img src="assets/img/img8.jpg" alt="<?php echo(lang('index_column1_item1_name')); ?>" width="400" height="300">
                        <p><strong><?php echo(lang('index_column1_item2_name')); ?></strong></p>
                        <p><?php echo(lang('index_column1_item2_desc')); ?></p>
                    </div>
                </div>
                <div class="col-sm-4" id="Machinalebestrating">
                    <div class="thumbnail">
                        <img src="assets/img/img13.jpg" alt="<?php echo(lang('index_column1_item3_name')); ?>" width="400" height="300">
                        <p><strong><?php echo(lang('index_column1_item3_name')); ?></strong></p>
                        <p><?php echo(lang('index_column1_item3_desc')); ?></p>
                    </div>
                </div>

                <div class="col-sm-4" id="Uitvlakken">
                    <div class="thumbnail">
                        <img src="assets/img/img15.jpg" alt="<?php echo(lang('index_column1_item4_name')); ?>" width="400" height="300">
                        <p><strong><?php echo(lang('index_column1_item4_name')); ?></strong></p>
                        <p><?php echo(lang('index_column1_item4_desc')); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="assets/img/img15.jpg" alt="<?php echo(lang('index_column1_item5_name')); ?>" width="400" height="300">
                        <p><strong><?php echo(lang('index_column1_item5_name')); ?></strong></p>
                        <p><?php echo(lang('index_column1_item5_desc')); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="assets/img/img15.jpg" alt="<?php echo(lang('index_column1_item6_name')); ?>" width="400" height="300">
                        <p><strong><?php echo(lang('index_column1_item6_name')); ?></strong></p>
                        <p><?php echo(lang('index_column1_item6_desc')); ?></p>
                    </div>
                </div>
            </div>
        </div>

<?php include("inc/parts/footer.php"); ?>
