<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-declaration";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");
$uid = $_SESSION["uid"];

$sending = '';
    if (isset($_POST) && !empty($_POST)) {
	
	if(!empty($_POST['date']) && !empty($_POST['end_time']) && !empty($_POST['start_time'])){
		if($_POST['end_time'] < $_POST['start_time']){
			$sending = 3;
		}else{
			
        $userid = $uid;
        $date = $_POST['date'];
        $start = $_POST['start_time'];
        $start_time = "$start:00";
        $end = $_POST['end_time'];
        $end_time = "$end:00";
        $break = $_POST['break'];

        $declaration->insert($userid, $date, $start_time, $end_time, $break);
		$sending = 1;
    }
	}else{
			$sending = 2;
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
						<?php if ($sending == 2) { ?>
						<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">Uw declaratie is niet verzonden, probeer het opnieuw.</span>
                        </div>
						<?php } ?>
						<?php if ($sending == 3) { ?>
						<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">Uw declaratie is niet verzonden, de eind tijd begint voor de start tijd.</span>
                        </div>
						<?php } ?>
                    <div class="col-sm-12 form-group">
                        datum:<span style="color:red;"> *</span>
                        <div class="input-group date datepicker" data-provide="datepicker">
                            <input type="date" name="date"class="form-control" placeholder="jjjj-mm-dd" required>
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        begintijd:<span style="color:red;"> *</span>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="start_time"class="form-control" placeholder="--:--" required >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        eindtijd:<span style="color:red;"> *</span>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="end_time"class="form-control" placeholder="--:--" required >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
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

                    <div class="col-sm-12 form-group">
                        <button class="btn btn-block btn-default pull-left" type="submit" name="submit" value="Submit">verzenden</button>
                    </div>
					<div class="col-sm-12 form-group">
					Alles met een <span style="color:red;">*</span> is een verplicht veld.
					</div>
                </form>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.panel-heading -->
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-lg-12'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
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
                                $declaration->declistcompleet($userid);
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



