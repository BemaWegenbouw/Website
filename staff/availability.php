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
           
                <h1 class="page-header">Beschikbaarheid doorgeven</h1>
                <div class="row">

                 <div class="container col-sm-8">
                                                 <div> Op deze pagina word uw vaste geschikbaarheid doorgegeven. 
     De beschikbaarheid die u nu doorgeeft word geldt voor elke week. 
     Indien u eenmalig niet beschikbaar bent voor een bepaalde tijd en niet uw vaste beschikbaarheid wil aanpassen, hoort u dit aan te vragen met de  vrijvraag formulier.<br><br><br><br></div>
                 <div class="col-sm-4 form-group">
                            

                     <form action="update_availability.php" method="post">
                            <div >
                <input type="text" id="inputUsername" class="form-control" value="Maandag" disabled >
                                
                            </div>							
                        </div>
                        <div class="col-sm-3 form-group">
                                        <?php //---------------Maandag---------------------------  ?>
                            <div class="input-group clockpicker" data-autoclose="true"> 
                                <input type="text" name="starttimemonday"class="form-control"  placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "maandag")  ?>" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time "></span>
                                </span>
                            </div>							
                        </div>
                         <div class="col-sm-3 form-group">
                            
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="endtimemonday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "maandag")  ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "maandag")  ?>" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time "></span>
                                </span>
                            </div>							
                        </div>
                 </div>
                </div>
            <div class="row"> 
            <div class="container col-sm-8">

                        <div class="col-sm-4 form-group">
                            
                            <?php //--------------------------------------------------Dinsdag------------------------------------------------------------  ?>
                             <input type="text" id="inputUsername" class="form-control" value="Dinsdag" disabled >							
                        </div>
                        <div class="col-sm-3 form-group">
                             <?php //---------------starttijd dinsdag---------------------------  ?>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="time" name="starttimetuesday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "dinsdag")  ?>" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time "></span>
                                </span>
                            </div>							
                        </div>
                         <div class="col-sm-3 form-group">
                             <?php //---------------Eind tijd dinsdag---------------------------  ?>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="time" name="endtimetuesday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "dinsdag")  ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "dinsdag")  ?>" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time "></span>
                                </span>
                            </div>							
                        </div>
                        <div class="col-sm-4 form-group">
                             <?php //--------------------------------------------------Woensdag------------------------------------------------------------  ?>
                             <input type="text" id="inputUsername" class="form-control" value="Woensdag" disabled >						
                        </div>
                        <div class="col-sm-3 form-group">
                                                    <?php //---------------starttijd Woensdag---------------------------  ?>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="time" name="starttimewednesday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "woensdag")  ?>" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time "></span>
                                </span>
                            </div>							
                        </div>
                         <div class="col-sm-3 form-group">
                                                     <?php //---------------Eindtijd Woensdag---------------------------  ?>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="time" name="endtimewednesday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "woensdag")  ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "woensdag")  ?>" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time "></span>
                                </span>
                            </div>							
                        </div>
                        <div class="col-sm-4 form-group">
                             <?php //--------------------------------------------------Donderdag------------------------------------------------------------  ?>
                             <input type="text" id="inputUsername" class="form-control" value="Donderdag" disabled >						
                        </div>
                        <div class="col-sm-3 form-group">
                             <?php //---------------starttijd Donderdag---------------------------  ?>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="time" name="starttimethursday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "donderdag")  ?>" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time "></span>
                                </span>
                            </div>							
                        </div>
                         <div class="col-sm-3 form-group">
                                   <?php //---------------Eindtijd Donderdag---------------------------  ?>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="time" name="endtimethursday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "donderdag")  ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "donderdag")  ?>" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time "></span>
                                </span>
                            </div>							
                        </div>
                        <div class="col-sm-4 form-group">
                                <?php //--------------------------------------------------Vrijdag------------------------------------------------------------  ?>
                            <input type="text" id="inputUsername" class="form-control" value="Vrijdag" disabled >						
                        </div>
                        <div class="col-sm-3 form-group">
                                    <?php //---------------starttijd Vrijdag---------------------------  ?>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="time" name="starttimefriday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "vrijdag")  ?>" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time "></span>
                                </span>
                            </div>							
                        </div>
                         <div class="col-sm-3 form-group">
                                 <?php //---------------Eindtijd Vrijdag---------------------------  ?>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="time" name="endtimefriday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "vrijdag")  ?>" placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "vrijdag")  ?>" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time "></span>
                                </span>
                            </div>							
                        </div>
                        <div class="col-sm-4 form-group">
                             <?php //--------------------------------------------------Zaterdag------------------------------------------------------------  ?>
                            <input type="text" id="inputUsername" class="form-control" value="Zaterdag" disabled >						
                        </div>
                        <div class="col-sm-3 form-group">
                              <?php //---------------Start Zaterdag---------------------------  ?>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="time" name="starttimesaturday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "zaterdag")  ?>" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time "></span>
                                </span>
                            </div>							
                        </div>
                         <div class="col-sm-3 form-group">
                              <?php //---------------Eindtijd Zaterdag---------------------------  ?>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="time" name="endtimesaturday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "zaterdag")  ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "zaterdag")  ?>" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time "></span>
                                </span>
                            </div>							
                        </div>
                        <div class="col-sm-4 form-group">
                                        <?php //--------------------------------------------------Zondag------------------------------------------------------------  ?>
                             <input type="text" id="inputUsername" class="form-control" value="Zondag" disabled >						
                        </div>
                        <div class="col-sm-3 form-group">
                                      <?php //---------------Start Zondag---------------------------  ?>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="time" name="starttimesunday"class="form-control" placeholder="00:00" value="<?php $calendar->ShowStartTime($uid, "zondag")  ?>" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time "></span>
                                </span>
                            </div>							
                        </div>
                         <div class="col-sm-3 form-group">
                                            <?php //---------------Eindtijd Zondag---------------------------  ?>        
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="time" name="endtimesunday"class="form-control" min="<?php $calendar->ShowStartTime($uid, "zondag")  ?>"placeholder="00:00" value="<?php $calendar->ShowEndTime($uid, "zondag")  ?>" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time "></span>
                                </span>
                            </div>							
                        </div>
                			
                        </div>
              		
                    </div>
                <br>
                
                <input type='submit' name='knopavailability'></button>
           
                        </form>
                     <br>
                     <br>
                     <br>
                     <h1>Huidige beschikbaarheid</h1>
                     <?php $calendar->GetAvailability($uid); ?>
                     
                     <br>
                     <br>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php

include("../inc/parts/staff-footer.php");


?>