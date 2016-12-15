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
            <div class="row"> <input class="form-control"></div>
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
                       <div class="container col-sm-6">
                        <h1 class="page-header">Uren Plannen</h1>
                       
                         <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Medewerker
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
        <form action="" method="get">
 
      <?php  $calendar->DropDownMenuPlannedHours(); ?>
      
      
      
      </form>
    </ul>
                           
                        
                        <?php  
                     
                         
                            $xxx=1;
                      
                            while ($xxx<($calendar->countstaff())+1){
                            
                     if(isset($_GET[$xxx])){
                         $value=($_GET[$xxx]);
                         $calendar->GetAvailability($value);
                     }
                     $xxx++;}
                            
                            
                        ?>
            </div>
                         
                        
           

                       
                            
    
                                 

</body>
</html>
  </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
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

