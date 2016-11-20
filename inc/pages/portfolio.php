<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bema Wegenbouw BV</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/css/custom.css">
    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
          <!-- Navbar -->
        <?php include("navbar.php"); ?>
		<!-- Header -->
		<?php include("header.php"); ?>
        <br>
        <div class="container"id="Portfolio">
            <h2 class="text-center">Portfolio</h2><br>
            <div class="row ">
                <div class="col-sm-4 col-md-4">
                    <div id="myCarousel" class="carousel slide  text-center" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                              </ol>
                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="../assets/img/grondwerk.jpg" alt="grondwerk" width="100%" >
                                <div class="carousel-caption">
                                            <h3>Chania</h3>
                                            <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                                          </div>
                                    </div>
                                <div class="item">
                                      <img src="../assets/img/grondwerk.jpg" alt="grondwerk" width="100%" >
                                    </div>
                                <div class="item">
                                      <img src="../assets/img/grondwerk.jpg" alt="grondwerk" width="100%" >
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
                    <p><strong>Titel onderdeel</strong></p>
                    <p>blablabla tekst</p>
                </div>
            </div>
        </div>
        <br>
		<!-- Container (Contact Section) -->
		<?php include ("contact.php") ?>
		<!-- Header -->
		<?php include("footer.php"); ?>
    </body>
</html>