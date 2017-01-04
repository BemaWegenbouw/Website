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
<?php $calendar->GetAvailability(); ?>

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
                    <h3>Inplannen</h3>
                </div>

                <div class='panel-body'>
                    <form action="planning-verwerk.php" method="post">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Medewerker
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">


<?php $calendar->DropDownMenuPlannedHours(); ?>


                            </ul></div>
                        <br>
                        <label>Datum</label>
                        <div class="input-group date datepicker" data-provide="datepicker" >
                            <input type="date" name="dateplanning"class="form-control" placeholder="yyyy-mm-dd" required>
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </div>  </div>



                        <label>Start tijd</label>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="starttimeplanning"class="form-control" placeholder="07:00" required >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
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
<?php $calendar->SelectPlannedHours(); ?>

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
