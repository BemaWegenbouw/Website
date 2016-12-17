<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-planning";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

 $uid = $_SESSION["uid"];

//?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                            <div class="col-sm-6">
                            <h1> Hier komt de calender</h1>
                         <div class="container-fluid" style="position: relative;">
                        <div id="calendar"  ></div>
                        <br />
                        <!--                roept de calender aan-->
                         </div>
                            
                            </div>
            <div class="container-fluid">
                <div class="row">
                       <div class="col-sm-6">
                        
                        
             
            
                        
                    <div class='panel panel-default'>
		<div class='panel-heading'>
		<h3>Beschikbaarheid</h3>
		</div>
		
		<div class='panel-body'>
		<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
		<thead>
			<tr>
                                <th>Persoon</th>
				<th>Dag</th>
				<th>Begin tijd/th>
				<th>Eind Tijd</th>
						
			</tr>
        </thead>
		<tbody>
		<?php $calendar->GetAvailability();?>
		
		</tbody>
		</table>
		
		</div>
		</div>         
                           
                      <div class='panel panel-default'>
		<div class='panel-heading'>
		<h3>Ingeplande Medewerkers</h3>
		</div>
		
		<div class='panel-body'>
		<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
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
		  <?php $calendar->SelectPlannedHours();  ?>
		
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
        <!-- /#page-wrapper -->
        <div class="row">

            <div class="col-sm-4">
                <form action="planning-verwerk.php" method="post">
                                            <div class="col-sm-2" ><div class="dropup">
   <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Medewerker
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
        
        
       <?php $calendar->DropDownMenuPlannedHours(); ?>
        
        
    </ul></div></div>
                <div class="input-group date datepicker" data-provide="datepicker" >
                                <input type="date" name="dateplanning"class="form-control" placeholder="yyyy-mm-dd" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>  </div></div>

                            
                            
                            <label>Start Tijd</label>  <input type="time" class="form_control" name="starttimeplanning" >
                            <label>Eind Tijd</label>  <input type="time" class="form_control" name="endtimeplanning" >
                            <label></label>  <input type="submit" class="form_control" >
                                              <div class="dropdown">
 
                        </form>
                       
                            </div> 
                             </div>
    </div>
</div>
    <!-- /#wrapper -->
    <br><br><br><br><br><br><br><br><br><br><br><br>
    
<?php

include("../inc/parts/staff-footer.php");

