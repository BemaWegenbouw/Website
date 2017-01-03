<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-dashboard";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

 $uid = $_SESSION["uid"];
  
 $sending = 0;
  if(isset($_POST['free_submit']) && !empty($_POST['free_submit'])) {
       
		$userid = $uid;
		$start_date = $_POST["start_date"];
		$end_date = $_POST["end_date"];
		$start = $_POST['start_time'];
		$start_time = "$start:00";
		$end = $_POST['end_time'];
		$end_time = "$end:00";
		$comment = $_POST["comment"];
	
		$free->insert($userid, $start_date,$end_date,$start_time,$end_time,$comment); // insert the free form into the FREE table
		$compleet = true;
	if ($compleet){
	$sending += 1;
	}else{
		$sending +=2;
	}
}

if (isset($_POST['resultradiobox'])) {
    $resultradiobox = $_POST['resultradiobox'];
}

?>

<!--start gebruiker dashboard-->
   <?php if ($user->Get($_SESSION["uid"], "rank_id") < $permission->Get("menu_admin")) { ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-apple fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                    <h3>Beschikbaarheid<br>doorgeven</h3>
                                </div>
                            </div>
                        </div>
                        <a href="availability.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                    <h3>Uren<br>declareren</h3>
                                </div>
                            </div>
                        </div>
                        <a href="declaration.php">
                            <div class="panel-footer">
                                <span class="pull-left">Zie Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-lock fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   
                                    <h3>Wijzig<br>wachtwoord</h3>
                                </div>
                            </div>
                        </div>
                        <a href="passwordchange.php">
                            <div class="panel-footer">
                                <span class="pull-left">Zie Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-android fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                    <h3>Gebruikers-<br>profiel</h3>
                                </div>
                            </div>
                        </div>
                        <a href="gebruikersprofiel.php">
                            <div class="panel-footer">
                                <span class="pull-left">Zie Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>		
            </div>
			<!-- start free && calender -->
			<div class="row">
				<div class="col-sm-4">
				<form method="POST">
						
						<div class="col-sm-12">
						<h1>Vrij vragen</h1>
						</div>
						<div class="col-sm-12 form-group">
                            Van:
                            <div class="input-group date datepicker" data-provide="datepicker">
                                <input type="date" name="start_date"class="form-control" placeholder="yyyy-mm-dd" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                        </div>
						<div class="col-sm-12 form-group">
                            Tot:
                            <div class="input-group date datepicker" data-provide="datepicker">
                                <input type="date" name="end_date"class="form-control" placeholder="yyyy-mm-dd" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            Begintijd:
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="start_time" class="form-control" placeholder="00:00" value="" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            Eindtijd:
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="end_time"class="form-control" placeholder="00:00" value="" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
							
                        </div>
						<div class="col-sm-12 form-group">
                            Reden:
                            <textarea class="form-control" id="comment" name="comment" placeholder="Reden"  value="" rows="10" requierd></textarea>
                        </div>
						
						
                        <div class="col-sm-6 form-group">
                        <button class="btn btn-lg btn-primary btn-right" backgroundcolor="blue" type="submit" name="free_submit" value="verzend">Verzenden</button><br />
                        </div>
						
						<?php if ($sending == 1) { ?>
						<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-success alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_error1_5")); ?></span>
                        </div>
						<?php } ?>
						<?php if ($sending == 2) { ?>
						<div data-notify="container" class="col-xs-11 col-sm-12 alert alert-{0}alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" data-dismiss="alert"><span data-notify="icon" class="glyphicon glyphicon-remove"></span></button>
                                        <span data-notify="icon" class="glyphicon glyphicon-exclamation-sign"></span>
                                        <span data-notify="title"><?php echo(lang("contact_column2_error1")); ?></span>
                                        <span data-notify="message"><br><?php echo(lang("contact_column2_error1_5")); ?></span>
                        </div>
						<?php } ?>
									
                        </form>
                        </div>
                        <!-- end free -->  
                        
                        <!-- start calender -->  
                        <div class="col-sm-8">
                            <h1>Kalender</h1>
                         <div class="container-fluid" style="position: relative;">
                        <div id='calendar'  ></div><br />
                        <!--                roept de calender aan-->
                         </div>
                        </div>
			<!-- end calender -->
                        
			
         </div>
        
   <?php } ?>
   <!--eind gebruiker dashboard-->
   <!--start admin dashboard-->
   <?php if ($user->Get($_SESSION["uid"], "rank_id") >= $permission->Get("menu_admin")) { ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
		<div class="container-fluid">	
            <!-- /.row -->
            <div class="row">               
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                    <h3>Gedeclareerde<br>uren</h3>
                                </div>
                            </div>
                        </div>
                        <a href="admin_declaration.php">
                            <div class="panel-footer">
                                <span class="pull-left">Zie Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-lock fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   
                                    <h3>Vrij<br>aanvragingen</h3>
                                </div>
                            </div>
                        </div>
                        <a href="freeapplications.php">
                            <div class="panel-footer">
                                <span class="pull-left">Zie Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-apple fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                    <h3>Gebruikers<br>toevoegen</h3>
                                </div>
                            </div>
                        </div>
                        <a href="addstaff.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-android fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                    <h3>Gebruikers-<br>gegevens</h3>
                                </div>
                            </div>
                        </div>
                        <a href="liststaff.php">
                            <div class="panel-footer">
                                <span class="pull-left">Zie Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>		
            </div>
		</div>
		 <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Management informatie</h1>

                <!------------------- Dropdownmenu voor medewerkers  ------------------>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <h3>Invullen managementinfo</h3>
                    </div>

                    <div class='panel-body'><p>Hieronder kunt u aangeven over welke(meerdere) medewerkers u gegevens wil inzien. Daarna kiest u voor een tijdsperiode of gemiddelde, en drukt op verzenden. Onderaande pagina zal een tabel verschijnen met de opgevraagde informatie</p>
                        <div class="row">
                            <div class="col-sm-3">
                                <form method="post"> <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Medewerker
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">

                                            <?php $calendar->DropDownMenuPlannedHours(); //de waardes worden meegenomenin de dropdownmenu , met de namen van de medwerkers ?>

                                        </ul></div><!--EINDE dropdownmenu medewerkers--->
                            </div>
                            <!------------------- Dropdownmenu voor tijdsperiode  ------------------>
                            <div class="col-sm-3">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Per Tijdsperiode
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">

                                        <li class="list-group-item">    Gemiddelden <input type="radio" name="resultradiobox" value="gemiddeldperdag"></li> 
                                        <li class="list-group-item">  afgelopen  maand    <input type="radio" name="resultradiobox" value="afgelopenmaand"></li> 
                                        <li class="list-group-item"> afgelopen jaar     <input type="radio" name="resultradiobox" value="afgelopenjaar"></li> 
                                        <li class="list-group-item">    Totaal <input type="radio" name="resultradiobox" value="totaleaantal"></li>                        
                                    </ul></div>  
                            </div> </div><br>
                        <button class="btn btn-submit" type="submit" name="Verzenden" value="haal op">
                            Verzenden</button>

                        </form>


                    </div>
                </div>
                <!-------------------EINDE  Dropdownmenu voor tijdsperiode  ------------------>


                <?php if (isset($_POST['resultradiobox'])) { //als de "resultradiobox (de dropdownmenu met de tijdsperioden) is aangeklikt:"?>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                            <h3>Informatietabel</h3>
                        </div>
                        <div class='panel-body'>

                            <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                                <thead>
                                    <tr>
                                        <th>naam</th>
                                        <?php
                                        if (isset($_POST['resultradiobox'])) {

                                            if (($_POST['resultradiobox']) == "gemiddeldperdag") {     //als de radiobox gemiddeld per dag is , print hij de '<TH>'s van de gemiddeldes:
                                                print"    <th> Gemiddelde aantal uren declaratie per keer</th>
                                  <th>Gemiddelde uren  ingepland per keer</th>
                                  <th>gemmiddelde minuten pauze per keer</th> 
                                   <th>Gemiddelde uren vrij vragen per keer</th>
                             </tr>";
                                            } else if (($_POST['resultradiobox']) == "afgelopenmaand") { //als de radiobox afgelopen maand is , print hij de '<TH>'s betreft afgelopen maand:
                                                print"    <th>uren gedeclareerd deze maand</th>
                                  <th>uren ingepland deze maand</th>
                                  <th>aantal uren pauze deze maand</th> 
                                   <th>aantal uren vrij deze maand</th>
                             </tr>";
                                            } else if (($_POST['resultradiobox']) == "afgelopenjaar") { //als de radiobox afgelopen jaar is , print hij de '<TH>'s betreft afgelopen jaar :
                                                print"    <th>uren gedeclareerd deze jaar</th>
                                  <th>uren ingepland deze jaar</th>
                                  <th>aantal uren pauze deze jaar</th> 
                                   <th>aantal uren vrij deze jaar</th>
                             </tr>";
                                            } else if (($_POST['resultradiobox']) == "totaleaantal") {//als de radiobox totaal  is , print hij de '<TH>'s betreft de totaal :
                                                print"    <th>uren gedeclareerd totaal</th>
                                  <th>uren ingepland totaal</th>
                                  <th>aantal uren pauze totaal</th> 
                                   <th>aantal uren vrij totaal</th>
                                  
                             </tr>";
                                            }
                                        }
                                        ?>



                                </thead>
                                <tbody>
                                    <?php
                                    $whatuidaverage = 0; //de uid's van de gemiddelde
                                    $whatuidmonth = 0; //de uid's van de maanden
                                    $whatuidyear = 0; //de uid's van de jaren
                                    $whatuidtotal = 0; //de uid's van het totaal
                                    if (isset($_POST['resultradiobox'])) {     //als de dropdownmenu met de tijdsperioden etc is aangeklikt dan : 
                                        if (($_POST['resultradiobox']) == "gemiddeldperdag") {  //als de dropdown met de tijdsperioden gemiddeld is :                   
                                            while ($whatuidaverage < 100) {//kijkt alle medewerkers na
                                                if (isset($_POST[$whatuidaverage])) { //als de medewerker geselecteerd is
                                                    print "<tr>";
                                                    $management->averageDayDeclaration($_POST[$whatuidaverage]);   //print de <td>'s
                                                    $management->averagedayPlanning($_POST[$whatuidaverage]);  //print de <td>'s
                                                    $management->PauseMinutesAverage($_POST[$whatuidaverage]); //print de <td>'s
                                                    $management->FreeHoursAverage($_POST[$whatuidaverage]); //print de <td>'s
                                                    print "</tr>";
                                                }

                                                $whatuidaverage++;
                                            }
                                        }//einde if gemiddeldes
                                        else if (($_POST['resultradiobox']) == "afgelopenmaand") {  //als de dropdown met de tijdsperioden per maand is :                 
                                            while ($whatuidmonth < 100) {//kijkt alle medewerkers na
                                                if (isset($_POST[$whatuidmonth])) {//als de medewerker geselecteerd is
                                                    print "<tr>";
                                                    $management->DeclarationsThisMonth($_POST[$whatuidmonth]);  //print <td>'s
                                                    $management->PlanningThisMonth($_POST[$whatuidmonth]);  //print <td>'s
                                                    $management->PauseThisMonth($_POST[$whatuidmonth]);     //print <td>'s
                                                    $management->FreeHoursThisMonth($_POST[$whatuidmonth]);     //print <td>'s
                                                    print "</tr>";
                                                }

                                                $whatuidmonth++;
                                            }
                                        } else if (($_POST['resultradiobox']) == "afgelopenjaar") {     //als de dropdown met de tijdsperioden per jaar is :                  
                                            while ($whatuidyear < 100) {//kijkt alle medewerkers na
                                                if (isset($_POST[$whatuidyear])) {//als de medewerker geselecteerd is
                                                    print "<tr>";
                                                    $management->DeclarationsThisYear($_POST[$whatuidyear]);   //print <td>'s
                                                    $management->PlanningThisYear($_POST[$whatuidyear]);  //print <td>'s 
                                                    $management->PauseThisYear($_POST[$whatuidyear]); //print <td>'s
                                                    $management->FreeHoursThisyear($_POST[$whatuidyear]); //print <td>'s
                                                    print "</tr>";
                                                }

                                                $whatuidyear++;
                                            }
                                        } else if (($_POST['resultradiobox']) == "totaleaantal") {   //als de dropdown met de tijdsperioden per jaar is :                        
                                            while ($whatuidtotal < 100) {//kijkt alle medewerkers na
                                                if (isset($_POST[$whatuidtotal])) {//als de medewerker geselecteerd is
                                                    print "<tr>";
                                                    $management->DeclarationsTotal($_POST[$whatuidtotal]);   //print <td>'s
                                                    $management->PlanningTotal($_POST[$whatuidtotal]);  //print <td>'s 
                                                    $management->PauseTotal($_POST[$whatuidtotal]); //print <td>'s
                                                    $management->FreeHourstotal($_POST[$whatuidtotal]); //print <td>'s
                                                    print "</tr>";
                                                }

                                                $whatuidtotal++;
                                            }
                                        }
                                    }//einde isset$_post['resultradiobox'] 
                                    ?>

                                </tbody>
                            </table>

                        </div>
                    </div>



                    <?php
                } else {
                    print "Je moet een tijdsperiode invoeren!";
                }
                ?>








            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
			
                        
			
         </div>
        
   <?php } ?>
   <!--einde admin dashboard-->
	
		</div>
        <!-- /#page-wrapper -->
<?php
include("../inc/parts/staff-footer.php");
?>

