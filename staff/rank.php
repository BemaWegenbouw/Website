<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-rank";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");
$uid = $_SESSION["uid"];
?>
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Rank</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
		 <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
			 <!------------------- Dropdownmenu voor rank wijzigen  ------------------>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <h3>Rank wijzigen</h3>
                    </div>

                    <div class='panel-body'><p></p>
                        <div class="row">
                            <div class="col-sm-3">
                                <form method="post"> <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Medewerker
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">

                                            <?php $calendar->DropDownMenuPlannedHours(); // ?>

                                        </ul></div><!--EINDE dropdownmenu rank wijzigen --->
                            </div>
						</div>
</div>						<!------------------- Dropdownmenu voor rank toevoegen  ------------------>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <h3>Rank toevoegen</h3>
                    </div>

                    <div class='panel-body'><p></p>
                        <div class="row">
                            <div class="col-sm-3">
                                <form method="post"> <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Medewerker
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">

                                            <?php $rank->Insert($rank_id, $name); // ?>

                                        </ul></div><!--EINDE dropdownmenu rank toevoegen --->
                            </div>
							</div></div><!------------------- Dropdownmenu voor rank verwijderen  ------------------>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <h3>Rank verwijderen</h3>
                    </div>

                    <div class='panel-body'><p></p>
                        <div class="row">
                            <div class="col-sm-3">
                                <form method="post"> <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Medewerker
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">

                                            <?php $calendar->DropDownMenuPlannedHours(); // ?>

                                        </ul></div><!--EINDE dropdownmenu rank verwijderen --->
                            </div>
</div></div>







<?php
include("../inc/parts/staff-footer.php");
?>
