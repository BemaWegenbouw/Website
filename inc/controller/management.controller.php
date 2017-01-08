<?php

class Management {

//<-------------------------de <TH>  gedeelte van het tabel die alle medewerkers oproept --------------------------------->    
    public function showpersons($uid){
           global $pdo;
            $stmt23=$pdo->prepare ("SELECT first_name, last_name FROM staff WHERE uid = :uid");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele       
        $stmt23->execute();
        while ($row=$stmt23->fetch())
        {
            $first_name=$row['first_name'];
            $last_name=$row['last_name'];}
       print "<th>$first_name"." "."$last_name</th>"."<th>Totaal ".$first_name." ".$last_name."</th>" ;
    }
    
    
    
    //---------------------------------------------------------------START Gemiddelden ------------------------------------------------------------>
  
    //--------------gemiddelde declaratie per keer ----------------->
      public function averageDayDeclaration($uid) {
                global $pdo;
            $stmt23=$pdo->prepare ("SELECT first_name, last_name, 
                                            ROUND(avg(HOUR(TIMEDIFF(end_time, start_time))))gemiddeld_per_dag 
                                        FROM declaration  JOIN staff ON declaration.uid = staff.uid
                                        WHERE declaration.uid = :uid");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele       
              $stmt23->execute();
     
        while ($row=$stmt23->fetch()){
           
            $avarageday=$row['gemiddeld_per_dag'];
              $first_name=$row['first_name'];
            $last_name=$row['last_name'];
          $persoon = $first_name." ". $last_name;
            print   "<td>$persoon</td>".
                     "<td>".$avarageday."</td>"//hier komt persoon+gemiddeld
                    ;//hier boven persoon+totaal
                    
            
     
} }//einde functie
        
    


//<-------------------------------gemiddelde uren in geplant per keer -------->

      public function averagedayPlanning($uid) {
                global $pdo;
            $stmt23=$pdo->prepare ("SELECT  
                                            ROUND(avg(HOUR(TIMEDIFF(end_time, start_time))))gemiddeld_per_dag
                                             FROM work_schedule 
                                             WHERE uid = :uid");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele       
            $stmt23->execute();
             while ($row=$stmt23->fetch())
        {
          
            $avarageday=$row['gemiddeld_per_dag'];
            print 
                   "<td>".$avarageday."</td>"//hier komt persoon+gemiddeld
                    ;//hier boven persoon+totaal
        } }//--------------einde functie--------
        
        
        
        //<-------------------gemiddelde uren pauze per keer ----------------->
         public function PauseMinutesAverage($uid) {
                global $pdo;
            $stmt23=$pdo->prepare ("SELECT ROUND(avg(break))average_break, 
                                           sum(break)totaal
                                             

FROM declaration
WHERE uid = :uid");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele       
        $stmt23->execute();
        
        while ($row=$stmt23->fetch())
        {
           
            $avarageday=$row['average_break'];
          
            print 
                     
                     "<td>".$avarageday."</td>";//hier komt persoon+gemiddeld
                   
                    
            
     
        }//einde while           
        }//----------einde functie------------
        
        //<---------------gemiddelde uren vrij per keer ------------------->
        public function FreeHoursAverage ($uid){
         
             global $pdo;
            $stmt23=$pdo->prepare ("SELECT ROUND(avg(TIMESTAMPDIFF(hour, start_date, end_date)+HOUR(TIMEDIFF(end_time, start_time))))aantal_vrije_uren
                                    from free
                                    where uid = :uid AND   verify = 'goedgekeurd'");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele       
        $stmt23->execute();
        while ($row=$stmt23->fetch()){
        $gemiddelde_uren = $row['aantal_vrije_uren'];
        print  "<td>".$gemiddelde_uren."</td>"//hier komt persoon+gemiddeld
                    ;//
        
                 
                 
             }//einde while
            
            
            
        }//einde functie
        //<-------------------------------------------------------EINDE GEMIDDELDES--------------------------------------------------------------------->
        
        
        //<-------------------------------------------------------START TIJDSPERIODE: MAAND --------------------------------------------------------------------->
        
        
           //-------------- declaraties in uren deze maand ----------------->
      public function DeclarationsThisMonth($uid) {
          $currentmonth=date('Y-m')."%";      
          global $pdo;
            $stmt23=$pdo->prepare ("SELECT sum(HOUR(TIMEDIFF(end_time, start_time)))totaal, first_name, last_name
                                    FROM declaration JOIN staff ON staff.uid = declaration.uid 
                                    WHERE declaration.uid= :uid and date like :currentmonth");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele      
              $stmt23->bindParam(':currentmonth', $currentmonth, PDO::PARAM_STR); //Vervang :username naar $user variabele    
              $stmt23->execute();
     
        while ($row=$stmt23->fetch()){
          
            $thismonth=$row['totaal'];
              $first_name=$row['first_name'];
            $last_name=$row['last_name'];
          $persoon = $first_name." ". $last_name;
            print   "<td>$persoon</td>".
                     "<td>".$thismonth."</td>"//hier komt persoon+gemiddeld
                    ;//hier boven persoon+totaal    
}//einde while 
}//einde functie
        
        
        //<------------------------------- uren in gepland deze maand -------->

      public function PlanningThisMonth($uid) {
                global $pdo;
                   $currentmonth=date('Y-m')."%";  
            $stmt23=$pdo->prepare ("SELECT sum(HOUR(TIMEDIFF(end_time, start_time)))totaal
                                    FROM work_schedule 
                                    WHERE uid = :uid and date like :currentmonth");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele 
             $stmt23->bindParam(':currentmonth', $currentmonth, PDO::PARAM_STR); //Vervang :username naar $user variabele 
            $stmt23->execute();
             while ($row=$stmt23->fetch())
        {
            
            $avarageday=$row['totaal'];
            print 
                   "<td>".$avarageday."</td>"//hier komt persoon+gemiddeld
                    ;//hier boven persoon+totaal
        } }//-------------------einde functie----------
        
        
        
               //<-------------------uren pauze deze maand ----------------->
         public function PauseThisMonth($uid) {
                global $pdo;
                $currentmonth=date('Y-m')."%";  
            $stmt23=$pdo->prepare ("SELECT  ROUND((sum(break)/60))totaal
                                             FROM declaration
                                             WHERE uid = :uid AND date LIKE :currentmonth");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele   
             $stmt23->bindParam(':currentmonth', $currentmonth, PDO::PARAM_STR); //Vervang :username naar $user variabele 
        $stmt23->execute();
        
        while ($row=$stmt23->fetch())
        {
           
            $thisMonthbreak=$row['totaal'];
          
            print "<td>".$thisMonthbreak."</td>";//hier komt persoon+gemiddeld
        }//einde while           
        }//-------------------------einde functie---------------
        
        
        
        //----------------------------Aantal uren vrij deze maand --------------------------->
             public function FreeHoursThisMonth ($uid){
             $currentmonth=date('Y-m')."%";  
             global $pdo;
            $stmt23=$pdo->prepare ("  SELECT sum(TIMESTAMPDIFF(hour, start_date, end_date)+HOUR(TIMEDIFF(end_time, start_time)))aantal_vrije_uren
                                        FROM free
                                        WHERE uid = :uid AND start_date LIKE :currentmonth");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele 
             $stmt23->bindParam(':currentmonth', $currentmonth, PDO::PARAM_STR); //Vervang :username naar $user variabele 
        $stmt23->execute();
        while ($row=$stmt23->fetch()){
        $gemiddelde_uren = $row['aantal_vrije_uren'];
        print  "<td>".$gemiddelde_uren."</td>"//hier komt persoon+gemiddeld
                    ;//
         
             }//einde while
         
        }//----------------------------einde functie----------------------
        //
        //
   //-------------------------------------------------------------------EINDE TIJDSPERIODE: MAAND------------------------------------------------------->  
        
        
    
  //------------------------------------------------------------------START Deze jaar ----------------------------------------------------------------->   
        
        
        //--------------Declaratie deze jaar ------------------------------->
        
         public function DeclarationsThisYear($uid) {
          $currentyear=date('Y')."%";      
          global $pdo;
            $stmt23=$pdo->prepare ("SELECT sum(HOUR(TIMEDIFF(end_time, start_time)))totaal, first_name, last_name
                                    FROM declaration JOIN staff ON staff.uid = declaration.uid 
                                    WHERE declaration.uid= :uid and date like :currentyear");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele      
              $stmt23->bindParam(':currentyear', $currentyear, PDO::PARAM_STR); //Vervang :username naar $user variabele    
              $stmt23->execute();
     
        while ($row=$stmt23->fetch()){
          
            $thisyear=$row['totaal'];
              $first_name=$row['first_name'];
            $last_name=$row['last_name'];
          $persoon = $first_name." ". $last_name;
            print   "<td>$persoon</td>".
                     "<td>".$thisyear."</td>"//hier komt persoon+gemiddeld
                    ;//hier boven persoon+totaal    
}//einde while 
}//-----------------einde functie---------------


        
              //<------------------------------- uren in gepland deze jaar -------->

      public function PlanningThisyear($uid) {
                global $pdo;
                   $currentyear=date('Y')."%";  
            $stmt23=$pdo->prepare ("SELECT sum(HOUR(TIMEDIFF(end_time, start_time)))totaal
                                    FROM work_schedule 
                                    WHERE uid = :uid and date like :currentyear");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele 
             $stmt23->bindParam(':currentyear', $currentyear, PDO::PARAM_STR); //Vervang :username naar $user variabele 
            $stmt23->execute();
             while ($row=$stmt23->fetch())
        {
            
            $thisyear=$row['totaal'];
            print 
                   "<td>".$thisyear."</td>"//hier komt persoon+gemiddeld
                    ;//hier boven persoon+totaal
        } }//---------------------einde functie--------------->
        
        
        
        
        //--------------------------uren Pauze deze jaar ----------->
         public function PauseThisyear($uid) {
                global $pdo;
                $currentyear=date('Y')."%";  
            $stmt23=$pdo->prepare ("SELECT  ROUND((sum(break)/60))totaal
                                             FROM declaration
                                             WHERE uid = :uid AND date LIKE :currentyear");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele   
             $stmt23->bindParam(':currentyear', $currentyear, PDO::PARAM_STR); //Vervang :username naar $user variabele 
        $stmt23->execute();
        
        while ($row=$stmt23->fetch())
        {
           
            $thisYear=$row['totaal'];
          
            print 
                     
                     "<td>".$thisYear."</td>";//hier komt persoon+gemiddeld
                     
                    
            
     
        }//einde while           
        }//--------------------------------einde functie------------------
        
        

        //----------------------------Aantal uren vrij deze jaar --------------------------->
             public function FreeHoursThisYear ($uid){
             $currentyear=date('Y')."%";  
             global $pdo;
            $stmt23=$pdo->prepare ("  SELECT sum(TIMESTAMPDIFF(hour, start_date, end_date)+HOUR(TIMEDIFF(end_time, start_time)))aantal_vrije_uren
                                        FROM free
                                        WHERE uid = :uid AND start_date LIKE :currentyear");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele 
             $stmt23->bindParam(':currentyear', $currentyear, PDO::PARAM_STR); //Vervang :username naar $user variabele 
        $stmt23->execute();
        while ($row=$stmt23->fetch()){
        $this_year = $row['aantal_vrije_uren'];
        print  "<td>".$this_year."</td>"//hier komt persoon+gemiddeld
                    ;//
        
             }//einde while
       
        }//--------------------------------einde functie       ------------ 
        
        
 //------------------------------------------------------------EINDE TIJDSPERIODE: JAAR --------------------------------------------------->       
        
        
//-------------------------------------------------------------START : TOTAAL ----------------------------------------------------------------------->        
        
           //--------------Declaratie totaal  ------------------------------->
        
         public function DeclarationsTotal($uid) {
             
          global $pdo;
            $stmt23=$pdo->prepare ("SELECT sum(HOUR(TIMEDIFF(end_time, start_time)))totaal, first_name, last_name
                                    FROM declaration JOIN staff ON staff.uid = declaration.uid 
                                    WHERE declaration.uid= :uid");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele      
              $stmt23->execute();
     
        while ($row=$stmt23->fetch()){
          
            $total=$row['totaal'];
              $first_name=$row['first_name'];
            $last_name=$row['last_name'];
          $persoon = $first_name." ". $last_name;
            print   "<td>$persoon</td>".
                     "<td>".$total."</td>"//hier komt persoon+gemiddeld
                    ;//hier boven persoon+totaal    
}//einde while 
}//--------------------------einde functie------------------
      
        
                    //<------------------------------- uren in gepland deze jaar -------->

      public function PlanningTotal($uid) {
                global $pdo;                 
            $stmt23=$pdo->prepare ("SELECT sum(HOUR(TIMEDIFF(end_time, start_time)))totaal
                                    FROM work_schedule 
                                    WHERE uid = :uid");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele 
            $stmt23->execute();
             while ($row=$stmt23->fetch())
        {
            
            $total=$row['totaal'];
            print 
                   "<td>".$total."</td>"//hier komt persoon+gemiddeld
                    ;//hier boven persoon+totaal
        } }//einde functie
        
        
      //--------------------------uren Pauze deze jaar ----------->
         public function PauseTotal($uid) {
                global $pdo;        
            $stmt23=$pdo->prepare ("SELECT  ROUND((sum(break)/60))totaal
                                             FROM declaration
                                             WHERE uid = :uid");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele   
        $stmt23->execute();
        
        while ($row=$stmt23->fetch())
        {
           
            $total=$row['totaal'];
          
            print 
                     
                     "<td>".$total."</td>";//hier komt persoon+gemiddeld
                     
                    
            
     
        }//einde while           
        }//--------------------------------einde functie------------------        
        
               //----------------------------Aantal uren vrij totaal --------------------------->
             public function FreeHoursTotal ($uid){
             global $pdo;
            $stmt23=$pdo->prepare ("  SELECT sum(TIMESTAMPDIFF(hour, start_date, end_date)+HOUR(TIMEDIFF(end_time, start_time)))aantal_vrije_uren
                                        FROM free
                                        WHERE uid = :uid");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele 

        $stmt23->execute();
        while ($row=$stmt23->fetch()){
        $total = $row['aantal_vrije_uren'];
        print  "<td>".$total."</td>"//hier komt persoon+gemiddeld
                    ;//
        
             }//einde while
       
        }//--------------------------------einde functie ------------ 
        //-----------------------------------------------------EINDE TOTAAL ------------------------------------------------->
        
        
        
} //Einde class

$management = new Management; //Zet class vast in variabele

?>