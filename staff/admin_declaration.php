<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "admin-declaration";
require_once("../inc/engine.php");

if($user->Get($_SESSION["uid"], "rank_id") < $permission->Get("decl_admin")) {
header("Location: dashboard.php");
die("Unauthorized."); }

include("../inc/parts/staff-header.php");
$uid = $_SESSION["uid"];
?>
<link href="../assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
				<h1 class="page-header">Uren Inzien</h1>
				
				<?php {
                    $declaration->declist();
                }
                ?>
				</div>
					</div>
						</div>
							</div>
							<?php
include("../inc/parts/staff-footer.php");
?>