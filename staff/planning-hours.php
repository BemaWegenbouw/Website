<?php
//Bema Wegenbouw BV Website
//Copyright 2016
$page = "staff-planning";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");
if ($user->Get($_SESSION["uid"], "rank_id") < $permission->Get("add_staff")) {
    header("Location: dashboard.php");
    die("Unauthorized.");
}
//
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="row"><h1>Inroosterpagina</h1><div class="col-sm-8"<br><div>Op deze pagina kunt u de medewerkers inplannen. Via het menu Inplannen kunt u kiezen voor 1 of meerdere medewerkers die u op een bepaalde dag inpland. In het planningsmenu kunt u de huidige status van medewerkers inzien, in het beschikbaarheidsmenu kunt u zien op welke dagen uw medewerkers beschikbaar zijn, en in het ingeplande medewerkers menu kunt u de huidig ingeplande diensten verwijderen. </div><br></div></div>
    <div class="row">
        <div class="col-sm-6">
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <!------------------------------- Calendar----------------------------- -->
                    <h3>Planningskalender</h3>
                </div>

                <div class='panel-body'>


                    <div class="container-fluid" style="position: relative;">
                        <div id="calendar"  ></div>
                        <br />
                        <!--                roept de calender aan-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">




 <!------------------------------- Besschikbaarheid tabel----------------------------- -->
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h3>Beschikbaarheid</h3>
                </div>

                <div class='panel-body'>
                    <table width="100%" class='table table-striped table-bordered' id='scrolltable2'>
                        <thead>
                            <tr>
                                <th>Persoon</th>
                                <th>Dag</th>
                                <th>Begin tijd</th>
                                <th>Eind Tijd</th>

                            </tr>
                        </thead>
                        <tbody>
<?php $calendar->GetAvailability(); ?>  <!----- functie voor alle tabel rijen (tr)------ -->

                        </tbody>
                    </table>

                </div>
            </div>   
        </div>
    </div>
    <div class="row">
	 <div class="col-sm-6" > 
            <div class='panel panel-default'>
                <div class='panel-heading'>
                     <!------------------------------- Input Form om mensen in te roosteren----------------------------- -->
                    <h3>Inplannen</h3>
                </div>

                <div class='panel-body'>
                    <form action="planning-verwerk.php" method="post">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Medewerker
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">


<?php $calendar->DropDownMenuPlannedHours(); ?>  <!-------- variables van dropdownmenu voor dropdownmenu----------- -->


                            </ul></div>
                        <br>
                         <!----------------- datum input------------------- -->
                        <label>Datum</label>
                        <div class="input-group date datepicker" data-provide="datepicker" >
                            <input type="date" name="dateplanning"class="form-control" placeholder="yyyy-mm-dd" required>
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </div>  </div>


                    <!--------------- starttijd input--------------- -->
                        <label>Start tijd</label>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="starttimeplanning"class="form-control" placeholder="07:00" required >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                         <!------------------------------- Eind tijd input----------------------------- -->
                        <label>Eind tijd</label>  
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="endtimeplanning"class="form-control" placeholder="17:00" required >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                        <br>
                        <label></label>  <input type="submit" class="form_control" >


                    </form>         
                </div> 
            </div>
        </div> 
        <div class="col-sm-6" >    

            <div class='panel panel-default'>
                <div class='panel-heading'>
                     <!------------------------------- Tabel voor ingeplande werknemers----------------------------- -->
                    <h3>Ingeplande Medewerkers</h3>
                </div>

                <div class='panel-body'>

                    <table width="100%" class='table table-striped table-bordered' id='scrolltable'>

                        <thead>
                            <tr>
                                <th>Voornaam</th>
                                <th>Achternaam</th>
                                <th>userCode</th>
                                <th>Start Tijd</th>
                                <th>Eind Tijd</th>
                                <th>Datum</th>
                                <th>Verwijder</th>

                            </tr>
                        </thead>
                        <tbody>
<?php $calendar->SelectPlannedHours(); ?>  <!------------- De TR rijen voor de tabel , inclusief variablen meenemen naar de delete functie-------- -->

                        </tbody>
                    </table>

                </div>
            </div>
        </div> 
    </div> 
    <!-- /.row -->          
    <!-- /#page-wrapper -->
</div>



<?php
include("../inc/parts/staff-footer.php");
