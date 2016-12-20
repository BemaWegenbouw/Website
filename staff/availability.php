<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-availability";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

$uid = $_SESSION["uid"];
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
        <div class="container col-sm-6">
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h3>Beschikbaarheid doorgeven</h3>
                </div>

                <div class='panel-body'>

                    <div> Op deze pagina word uw vaste beschikbaarheid doorgegeven. 
                        De beschikbaarheid die u nu doorgeeft word geldt voor elke week. 
                        Indien u eenmalig niet beschikbaar bent voor een bepaalde tijd en niet uw vaste beschikbaarheid wil aanpassen, hoort u dit aan te vragen met de  vrijvraag formulier.<br><br></div>
                    <div class="col-sm-4 form-group">


                        <form action="update_availability.php" method="post">
                            <div >
                                <input type="text" id="inputUsername" class="form-control" value="Maandag" disabled >

                            </div>							
                    </div>
                    <div class="col-sm-3 form-group">
                        <?php //---------------Maandag---------------------------   ?>
                        <div class="input-group clockpicker" data-autoclose="true"> 
                            <input type="time" name="starttimemonday"class="form-control"  placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "maandag") ?>"  >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time "></span>
                            </span>
                        </div>							
                    </div>
                    <div class="col-sm-3 form-group">

                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="endtimemonday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "maandag") ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "maandag") ?>"  >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time "></span>
                            </span>
                        </div>							
                    </div>

                    <div class="col-sm-4 form-group">

                        <?php //--------------------------------------------------Dinsdag------------------------------------------------------------   ?>
                        <input type="text" id="inputUsername" class="form-control" value="Dinsdag" disabled >							
                    </div>
                    <div class="col-sm-3 form-group">
                        <?php //---------------starttijd dinsdag---------------------------   ?>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="starttimetuesday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "dinsdag") ?>"  >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time "></span>
                            </span>
                        </div>							
                    </div>
                    <div class="col-sm-3 form-group">
                        <?php //---------------Eind tijd dinsdag---------------------------   ?>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="endtimetuesday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "dinsdag") ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "dinsdag") ?>"  >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time "></span>
                            </span>
                        </div>							
                    </div>
                    <div class="col-sm-4 form-group">
                        <?php //--------------------------------------------------Woensdag------------------------------------------------------------   ?>
                        <input type="text" id="inputUsername" class="form-control" value="Woensdag" disabled >						
                    </div>
                    <div class="col-sm-3 form-group">
                        <?php //---------------starttijd Woensdag---------------------------   ?>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="starttimewednesday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "woensdag") ?>"  >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time "></span>
                            </span>
                        </div>							
                    </div>
                    <div class="col-sm-3 form-group">
                        <?php //---------------Eindtijd Woensdag---------------------------   ?>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="endtimewednesday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "woensdag") ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "woensdag") ?>"  >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time "></span>
                            </span>
                        </div>							
                    </div>
                    <div class="col-sm-4 form-group">
                        <?php //--------------------------------------------------Donderdag------------------------------------------------------------   ?>
                        <input type="text" id="inputUsername" class="form-control" value="Donderdag" disabled >						
                    </div>
                    <div class="col-sm-3 form-group">
                        <?php //---------------starttijd Donderdag---------------------------   ?>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="starttimethursday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "donderdag") ?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time "></span>
                            </span>
                        </div>							
                    </div>
                    <div class="col-sm-3 form-group">
                        <?php //---------------Eindtijd Donderdag---------------------------   ?>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="endtimethursday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "donderdag") ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "donderdag") ?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time "></span>
                            </span>
                        </div>							
                    </div>
                    <div class="col-sm-4 form-group">
                        <?php //--------------------------------------------------Vrijdag------------------------------------------------------------   ?>
                        <input type="text" id="inputUsername" class="form-control" value="Vrijdag" disabled >						
                    </div>
                    <div class="col-sm-3 form-group">
                        <?php //---------------starttijd Vrijdag---------------------------   ?>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="starttimefriday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "vrijdag") ?>"  >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time "></span>
                            </span>
                        </div>							
                    </div>
                    <div class="col-sm-3 form-group">
                        <?php //---------------Eindtijd Vrijdag---------------------------   ?>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="endtimefriday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "vrijdag") ?>" placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "vrijdag") ?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time "></span>
                            </span>
                        </div>							
                    </div>
                    <div class="col-sm-4 form-group">
                        <?php //--------------------------------------------------Zaterdag------------------------------------------------------------   ?>
                        <input type="text" id="inputUsername" class="form-control" value="Zaterdag" disabled >						
                    </div>
                    <div class="col-sm-3 form-group">
                        <?php //---------------Start Zaterdag---------------------------   ?>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="starttimesaturday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "zaterdag") ?>"  >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time "></span>
                            </span>
                        </div>							
                    </div>
                    <div class="col-sm-3 form-group">
                        <?php //---------------Eindtijd Zaterdag---------------------------   ?>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="endtimesaturday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "zaterdag") ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "zaterdag") ?>"  >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time "></span>
                            </span>
                        </div>							
                    </div>
                    <div class="col-sm-4 form-group">
                        <?php //--------------------------------------------------Zondag------------------------------------------------------------   ?>
                        <input type="text" id="inputUsername" class="form-control" value="Zondag" disabled >						
                    </div>
                    <div class="col-sm-3 form-group">
                        <?php //---------------Start Zondag---------------------------   ?>
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="starttimesunday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "zondag") ?>"  >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time "></span>
                            </span>
                        </div>							
                    </div>
                    <div class="col-sm-3 form-group">
                        <?php //---------------Eindtijd Zondag---------------------------   ?>        
                        <div class="input-group clockpicker" data-autoclose="true">
                            <input type="time" name="endtimesunday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "zondag") ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "zondag") ?>"  >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time "></span>
                            </span>
                        </div>							
                    </div>
                    <div class="col-sm-3">

                        <input type='submit' name='knopavailability'>		
                    </div>
                </div>

            </div>
        </div>



        </form>

        <div class="container col-sm-6">
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h3>Huidige beschikbaarheid</h3>
                </div>
                <div class='panel-body'>

                    <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                        <thead>
                            <tr>
                                <th>Persoon</th>
                                <th>Dag</th>
                                <th>Begin tijd</th>
                                <th>Eind Tijd</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $calendar->GetAvailabilitySingle($uid); ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <!-- /.container-fluid -->
</div>



<!-- /#page-wrapper --
<!-- /#wrapper -->

<?php
include("../inc/parts/staff-footer.php");
?>