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

        <nav class="navbar navbar-default transparent navbar-fixed-top">
            <div class="nav-container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>

                    </button >
                    <a class="navbar-brand" href="../index.php" title="To Top"><img src="../assets/img/logo.png"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="../index.php" title="To Top">Hoofdpagina</a></li>
                        <li><a href="../index.php">Over ons</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Diensten <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="grondwerk.php">Grondwerk</a></li>
                                <li><a href="Riolering.php">Riolering</a></li>
                                <li><a href="Machinalebestrating.php">Machinale bestrating</a></li>
                                <li><a href="#Uitvlakken">Uitvlakken</a></li>
                            </ul>
                        </li>
                        <li><a href="#Portfolio">Portfolio</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#googleMap">Locatie</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="../lang/nl.php"><span class="glyphicon glyphicon-log-in"></span> NL</a></li>
                        <li><a href="../lang/en.php"><span class="glyphicon glyphicon-log-in"></span> EN</a></li>
                        <li><a href="../lang/de.php"><span class="glyphicon glyphicon-log-in"></span> DE</a></li>
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

        </div><!-- .carousel -->
        <!--end bg-carousel-->

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
        <footer   class="text-center " >
            <a href="#myPage" title="To Top">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </a>
            <p>Test footer </a></p>
        </footer>

        <!--Java script bootstrap -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.js"></script>


        <!--Google maps script-->
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