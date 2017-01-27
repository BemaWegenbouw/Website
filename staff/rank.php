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
                <h1 class="page-header">Rangpagina</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <style>
        @media only screen and (max-width : 767px) {
            .box {
                height: auto !important;
            }
        }
    </style>
    <script>
        $(function () {
            $('.box').matchHeight();
        });
    </script>
    <?php
    if ((isset($_POST['editstaff']) && !empty($_POST['editstaff'])) OR ( isset($_POST['permission']) && !empty($_POST['permission']))) {
        if (isset($_POST['editstaff'])) {
            $rank_id = $_POST['rank_id'];
            $uidd = $_POST['uidd'];
            print("<script type='text/javascript'>noty({text: 'Het rang van de medewerker is gewijzigd.', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");
            $rank->editstaffrank($rank_id, $uidd);
        };
        if (isset($_POST['permission'])) {
            $rank_id = $_POST['rank_id'];
            $permission_id = $_POST['permission_id'];
            $rank->editpermission($permission_id, $rank_id);
            print("<script type='text/javascript'>noty({text: 'Het minimale rang van de pagina is gewijzigd.', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");
        };
    };
    if (isset($_POST['add']) && !empty($_POST['add'])) {
        $rank_id = $_POST['rank_id'];
        $name = $_POST['name'];
        if ($security->Sanitize($name) == $name) {
            print("<script type='text/javascript'>noty({text: '" . $name . " rang toegevoegd.', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");
            $rank->insert($rank_id, $name);
        };
    };
    if (isset($_POST['edit']) && !empty($_POST['edit'])) {
        $rank_id1 = $_POST['rank_id1'];
        $rank_id2 = $_POST['rank_id2'];
        $rankname = $_POST['rankname'];
        if ($security->Sanitize($rankname) == $rankname) {
            if ($rank_id2 != 0) {
                if ($rankname != "0") {
                    print("<script type='text/javascript'>noty({text: 'De naam en het nummer van de rang zijn aangepast.', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");
                    $rank->updateboth($rank_id1, $rank_id2, $rankname);
                } else {
                    $rank->updaterank($rank_id1, $rank_id2);
                    print("<script type='text/javascript'>noty({text: 'Het nummer van de rang is aangepast.', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");
                };
            } elseif ($rankname != "0") {
                print("<script type='text/javascript'>noty({text: 'De naam van de rang is aangepast.', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");
                $rank->updatename($rank_id1, $rankname);
            };
        };
    };
    if (isset($_POST['delete']) && !empty($_POST['delete'])) {
        $confirmation = $_POST['confirmation'];
        $rank_id = $_POST['rank_id'];
        if ($confirmation == 'yes') {
            print("<script type='text/javascript'>noty({text: 'De rang is verwijderd.', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");
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
                        <h3>Medewerker rang wijzigen</h3>
                    </div>

                    <div class='panel-body'><p></p>
                        <div class="row box">
                            <div class="col-sm-12">
                                <form method="post" action="rank.php">
                                    <label for="inputRank">Medewerker</label><br />
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
                <div class='panel col-sm-6' style="border:1px solid lightblue">
                    <div class='panel-heading' style="background-color: lightblue; margin-left:-16px; margin-right:-16px">
                        <h3>Minimale permissie voor pagina wijzigen</h3>
                    </div>

                    <div class='panel-body'><p></p>
                        <div class="row box">
                            <div class="col-sm-12">
                                <form method="post" action="rank.php">
                                    <label for="inputRank">pagina</label><br />
                                    <select name="permission_id" id="inputname" class="form-control" required><?php $rank->Listpermission(); ?></select>
                                    <br>
                                    <label for="inputRank">minimale Rang</label><br />
                                    <select name="rank_id" id="inputRank" class="form-control" required><?php $rank->ListRanks(); ?></select>
                                    <!--EINDE dropdownmenu rank wijzigen --->
                                    <br>
                                    <div>
                                        <button class="btn btn-sm btn-primary btn-block" type="submit" name="permission" value="Submit">Verzenden</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!------------------- Dropdownmenu voor rank toevoegen  ------------------>
                <div class='panel col-sm-4' style="border:1px solid lightgreen">
                    <div class='panel-heading' style="background-color: lightgreen; margin-left:-16px; margin-right:-16px">
                        <h3>Rang toevoegen</h3>
                    </div>

                    <div class='panel-body'><p></p>
                        <div class="row box">
                            <div class="col-sm-12">
                                <form method="post">
                                    <label for="inputUsername">Rangnaam</label><br />
                                    <input type="text" id="inputUsername" class="form-control" placeholder="rangnaam" name="name" required><br />

                                    <label for="inputUsername">Rangnummer(1-100)</label><br />
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
                <div class='panel col-sm-4' style="border:1px solid lightblue">
                    <div class='panel-heading' style="background-color: lightblue; margin-left:-16px; margin-right:-16px">
                        <h3>Rang aanpassen</h3>
                    </div>

                    <div class='panel-body'><p></p>
                        <div class="row box">
                            <div class="col-sm-12">
                                <form method="post">
                                    <label for="inputRank">Oude Rangnaam</label><br />
                                    <select name="rank_id1" id="inputRank" class="form-control" required><?php $rank->ListRanks(); ?></select>
                                    <!--EINDE dropdownmenu rank wijzigen --->
                                    <br>
                                    <label for="inputUsername">Nieuwe rangnaam (0=blijft gelijk)</label><br />
                                    <!--<input type="text" id="inputUsername" class="form-control" placeholder="rangnaam" name="rankname" required><br />-->
                                    <input type="text" class="form-control" placeholder="rangnaam" name="rankname" required><br />
                                    <label for="inputUsername">Nieuw rangnummer(1-100)(0=blijft gelijk)</label><br />
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
                <div class='panel col-sm-4' style="border:1px solid lightcoral;">
                    <div class='panel-heading' style="background-color: lightcoral; margin-left:-16px; margin-right:-16px">
                        <h3>Rang verwijderen</h3>
                    </div>

                    <div class='panel-body'><p></p>
                        <div class="row box">
                            <div class="col-sm-12">
                                <form method="post">
                                    <label for="inputRank">Rang(rang medewerker, redacteur en beheerder kunnen niet verwijderd worden.)</label><br />
                                    <select name="rank_id" id="inputRank" class="form-control" required><?php $rank->ListRanksdelete(); ?></select>
                                    <!--EINDE dropdownmenu rank wijzigen --->
                                    <br>
                                    <label for="inputRank">Weet u zeker dat u dit rang wil verwijderen?(medewerkers met dit rang worden rang 10 (medewerker)</label><br />
                                    <select name="confirmation" id="inputRank" class="form-control" required>
                                        <option value="no" name="confirmation">Nee</option>
                                        <option value="yes" name="confirmation">Ja</option>
                                    </select>
                                    <br>
                                    <div>
                                        <button class="btn btn-sm btn-primary btn-block" type="submit" name="delete" value="Submit">Verzenden</button>
                                    </div>
                                </form><!--EINDE dropdownmenu rank verwijderen --->
                            </div>
                        </div>
                    </div>
                </div>
                <div class='panel col-sm-6' style="border:1px solid lightblue;">
                    <div class='panel-heading' style="background-color: lightblue; margin-left:-16px; margin-right:-16px">
                        <h3>Rangen</h3>
                    </div>
                    <div width="auto" class='panel-body'>
                        <div class="row box">
                            <table width="100%" class='table table-striped table-bordered table-hover' id='scrolltable'>
                                <thead>
                                    <tr>
                                        <th>Rangnummer</th>
                                        <th>Rangnaam</th>
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
                </div>
                <div class='panel col-sm-6' style="border:1px solid lightblue;">
                    <div class='panel-heading' style="background-color: lightblue; margin-left:-16px; margin-right:-16px">
                        <h3>Medewerkers met hun rang</h3>
                    </div>
                    <div width="auto" class='panel-body'>
                        <div class="row box">
                            <table width="100%" class='table table-striped table-bordered table-hover' id='scrolltable2'>
                                <thead>
                                    <tr>
                                        <th>Voornaam</th>
                                        <th>Achternaam</th>
                                        <th>Rangnaam</th>
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
    </div>





    <?php
    include("../inc/parts/staff-footer.php");
    ?>
