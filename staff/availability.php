<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-availability";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");
$uid = $_SESSION["uid"];
$success = false; 
if($_POST){//als er iets gepost word
			
			if(empty($_POST['starttimemonday']) && empty($_POST['endtimemonday']) && empty($_POST['starttimetuesday'])
				&& empty($_POST['endtimetuesday']) && empty($_POST['starttimewednesday']) && empty($_POST['endtimewednesday'])
			  && empty($_POST['starttimethursday']) && empty($_POST['endtimethursday']) && empty($_POST['starttimefriday'])
			  && empty($_POST['endtimefriday']) && empty($_POST['starttimesaturday']) && empty($_POST['endtimesaturday'])
			  && empty($_POST['starttimesunday']) && empty($_POST['starttimesunday'])){
				
			  }else {
			  
			foreach ($_POST as $key => $value){
				
				$$key = $value;
								
				}
				
				if($starttimemonday && $endtimemonday != null){//als de start tijd en eind tijd ingevuld zijn dan:
					if($endtimemonday < $starttimemonday){//als de eindtijd kleiner is dan de start tijd
						$success  = true;//foutmelding
					}else {//update het
					$calendar->SetTheUpdateAvailability($uid, $starttimemonday, $endtimemonday, 'maandag');//update de availability
					}
				}
				if($starttimetuesday && $endtimetuesday != null){//als de start tijd en eind tijd ingevuld zijn dan:
					if($endtimetuesday < $starttimetuesday){//als de eindtijd kleiner is dan de start tijd
						$success  = true;//foutmelding
					}else {
					$calendar->SetTheUpdateAvailability($uid, $starttimetuesday, $endtimetuesday, 'dinsdag');
					}
				}
				if($starttimewednesday && $endtimewednesday != null){//als de start tijd en eind tijd ingevuld zijn dan:
					if($endtimewednesday < $starttimewednesday){//als de eindtijd kleiner is dan de start tijd
						$success  = true;//foutmelding
					}else {
					$calendar->SetTheUpdateAvailability($uid, $starttimewednesday, $endtimewednesday, 'woensdag');
					}
				}
				if($starttimethursday && $endtimethursday != null){//als de start tijd en eind tijd ingevuld zijn dan:
					if($endtimethursday < $starttimethursday){//als de eindtijd kleiner is dan de start tijd
						$success  = true;//foutmelding
					}else {
					$calendar->SetTheUpdateAvailability($uid, $starttimethursday, $endtimethursday, 'donderdag');
					}
				}
				if($starttimefriday && $endtimefriday != null){//als de start tijd en eind tijd ingevuld zijn dan:
					if($endtimefriday < $starttimefriday){//als de eindtijd kleiner is dan de start tijd
						$success = true;//foutmelding
					}else {
					$calendar->SetTheUpdateAvailability($uid, $starttimefriday, $endtimefriday, 'vrijdag');
					}
				}
				if($starttimesaturday && $endtimesaturday != null){//als de start tijd en eind tijd ingevuld zijn dan:
					if($endtimesaturday < $starttimesaturday){//als de eindtijd kleiner is dan de start tijd
						$success= true;//foutmelding
					}else {
					$calendar->SetTheUpdateAvailability($uid, $starttimesaturday, $endtimesaturday, 'zaterdag');
					}
				}
				if($starttimesunday && $endtimesunday != null){//als de start tijd en eind tijd ingevuld zijn dan:
					if($endtimesunday < $starttimesunday){//als de eindtijd kleiner is dan de start tijd
						$success  = true;//foutmelding
					}else {
					$calendar->SetTheUpdateAvailability($uid, $starttimesunday, $endtimesunday, 'zondag');
					}
				}
				
			  }	
		}
?>
<!-- Page Content -->
<div id="page-wrapper">
    <!--------Begin Titel beschikbaarheid---------->
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Beschikbaarheid</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
     <!--------Eind Titel beschikbaarheid---------->
    <div class="row">
        
        <!-------begin titel  beschikbaarheid doorgeven-->
        <div class="container col-sm-6">
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h3>Beschikbaarheid doorgeven</h3>
   </div> <!------Iind titel  beschikbaarheid doorgeven-->

                <div class='panel-body'>

                    <div> Op deze pagina word uw vaste beschikbaarheid doorgegeven. 
                        De beschikbaarheid die u nu doorgeeft geldt voor elke aankomende dag. 
                        Indien u  niet beschikbaar bent kunt u het hier aangeven.<br><br></div>

                        <!-------------------begin beschikbaarheid doorgeven ------------------------------>
                    <table width="100%" id="scrolltable" class="table table-striped table-bordered table-hover">

	
                        <form  method="post">
                                                          <!--------------start foutmelding------------>
						<?php if ($success) { ?>
						<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title">Uw vrij aanvraag is niet verzonden omdat, bij 1 van de dagen de eindtijd eerder begint dan de begintijd.</span>
                        </div>                        <!----------------Eind foutmelding--------------->
						<?php } ?>
                            <tbody>
                                <tr>
                                    <td>Dag</td>
                                    <td>Begintijd</td>
                                    <td>Eindtijd</td>                        </tr>
                                <tr>
                                    <td>

                                        <span class="label label-default">Maandag</span>
                                        <input type="text" width="100%"id="inputUsername" class="form-control hidden" name="maandag" value="Maandag"  disabled >

                                    </td>

                                    <td>
                                        <?php //---------------Maandag---------------------------   ?>
                                        <div class="input-group clockpicker" data-autoclose="true"> 
                                            <input type="time" name="starttimemonday" class="form-control"  placeholder="00:00"  value="<?php $calendar->ShowStartTime($uid, "maandag") ?>" >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time "></span>
                                            </span>
                                        </div>							
									 <td>

                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="time" name="endtimemonday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "maandag") ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "maandag") ?>" >
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
					
                     <div class="col-sm-6 form-group">
                        <button class="btn btn-sm btn-primary btn-right" backgroundcolor="blue" type="submit" name="submit" >Verzenden</button><br />
                     </div>
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
                            <?php $calendar->GetAvailabilitySingle($uid);?> <!----laad alle TR'S en TD'S in de tabel De tabel laad de beschikbaarheid van de individu----->

                        </tbody>
                    </table>                        <!-------------------eind tabelom beschikbaarheid te laten zien ------------------------------>
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