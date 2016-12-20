<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "index";
require_once("inc/engine.php");
include("inc/parts/header.php");

?>
  <div id="diensten" class="container text-center">
      <div class="col-sm-8 col-sm-offset-2">
				<div class="row">
                    <h2 class="text-center"><?php echo(lang('overons_column1_title')); ?></h2><br>
                    <h4 style="margin-top: -25px;"><?php echo(lang('overons_column1_head')); ?></h4><br>
                    <p class="text-left"><?php echo(lang('overons_column1_text')); ?></p>
                </div>               
            </div>
        </div>

        <div id="diensten" class="container text-center">
            <h2><?php echo(lang('index_column1_title')); ?></h2>
            <h4><?php echo(lang('index_column1_sub')); ?></h4>
            <div class="row text-center">
				<div class="col-sm-1">
				</div>
                <div class="col-sm-5" id="<?php echo(lang('index_column1_item1_name')); ?>">
                    <div class="thumbnail">
                        <img src="assets/img/img3.jpg" alt="grondwerk" width="400" height="300">
                        <p><strong><?php echo(lang('index_column1_item1_name')); ?></strong></p>
                        <p><?php echo(lang('index_column1_item1_desc')); ?></p>
						<p class="pull-center "><a href="diensten.php"><?php echo (lang('index_column1_item1_desc2')); ?></a></p>
                    </div>
                </div>
				
                <div class="col-sm-5" id="Riolering">
                    <div class="thumbnail">
                        <img src="assets/img/img8.jpg" alt="<?php echo(lang('index_column1_item1_name')); ?>" width="400" height="300">
                        <p><strong><?php echo(lang('index_column1_item2_name')); ?></strong></p>
                        <p><?php echo(lang('index_column1_item2_desc')); ?></p>
						<p class="pull-center "><a href="diensten.php"><?php echo (lang('index_column1_item2_desc2')); ?></a></p>
                    </div>
                </div>
               <div class="col-sm-1">
				</div>
            </div>
            
            <div class="row text-center">
				
               <div class="col-sm-1">
				</div>
				<div class="col-sm-5" id="Bestrating">
                    <div class="thumbnail">
                        <img src="assets/img/img13.jpg" alt="<?php echo(lang('index_column1_item3_name')); ?>" width="400" height="300">
                        <p><strong><?php echo(lang('index_column1_item3_name')); ?></strong></p>
                        <p><?php echo(lang('index_column1_item3_desc')); ?></p>
						<p class="pull-center "><a href="diensten.php"><?php echo (lang('index_column1_item3_desc2')); ?></a></p>
                    </div>
                </div>
                <div class="col-sm-5" id="Egaliseren">
                    <div class="thumbnail">
                        <img src="assets/img/img15.jpg" alt="<?php echo(lang('index_column1_item4_name')); ?>" width="400" height="300">
                        <p><strong><?php echo(lang('index_column1_item4_name')); ?></strong></p>
                        <p><?php echo(lang('index_column1_item4_desc')); ?></p>
						<p class="pull-center "><a href="diensten.php"><?php echo (lang('index_column1_item4_desc2')); ?></a></p><br>
                    </div>
                </div>
				</div>
               <div class="col-sm-1">
				</div>
                
            </div>
        </div>

<?php include("inc/parts/footer.php"); ?>
