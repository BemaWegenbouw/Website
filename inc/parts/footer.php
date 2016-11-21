<p />

<footer class="text-center" style="margin-bottom: -50px; background-color: lightgrey; border-radius: 10px; text-align: center; align: center; margin-left: 30%; margin-right: 30%;">
    Copyright© <a href="http://www.bemawegenbouw.nl/">Bema Wegenbouw BV</a>
    <br />KvK: 66369711 | BTW-nummer: NL........B01 | Gevestigd te Enschede
</footer>

<?php //Javascript import ?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootstrap-notify.js"></script>

<?php //Google Maps script ?>

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