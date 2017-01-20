<footer class="footers">
			&copy; <?php echo date('Y'); ?> <a href="http://www.bemawegenbouw.nl/">Bema Wegenbouw BV</a>
			Aamsveenweg 294 | 7536 PB Enschede Nederland | Tel: 0031(0)53 4779223 |  Mobiel: 0031(0)6 3471605<br>
			Email: info@bemawegenbouw.nl | Website: www.bemawegenbouw.nl | KvK-nr: 66369711 | BTW-nr: NL8564.18.232.B01<br>
	</footer>

<?php //Javascript import ?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"></script>

	<?php if($page == "contact") {?>
		<script>
		//Google Maps script  
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
		<script>
		$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});
		</script>
		
		<?php } ?>
</body>
</html>