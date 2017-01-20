<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "portfolio";
require_once("inc/engine.php");
include("inc/parts/header.php");
?>
	<!--Start Container-->
	<div class="container"id="Portfolio">
		<!--Start Title-->
		<h2 class="text-center"><?php echo(lang('portfolio_column1_title')); ?></h2><br>
		<!--End Title-->
		<!--Start COL-->
		<div class="col-sm-12">
			<!--Start Row-->
			<div class="row">
				<!--Start carousel images-->
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
				<!--End carousel images-->
				<!--Start carousel text-->
				<div class="col-sm-8 col-md-8">
						<p><strong><?php echo(lang('portfolio_column1_head')); ?></strong></p>
						<p><?php echo(lang('portfolio_column1_text1')); ?></p>
						<h1>Deze pagina is onder constructie!!!</h1>
			<h1>Deze wordt na het inleveren van het project afgerond door de project aannemer!!!</h1>
				</div>
				<!--End carousel text-->
			</div><br>
			<!--End Row-->
		</div>
		<!--End COL-->
	</div>
	<!--End container-->
<!--Start footer-->
<?php include("inc/parts/footer.php"); ?>

