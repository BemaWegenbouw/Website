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
          <li><a href="#Grondwerk">Grondwerk</a></li>
          <li><a href="Riolering.php">Riolering</a></li>
		  <li><a href="Machinalebestrating.php">Machinale bestrating</a></li>
		  <li><a href="Uitvlakken.php">Uitvlakken</a></li>
        </ul>
      </li>
		  <li><a href="Portfolio.php">Portfolio</a></li>
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

<!-- Container voor diensten (een portolio class)-->
<br>

<div class="container"id="Grondwerk">
<h2 class="text-center">Grondwerk</h2><br>
  <div class="row slideanim">
    <div class="col-sm-4 col-md-4" style="background-color:yellow;">
      <img src="../assets/img/grondwerk.jpg" alt="grondwerk" width="100%" > 
	</div>
    <div class="col-sm-8 col-md-8" style="background-color:pink;">
    <p><strong>Titel onderdeel</strong></p>
	<p>blablabla tekst</p>
	</div>
  </div>
</div>
  </div>
</div>
<br>
<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-darkgrey"> 
<div class="container">
  <h2 class="text-center h2white">CONTACT</h2>
  
  <div class="row">
    <div class="col-sm-5">
      <p>Neem contact met ons op en u ontvangt binnen 24 uur een bericht terug.</p>
      <p><span class="glyphicon glyphicon-map-marker orangeglyph"></span> Enschede, NL</p>
      <p><span class="glyphicon glyphicon-earphone orangeglyph"></span> +31 (0)534779223</p>
	  <p><span class="glyphicon glyphicon-phone orangeglyph"></span> +31 (0)613471605</p>
      <p><span class="glyphicon glyphicon-envelope orangeglyph"></span> <a href="mailto:info@bemawegenbouw.nl">info@bemawegenbouw.nl</a> </p>
    </div>
    <div class="col-sm-7 slideanim">
	<p>Indien u een afspraak wilt maken, of als u vragen heeft. 
							Kunt u hieronder een email naar sturen. </p>
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Naam" type="text" required>
        </div>
		<div class="col-sm-6 form-group">
          <input class="form-control" id="lastname" name="lastname" placeholder="Achternaam" type="text" required>
        </div>
        <div class="col-sm-12 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Verzenden</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="container-fluid bg-darkgrey ">
<h2 class="text-center h2white"> Locatie</h2>
<div id="googleMap" class=" container gmap" ></div>
</div>
<!-- Add Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4rGAUi21LFUmkpQ-DLAKdhaOxTXIlDLo&callback=initMap""></script>
<script>
var myCenter = new google.maps.LatLng(52.18029079999999, 6.929297700000006);

function initialize() {
var mapProp = {
  center:myCenter,
  zoom:12,
  scrollwheel:true,
  draggable:true,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

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
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
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
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
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