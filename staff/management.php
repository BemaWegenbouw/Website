<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-management";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

if (isset($_POST['resultradiobox'])) {
    $resultradiobox = $_POST['resultradiobox'];
}

?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Blank</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
		 <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h4>Management informatie</h4>

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
                        <button class="btn btn-sm btn-primary btn-right" backgroundcolor="grey" type="submit" name="Verzenden" value="haal op">
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
    </div><br>
    <!-- /.container-fluid -->		
        </div>
        <!-- /#page-wrapper -->

<?php

include("../inc/parts/staff-footer.php");

?>