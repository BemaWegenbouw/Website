<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-freeapplications";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
            <div>
			<h1> Test print vrij aanvragen</h1>
			<?php $free->freeListCompleet();?>
			</div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php

include("../inc/parts/staff-footer.php");

?>