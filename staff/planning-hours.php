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
$get_error = '';
if (isset($_GET["error"])) {
	$get_error = $_GET["error"];
}

//
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="row"><h1>Inroosterpagina</h1></div>
	<ul>
	<div style="font-weight:bold;">Op deze pagina kunt u de medewerkers inplannen.</div><br>
	<div style="font-weight:bold;">Menu Planningkalender:</div>
	<li>In dit menu zie je alle medewerkers die al zijn ingeroosterd.</li>
	<div style="font-weight:bold;">Menu Beschikbaarheid:</div>
	<li>In dit menu ziet u wanneer welke medewerkers beschikbaar zijn.</li>
	<li>U kunt zoeken op de inhoud van de tabel via de search functie</li>
	<div style="font-weight:bold;">Menu inplannen:</div>
	<li>In dit menu kunt u 1 of meerdere medewerkers inplannen voor 1 dag.</li>
	<li>In dit menu kunt u de uren van een medewerker die is ingeroosterd wijzigen door deze opnieuw in te voeren voor een dag in het verleden</li>
	<div style="font-weight:bold;">Menu Ingeplande medewerkers:</div>
	<li>In dit menu kunt u medewerkers verwijderen voor deze dag of een toekomstige dag zijn ingepland.<Br>
		Om de uren te wijzigen van een medewerker die al gewerkt heeft zie "Menu inplannen".</li>
	</ul>

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
                        <div><button class='btn btn-sm btn-primary btn-right pull-left' style='margin-right:1%' backgroundcolor='blue' type='submit' name='submit'>Verzenden</button></div>
						<?php if ($get_error) { ?>
						<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">De einddatum begint voor de startdatum, probeer het opnieuw</span>
                        </div>
						<?php } ?>

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
