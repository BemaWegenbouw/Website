<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bema Wegenbouw BV</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <link rel="stylesheet" href="assets/css/flag-icon.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
    </head>

    <body class = "fill-height" id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
	    <nav class="navbar navbar-default transparent navbar-fixed-top" style="">
        <div class="nav-container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button >
                <a class="navbar-brand" href="index.php" title="To Top"><img src="assets/img/logo.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li <?php
                    if ($page == "index") {
                        echo "class='active'";
                    }
                    ?>><a href="index.php" title="To Top">Hoofdpagina</a></li>
                    <li>
					<li <?php
                    if ($page == "diensten") {
                        echo "class='active'";
                    }
                    ?>><a href="diensten.php" title="To Top">Diensten</a></li>

                    <li <?php
                    if ($page == "portfolio") {
                        echo "class='active'";
                    }
                    ?>><a href="portfolio.php">Portfolio</a></li>
                    <li <?php
                    if ($page == "overons") {
                        echo "class='active'";
                    }
                    ?>><a href="overons.php">Over ons</a></li>
                    <li <?php
                    if ($page == "contact") {
                        echo "class='active'";
                    }
                    ?>><a href="contact.php">Contact</a></li>
                </ul>             
            </div>
        </div>
    </nav>

    <div id="bg-fade-carousel" class="carousel carousel-fade " data-interval="7000"  data-ride="carousel">
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
        <div class="container carousel-overlay text-center">

            <div class="jumbotron text-center">

                <h1>Bema Wegenbouw BV</h1>
                <h2 class="h2white">Kwaliteit staat voorop</h2>
                <A name="bottom"></A>
            </div>
        </div>

    </div>
    
