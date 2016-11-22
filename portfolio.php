<?php
//Bema Wegenbouw BV Website
//Copyright 2016

require_once("inc/engine.php");
$page = "portfolio";
include("inc/parts/header.php");
?>
<div class="container"id="Portfolio">
    <h2 class="text-center"><?php echo(lang('portfolio_column1_title')); ?></h2><br>
    <div class="row">
        <div class="col-sm-4 col-md-4">
            <div id="myCarousel" class="carousel slide  text-center" data-ride="carousel">
                  <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                      </ol>
                  <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="assets/img/grondwerk.jpg" alt="grondwerk" width="100%" >
                        <div class="carousel-caption">
                                    <h3>Chania</h3>
                                    <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                                  </div>
                            </div>
                        <div class="item">
                              <img src="assets/img/grondwerk.jpg" alt="grondwerk" width="100%" >
                            </div>
                        <div class="item">
                              <img src="assets/img/grondwerk.jpg" alt="grondwerk" width="100%" >
                            </div>
                      </div>
                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
            </div>
        </div>
        <div class="col-sm-8 col-md-8">
            <p><strong><?php echo(lang('portfolio_column1_head')); ?></strong></p>
            <p><?php echo(lang('portfolio_column1_text1')); ?></p>
        </div>
    </div>
</div>
<!-- Header -->
<?php include("inc/parts/footer.php"); ?>
</body>
</html>
