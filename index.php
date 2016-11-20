<?php

//Bema Wegenbouw BV Website
//Copyright 2016

require_once("inc/engine.php");
$page = "index";
include("inc/parts/header.php");

?>
        <!-- Container (About Section) -->
        <div id="Overons" class="container slideanim">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <h2 class="text-center"><?php echo(lang('index_column1_title')); ?></h2><br>
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
		
        <?php include ("inc/parts/contact.php") ?>
		<?php include("inc/parts/footer.php"); ?>
    </body>
</html>