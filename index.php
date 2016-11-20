<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bema Wegenbouw BV</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/custom.css">

    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

        <nav class="navbar navbar-default transparent navbar-fixed-top">
            <div class="nav-container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>

                    </button >
                    <a class="navbar-brand" href="#myPage" title="To Top"><img src="assets/img/logo.png"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#myPage" title="To Top">Hoofdpagina</a></li>
                        <li><a href="#overons">Over ons</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Diensten <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#diensten">Diensten</a></li>
                                <li><a href="pages/Grondwerk.php">Grondwerk</a></li>
                                <li><a href="pages/Riolering.php">Riolering</a></li>
                                <li><a href="pages/Machinalebestrating.php">Machinale bestrating</a></li>
                                <li><a href="pages/Uitvlakken.php">Uitvlakken</a></li>
                            </ul>
                        </li>
                        <li><a href="pages/Portfolio.php">Portfolio</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#googleMap">Locatie</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="lang/nl.php"><span class="glyphicon glyphicon-log-in"></span> NL</a></li>
                        <li><a href="lang/en.php"><span class="glyphicon glyphicon-log-in"></span> EN</a></li>
                        <li><a href="lang/de.php"><span class="glyphicon glyphicon-log-in"></span> DE</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--begin bg-carousel-->

        <div id="bg-fade-carousel" class="carousel slide carousel-fade " data-interval="10000"  data-ride="carousel">
            <!-- Wrapper for slides -->
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
            </div><!-- .carousel-inner -->
            <div class="container carousel-overlay text-center">

                <div class="jumbotron text-center">

                    <h1>Bema Wegenbouw BV</h1>
                    <p>Kwaliteit staat voorop</p>
                </div>
            </div>

        </div>
        <!-- .carousel -->
        <!--end bg-carousel-->


        <!-- Container (About Section) -->
        <div id="overons" class="container slideanim">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <h2 class="text-center">Over Ons Bedrijf</h2><br>
                    <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                </div>
                <div class="col-sm-2">
                </div>
            </div>
        </div>




        <!-- Container (Portfolio Section) -->

        <div id="diensten" class="container text-center">
            <h2>DIENSTEN</h2><br>
            <h4>De volgende diensten bieden wij aan</h4>
            <div class="row text-center slideanim">
                <div class="col-sm-4" id="Grondwerk">
                    <div class="thumbnail">
                        <img src="assets/img/img3.jpg" alt="Paris" width="400" height="300">
                        <p><strong>Grondwerk</strong></p>
                        <p>Met grondwerk word</p>

                    </div>
                </div>
                <div class="col-sm-4" id="Riolering">
                    <div class="thumbnail">
                        <img src="assets/img/img8.jpg" alt="New York" width="400" height="300">
                        <p><strong>Riolering</strong></p>
                        <p>We built New York</p>
                    </div>
                </div>
                <div class="col-sm-4" id="Machinalebestrating">
                    <div class="thumbnail">
                        <img src="assets/img/img13.jpg" alt="San Francisco" width="400" height="300">
                        <p><strong>Machinale bestrating</strong></p>
                        <p>Yes, San Fran is ours</p>
                    </div>
                </div>

                <div class="col-sm-4" id="Uitvlakken">
                    <div class="thumbnail">
                        <img src="assets/img/img15.jpg" alt="Paris" width="400" height="300">
                        <p><strong>Uitvlakken</strong></p>
                        <p>Yes, we built Paris</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="assets/img/img15.jpg" alt="New York" width="400" height="300">
                        <p><strong>New York</strong></p>
                        <p>We built New York</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="assets/img/img15.jpg" alt="San Francisco" width="400" height="300">
                        <p><strong>San Francisco</strong></p>
                        <p>Yes, San Fran is ours</p>
                    </div>
                </div>
            </div><br>
        </div>

        <!-- Container (Contact Section) -->
        <?php include ("contact.php") ?>
        <footer   class="text-center " >
            <a href="#myPage" title="To Top">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </a>
            <p>Test footer </a></p>
        </footer>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                // Add smooth scrolling to all links in navbar + footer link
                $(".navbar a, footer a[href='#myPage']").on('click', function (event) {
                    // Make sure this.hash has a value before overriding default behavior
                    if (this.hash !== "") {
                        // Prevent default anchor click behavior
                        event.preventDefault();

                        // Store hash
                        var hash = this.hash;

                        // Using jQuery's animate() method to add smooth page scroll
                        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                        $('html, body').animate({
                            scrollTop: $(hash).offset().top
                        }, 900, function () {

                            // Add hash (#) to URL when done scrolling (default click behavior)
                            window.location.hash = hash;
                        });
                    } // End if
                });

                $(window).scroll(function () {
                    $(".slideanim").each(function () {
                        var pos = $(this).offset().top;

                        var winTop = $(window).scrollTop();
                        if (pos < winTop + 600) {
                            $(this).addClass("slide");
                        }
                    });
                });
            })
        </script>


    </body>
</html>