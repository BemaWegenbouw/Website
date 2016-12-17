<?php

//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-blank";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");

?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Blank</h1>
                        
                  <?php      $start_time_planning=$_POST['starttimeplanning'];  
                            $end_time_planning=$_POST['endtimeplanning'];  
                            $date_planning=$_POST['dateplanning'];
//                           $test=$_POST['4'];
//                            print $test;
               
                   $inplanninguid=0;
                            while($inplanninguid<100){
                            
                            if(isset($_POST[$inplanninguid])){
                                
                            $calendar->insertPlanning($_POST[$inplanninguid],$start_time_planning,$end_time_planning,$date_planning);
                                
                                
                                
                            }
                                
                            $inplanninguid++;}
                            
                            
                            
//                            function yay(){print "hoi";}
//                function please(){
//                    $x=0;
//                    while ($x<10){
//                        
//                        if($_POST[$x]){
//                        $result= yay();
//                        $result= $calendar->insertPlanning($_POST[$x],)
//                        }
//                        $x++;
//                        
//                    } return $result;
//                    
//                } 
//                
//               $doehet= please();          
//               print $doehet;
               
               
                        // $calendar->insertPlanning($uidd, $start_time_planning, $end_time_planning, $date_planning);
                        
                            
                            
                            ?>
                        
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

?>