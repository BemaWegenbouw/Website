<?php

//Bema Wegenbouw BV Website
//Copyright 2016

require_once("inc/engine.php");
$page = "overons";
include("inc/parts/header.php");

?>
        <div id="Overons" class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <h2 class="text-center"><?php echo(lang('index_column1_title')); ?></h2><br>
                    <h4><?php echo(lang('index_column1_head')); ?></h4><br>
                    <p><?php echo(lang('index_column1_text')); ?></p>

                </div>
                <div class="col-sm-2">
                </div>
            </div>
        </div>
<br>
        </div>

        <?php include("inc/parts/footer.php"); ?>
    </body>
</html>
