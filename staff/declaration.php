<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-declaration";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");
$uid = $_SESSION["uid"];

$sending = '';//zorgt voor dat er geen foutmelding komt
//als de $sending 2 word dan komt er een foutmelding: "Uw declaratie is niet verzonden, probeer het opnieuw"
//als de $sending 3 word dan komt er een foutmelding: "Uw declaratie is niet verzonden, de eind tijd begint voor de start tijd."

if (isset($_POST) && !empty($_POST)) {//als de POST leeg is dan:	
	if(!empty($_POST['date']) && !empty($_POST['end_time']) && !empty($_POST['start_time'])){//als de datum , start tijd eind tijd,een waarde hebben dan:
		if($_POST['end_time'] < $_POST['start_time']){//als eind tijd kleiner is dan de start tijd 
			$sending = 3;//dan word de variable meegenomen (regel 59) er komt  een foutmelding: "Uw declaratie is niet verzonden, de eind tijd begint voor de start tijd." (regel 59)
		}else{
			
        $userid = $uid;//userid word uid
        $date = $_POST['date'];//de ingevulde datum word de variabele $date
        $start = $_POST['start_time'];//de ingevulde start tijd word de variabele $start
        $start_time = "$start:00";//de uiteindelijke start tijd met de nullen er bij die word gebruikt bij de functie.
        $end = $_POST['end_time'];//de ingevulde eind tijd word de variabele $end
        $end_time = "$end:00";//de uitenijndelijke eind tijd met de nuller er bij die word gebruikt in de functie.
        $break = $_POST['break'];//de ingevulde minuten pauze.

        $declaration->insert($userid, $date, $start_time, $end_time, $break);//De declaratie word ingevoerd
		$sending = 1;//er gebeurt niets
    }
	}else{//als de start_tijd , de eindtijd en de datum --NIET-- ingevuld zijn dan: 
			$sending = 2;//dan word de variable die meegenomen naar (regel 52): "Uw declaratie is niet verzonden, probeer het opnieuw."
	}
	}
?>
<!-- Page Content -->
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Urendeclaratie</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="container-fluid">
        <div class='row'>
            <div class="col-sm-5">
                <form method="post" action="declaration.php">				
						<!---------------------------------Begin foutmelding declaratie word niet verzonden------------------------------>
                                                <?php if ($sending == 2) { ?>
						<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">Uw declaratie is niet verzonden, probeer het opnieuw.</span>
                        </div>                  <!---------------------------------Eind foutmelding declaratie word niet verzonden------------------------------>
						<?php } ?>
                        
                        
                                                <!-------------------Begin foutmelding declaratie word niet verzonden, de eintijd begint voor de starttijd------>
						<?php if ($sending == 3) { ?>
						<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">Uw declaratie is niet verzonden, de eind tijd begint voor de start tijd.</span>
                        </div>                  <!---------------------------------Eind foutmelding declaratie word niet verzonden------------------------------>
						<?php } ?>
                        
                        <!-----------------------------Begin datum ------------------------------------------->
                    <div class="col-sm-12 form-group">
                        datum:<span style="color:red;"> *</span>
                        <div class="input-group date datepicker" data-provide="datepicker">
                            <input type="date" name="date"class="form-control" placeholder="jjjj-mm-dd" required>
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </div>
                        </div>
                    </div>
                      <!--------------------------------Einde datum -------------------------------------------->
                      
                      <!------------------------------------Start  Start tijd----------------------------------->
                    <div class="col-sm-6 form-group">
                        begintijd:<span style="color:red;"> *</span>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="start_time"class="form-control" placeholder="--:--" required >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                      <!-----------------------------------Einde start tijd ------------------------------------>
                      
                      <!------------------------------------Start Eind tijd------------------------------------->
                    <div class="col-sm-6 form-group">
                        eindtijd:<span style="color:red;"> *</span>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="end_time"class="form-control" placeholder="--:--" required >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                       <!--------------------------------------Eind Eind tijd------------------------------------>
                       
                       <!--------------------------------------Start Pauze--------------------------------------->
                    <div class="col-sm-12 form-group">
                        pauze:

                        <div >
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-number" type="button" data-type="minus" data-field="break" ><span class="glyphicon glyphicon-minus"></span></button>
                                </span>
                                <input type="text" class="form-control" name="break" value="0" min="0" max="150">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-number" type="button" data-type="plus" data-field="break"><span class="glyphicon glyphicon-plus"></span></button>
                                </span>
                            </div>
                        </div>
                    </div>
                       <!---------------------------------------Eind Pauze ----------------------------------------->
                      
                       <!--------------------------------------Start Submit----------------------------------------->
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-sm btn-primary btn-right" backgroundcolor="grey" type="submit" name="submit" value="Submit">verzenden</button>
                    </div>
					<div class="col-sm-12 form-group">
					Alles met een <span style="color:red;">*</span> is een verplicht veld.
					</div>
                       <!-------------------------------------Eind Submit-------------------------------------------->
                </form>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.panel-heading -->
    <!----------------------------------------------------BEGIN tabel openstaande declaraties--------------------------------------------------------------------->
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-lg-12'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
					<h4>Openstaande declaraties</h4>
                    </div>

                    <div width="auto" class='panel-body'>
                        <table width="100%" class='table table-striped table-bordered table-hover' id='scrolltable'>
                            <thead>
                                <tr>
                                    <th>Voornaam</th>
                                    <th>Achternaam</th>
                                    <th>Datum</th>
                                    <th>Start tijd</th>
                                    <th>Eind tijd</th>
                                    <th>Pauze</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $userid = $uid;
                                $declaration->declistcompleetUnapproved($userid);//Laad de tr's en td's van alle openstaande declaraties voor de betreffende persoon.
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!----------------------------------------------------EINDE tabel openstaande declaraties--------------------------------------------------------------------->
     
     <!----------------------------------------------------BEGIN gesloten declaraties ----------------------------------------------------------------------------->
 <div class='container-fluid'>
        <div class='row'>
            <div class='col-lg-12'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
					<h4>Gesloten declaraties</h4>
                    </div>

                    <div width="auto" class='panel-body'>
                        <table width="100%" class='table table-striped table-bordered table-hover' id='scrolltable2'>
                            <thead>
                                <tr>
                                    <th>Voornaam</th>
                                    <th>Achternaam</th>
                                    <th>Datum</th>
                                    <th>Start tijd</th>
                                    <th>Eind tijd</th>
                                    <th>Pauze</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $userid = $uid;
                                $declaration->declistcompleetApproved($userid);//Laad de tr's en td's van alle gesloten declaraties voor de betreffende persoon
                                ?>
                            </tbody>
                        </table>
                        <!----------------------------------------------------EINDE gesloten declaraties ----------------------------------------------------------------------------->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
include("../inc/parts/staff-footer.php");
?>



