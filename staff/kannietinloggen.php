<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "blank";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Blank</h1>
	<?php 
	
	$userid = 3;
	$username = 'joey';
	$pass = 'Amokin1991';
	$hashedpassword=$security -> hash($pass);
    $user->Set("$userid", "password", "$hashedpassword");            
	
	?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php

include("../inc/parts/staff-footer.php");

?>