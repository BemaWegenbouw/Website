<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-rank";
require_once("../inc/engine.php");

if ($user->Get($_SESSION["uid"], "rank_id") < $permission->Get("rank_staff")) {
    header("Location: dashboard.php");
    die("Unauthorized.");
}

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
    <?php
    if (isset($_POST['submit']) && !empty($_POST['submit'])) {
        $rank_id = $_POST['rank_id'];
        $uidd = $_POST['uidd'];
        $rank->editstaffrank($rank_id, $uidd);
    };
    if (isset($_POST['add']) && !empty($_POST['add'])) {
        $rank_id = $_POST['rank_id'];
        $name = $_POST['name'];
        if ($security->Sanitize($name) == $name) {
            $rank->insert($rank_id, $name);
        };
    };
    if (isset($_POST['edit']) && !empty($_POST['edit'])) {
        $rank_id1 = $_POST['rank_id1'];

        $rank_id2 = $_POST['rank_id2'];

        $name = $_POST['name'];

        if ($rank_id2 != 0 && $name != 0) {
            $rank->updateboth($rank_id1, $rank_id2, $name);
        } elseif ($name != 0) {
            $rank->updatename($rank_id1, $name);
        };
    };
    if (isset($_POST['delete']) && !empty($_POST['delete'])) {
        $confirmation = $_POST['confirmation'];
        $rank_id = $_POST['rank_id'];
        if ($confirmation == 'yes') {
            $rank->delete($rank_id);
        };
    };
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <!------------------- Dropdownmenu voor rank wijzigen  ------------------>
                <div class='panel col-sm-6' style="border:1px solid lightblue">
                    <div class='panel-heading' style="background-color: lightblue; margin-left:-16px; margin-right:-16px">
                        <h3>medewerker rang wijzigen</h3>
                    </div>

                    <div class='panel-body'><p></p>
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="post" action="rank.php">
                                    <label for="inputRank">medewerker</label><br />
                                    <select name="uidd" id="inputname" class="form-control" required><?php $rank->Listname(); ?></select>
                                    <br>
                                    <label for="inputRank">Rang</label><br />
                                    <select name="rank_id" id="inputRank" class="form-control" required><?php $rank->ListRanks(); ?></select>
                                    <!--EINDE dropdownmenu rank wijzigen --->
                                    <br>
                                    <div>
                                        <button class="btn btn-sm btn-primary btn-block" type="submit" name="editstaff" value="Submit">Verzenden</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!------------------- Dropdownmenu voor rank toevoegen  ------------------>

                <div class='panel col-sm-6' style="border:1px solid lightgreen">
                    <div class='panel-heading' style="background-color: lightgreen; margin-left:-16px; margin-right:-16px">
                        <h3>Rang toevoegen</h3>
                    </div>

                    <div class='panel-body'><p></p>
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="post">
                                    <label for="inputUsername">rangnaam</label><br />
                                    <input type="text" id="inputUsername" class="form-control" placeholder="rangnaam" name="name" required><br />

                                    <label for="inputUsername">rangnummer(1-100)</label><br />
                                    <div >
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default btn-number" type="button" data-type="minus" data-field="rank_id" ><span class="glyphicon glyphicon-minus"></span></button>
                                            </span>
                                            <input type="text" class="form-control" name="rank_id" value="0" min="0" max="100">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default btn-number" type="button" data-type="plus" data-field="rank_id"><span class="glyphicon glyphicon-plus"></span></button>
                                            </span>
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <button class="btn btn-sm btn-primary btn-block" type="submit" name="add" value="submit">Verzenden</button>
                                    </div>
                                </form>

                                <!--EINDE dropdownmenu rank toevoegen --->
                            </div>
                        </div>
                    </div>
                </div><!------------------- Dropdownmenu voor rank verwijderen  ------------------>
                <div class='panel col-sm-6' style="border:1px solid lightblue">
                    <div class='panel-heading' style="background-color: lightblue; margin-left:-16px; margin-right:-16px">
                        <h3>Rang aanpassen</h3>
                    </div>

                    <div class='panel-body'><p></p>
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="post">
                                    <label for="inputRank">oud Rang</label><br />
                                    <select name="rank_id1" id="inputRank" class="form-control" required><?php $rank->ListRanks(); ?></select>
                                    <!--EINDE dropdownmenu rank wijzigen --->
                                    <br>
                                    <label for="inputUsername">nieuw rang</label><br />
                                    <input type="text" id="inputUsername" class="form-control" placeholder="rangnaam" name="name" required><br />

                                    <label for="inputUsername">rangnummer(1-100)(0=blijft gelijk)</label><br />
                                    <div >
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default btn-number" type="button" data-type="minus" data-field="rank_id2" ><span class="glyphicon glyphicon-minus"></span></button>
                                            </span>
                                            <input type="text" class="form-control" name="rank_id2" value="0" min="0" max="100">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default btn-number" type="button" data-type="plus" data-field="rank_id2"><span class="glyphicon glyphicon-plus"></span></button>
                                            </span>
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <button class="btn btn-sm btn-primary btn-block" type="submit" name="edit" value="Submit">Verzenden</button>
                                    </div>
                                </form>
                                <!--EINDE dropdownmenu rank aanpassen --->
                            </div>
                        </div>
                    </div>
                </div>
                <div class='panel col-sm-6' style="border:1px solid lightcoral;">
                    <div class='panel-heading' style="background-color: lightcoral; margin-left:-16px; margin-right:-16px">
                        <h3>Rang verwijderen</h3>
                    </div>

                    <div class='panel-body'><p></p>
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="post">
                                    <label for="inputRank">Rang</label><br />
                                    <select name="rank_id" id="inputRank" class="form-control" required><?php $rank->ListRanksdelete(); ?></select>
                                    <!--EINDE dropdownmenu rank wijzigen --->
                                    <br>
                                    <label for="inputRank">weet u zeker dat u dit rang wil verwijderen?(medewerkers met dit rang worden rang 10)</label><br />
                                    <select name="confirmation" id="inputRank" class="form-control" required>
                                        <option value="no" name="confirmation">Nee</option>
                                        <option value="yes" name="confirmation">Ja</option>
                                    </select>
                                    <br><br><br><br>
                                    <div>
                                        <button class="btn btn-sm btn-primary btn-block" type="submit" name="delete" value="Submit">Verzenden</button>
                                    </div>
                                </form><!--EINDE dropdownmenu rank verwijderen --->
                            </div>
                        </div>
                    </div>
                </div>
                <div class='panel col-sm-6' style="border:1px solid lightblue">
                    <div class='panel-heading' style="background-color: lightblue; margin-left:-16px; margin-right:-16px">
                        <h3>Rangen</h3>
                    </div>
                    <div width="auto" class='panel-body'>
                        <table width="100%" class='table table-striped table-bordered table-hover' id='scrolltable'>
                            <thead>
                                <tr>
                                    <th>rangnummer</th>
                                    <th>rangnaam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rank->ranktabel(); //Laad de tr's en td's van alle openstaande declaraties voor de betreffende persoon.
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class='panel col-sm-6' style="border:1px solid lightblue">
                    <div class='panel-heading' style="background-color: lightblue; margin-left:-16px; margin-right:-16px">
                        <h3>medewerkers met hun rang</h3>
                    </div>
                    <div width="auto" class='panel-body'>
                        <table width="100%" class='table table-striped table-bordered table-hover' id='scrolltable2'>
                            <thead>
                                <tr>
                                    <th>Voornaam</th>
                                    <th>Achternaam</th>
                                    <th>rangnaam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rank->rankstafftabel(); //Laad de tr's en td's van alle openstaande declaraties voor de betreffende persoon.
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <?php
    include("../inc/parts/staff-footer.php");
    ?>
