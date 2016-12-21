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


                    <table width="100%" id="scrolltable" class="table table-striped table-bordered table-hover">


                        <form action="update_availability.php" method="post">
                            <tbody>
                                <tr>
                                    <td>Dag</td>
                                    <td>Begintijd</td>
                                    <td>Eindtijd</td>                        </tr>
                                <tr>
                                    <td>

                                        <span class="label label-default">Maandag</span>
                                        <input type="text" width="100%"id="inputUsername" class="form-control hidden" value="Maandag"  disabled >

                                    </td>

                                    <td>
                                        <?php //---------------Maandag---------------------------   ?>
                                        <div class="input-group clockpicker" data-autoclose="true"> 
                                            <input type="time" name="starttimemonday" class="form-control"  placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "maandag") ?>"  >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time "></span>
                                            </span>
                                        </div>							

                                    <td>

                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="time" name="endtimemonday"class="form-control" min="starttimemonday"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "maandag") ?>"  >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time "></span>
                                            </span>
                                        </div>							
                                    </td>
                                </tr>
                                <tr>                                   <td>
                                        <?php //--------------------------------------------------Dinsdag------------------------------------------------------------   ?>
                                        <span class="label label-default">Dinsdag</span>
                                        <input type="text" id="inputUsername" class="form-control hidden" value="Dinsdag" disabled >
                                    </td>

                                    <td>
                                        <?php //---------------starttijd dinsdag---------------------------   ?>
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="time" name="starttimetuesday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "dinsdag") ?>"  >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time "></span>
                                            </span>
                                        </div>							
                                    </td>
                                    <td>
                                        <?php //---------------Eind tijd dinsdag---------------------------   ?>
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="time" name="endtimetuesday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "dinsdag") ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "dinsdag") ?>"  >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time "></span>
                                            </span>
                                        </div>							
                                    </td>
                                </tr> 
                                <tr>
                                    <td>
                                        <span class="label label-default">Woensdag</span>
                                        <?php //--------------------------------------------------Woensdag------------------------------------------------------------   ?>
                                        <input type="text" id="inputUsername" class="form-control hidden" value="Woensdag" disabled >						
                                    </td>
                                    <td>
                                        <?php //---------------starttijd Woensdag---------------------------   ?>
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="time" name="starttimewednesday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "woensdag") ?>"  >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time "></span>
                                            </span>
                                        </div>							
                                    </td>
                                    <td>
                                        <?php //---------------Eindtijd Woensdag---------------------------   ?>
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="time" name="endtimewednesday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "woensdag") ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "woensdag") ?>"  >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time "></span>
                                            </span>
                                        </div>
                                    </td>							

                                </tr>
                                <tr>
                                    <td>
                                        <span class="label label-default">Donderdag</span>
                                        <?php //--------------------------------------------------Donderdag------------------------------------------------------------   ?>
                                        <input type="text" id="inputUsername" class="form-control hidden" value="Donderdag" disabled >						
                                    </td>
                                    <td>
                                        <?php //---------------starttijd Donderdag---------------------------   ?>
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="time" name="starttimethursday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "donderdag") ?>">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time "></span>
                                            </span>
                                        </div>							
                                    </td>
                                    <td>
                                        <?php //---------------Eindtijd Donderdag---------------------------   ?>
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="time" name="endtimethursday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "donderdag") ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "donderdag") ?>">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time "></span>
                                            </span>
                                        </div>							
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <span class="label label-default">Vrijdag</span>
                                        <?php //--------------------------------------------------Vrijdag------------------------------------------------------------   ?>
                                        <input type="text" id="inputUsername" class="form-control hidden" value="Vrijdag" disabled >						
                                    </td>
                                    <td>
                                        <?php //---------------starttijd Vrijdag---------------------------   ?>
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="time" name="starttimefriday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "vrijdag") ?>"  >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time "></span>
                                            </span>		
                                        </div></td>
                                    <td>
                                        <?php //---------------Eindtijd Vrijdag---------------------------   ?>
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="time" name="endtimefriday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "vrijdag") ?>" placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "vrijdag") ?>">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time "></span>
                                            </span>
                                        </div>							
                                    </td>
                                <tr>
                                    <td>
                                        <span class="label label-default">Zaterdag</span>
                                        <?php //--------------------------------------------------Zaterdag------------------------------------------------------------   ?>
                                        <input type="text" id="inputUsername" class="form-control hidden" value="Zaterdag" disabled >						
                                    </td>
                                    <td>
                                        <?php //---------------Start Zaterdag---------------------------   ?>
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="time" name="starttimesaturday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "zaterdag") ?>"  >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time "></span>
                                            </span>
                                        </div></td>							
                                    <td>

                                        <?php //---------------Eindtijd Zaterdag---------------------------   ?>
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="time" name="endtimesaturday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "zaterdag") ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "zaterdag") ?>"  >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time "></span>
                                            </span>
                                        </div></td>							
                                <tr>
                                    <td>
                                        <span class="label label-default">Zondag</span>
                                        <?php //--------------------------------------------------Zondag------------------------------------------------------------   ?>
                                        <input type="text" id="inputUsername" class="form-control hidden" value="Zondag" disabled >						
                                    </td>
                                    <td>
                                        <?php //---------------Start Zondag---------------------------   ?>
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="time" name="starttimesunday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "zondag") ?>"  >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time "></span>
                                            </span>
                                        </div>							
                                    </td>
                                    <td>
                                        <?php //---------------Eindtijd Zondag---------------------------   ?>        
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="time" name="endtimesunday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "zondag") ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "zondag") ?>"  >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time "></span>
                                            </span>
                                        </div>							
                                    </td>




                            </tbody>
                    </table>
                    <input type='submit' name='knopavailability' value="Aanpassen">
                </div> </div>
        </div>






        </form>

        <div class="container col-sm-6">
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h3>Huidige beschikbaarheid</h3>
                </div>
                <div class='panel-body'>

                    <table class='table table-striped table-bordered table-hover' id='scrolltable2'>
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
</div>
<!-- /.container-fluid -->
</div>



<!-- /#page-wrapper --
<!-- /#wrapper -->

<?php
include("../inc/parts/staff-footer.php");
?>