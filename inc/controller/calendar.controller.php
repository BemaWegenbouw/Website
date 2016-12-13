<?php

class Calendar {

   public function GetAvailability($uid) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT start_time , end_time, day FROM availability where uid=:uid ORDER BY FIELD(day, 'maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag', 'zondag');" ); //Maak de query klaar
 
             $sth->bindParam(':uid', $uid, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
 $tdcolor1="#f5f5f0";//
 $tdcolor2="#d0e1e1
";//
         print "<table width='100%'>"."<th style= 'font-size:25px'>Dag</th> <th style= 'font-size:25px'>Begin Tijd</th> <th style= 'font-size:25px'>Eind Tijd</th> ";
         
            while ($row=$sth->fetch()){
                
                $tdcolor3=$tdcolor1;
                $tdcolor1=$tdcolor2;
                $tdcolor2=$tdcolor3;
                
        $starting_time=$row["start_time"];
        $ending_time=$row["end_time"];
        $day=$row["day"];
        
   
        print "<tr>".
        "<td style='background:$tdcolor3; font-size:15px'>".$day."</td>".                
        "<td style='background:$tdcolor3; font-size:15px'>".$starting_time."</td>".
        "<td style='background:$tdcolor3; font-size:15px'>".$ending_time."</td>".

        "</tr>";
        }
       
           
         print "</table>";
      
   }
    
  
    
    
    
    
    
    
    
    
    
    
    
     public function InsertAvailability($uid, $starttime, $endtime , $date) {
        global $pdo;
       $query = "INSERT INTO availability (uid, start_time, end_time, date) VALUES (:uid, :starttime, :endtime, :date)";
        
        $stmt = $pdo->prepare($query); //Bereid de query voor
        
        //Vervang :ip door het IP, SQL-injectie veilig.
        $stmt->bindParam(':uid', $uid, PDO::PARAM_STR);
        $stmt->bindParam(':starttime',$starttime , PDO::PARAM_STR);
        //Stel :action in
        $stmt->bindParam(':endtime', $endtime, PDO::PARAM_STR);
         $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        //Voer de query uit
        $stmt->execute();
       
    }
    
        public function checkDuty_ID($duty_id) {
     
        global $pdo; //Zoek buiten de scope van de functie en class
        
        
        $sth = $pdo->prepare("SELECT duty_id  FROM availability WHERE duty_id = :duty_id"); //Maak query op
         $sth->bindParam(':duty_id', $duty_id, PDO::PARAM_STR); //Vervang variabele
        $sth->execute(); //Uitvoeren
        $result = $sth->fetch(PDO::FETCH_ASSOC); //Sla resultaat op in variabele
        
        if(isset($result) && !empty($result)) { //Check of er resultaat is
            //Gebruiker in combinatie met de dienst bestaat.
            return true; //Retourneer "goed"
        } else {
            //Gebruiker bestaat NIET
            return false; //Retourneer "fout"
        }
        
    }
    
    
     public function GetDbValue($duty_id, $value) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT * FROM availability WHERE duty_id = :duty_id"); //Maak de query klaar
        $sth->bindParam(':duty_id', $duty_id, PDO::PARAM_STR); //Vervang :username naar $user variabele
        $sth->execute(); //Voer de query uit
        $result = $sth->fetch(PDO::FETCH_ASSOC); //Sla het resultaat op in een variabele
        return $result[$value]; //Geef resultaat terug
   
        
    }
    
      public function DeleteDutyID() {
        
    global $pdo;      
    $sql = "DELETE FROM availability WHERE duty_id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($_GET["duty_id"]));
        
    }
    
    
    public function ShowAvailability($duty_id) {
         global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT start_time, end_time, date FROM availability WHERE duty_id = :duty_id"); //Maak de query klaar
        $sth->bindParam(':duty_id', $duty_id, PDO::PARAM_STR); //Vervang :username naar $user variabele
        $sth->execute(); //Voer de query uit
      
      
        
        while ($row=$sth->fetch())
        {$starting_time=$row["start_time"];
        $ending_time=$row["end_time"];
        $date=$row["date"];
        
        print (  $starting_time." starting time". "<br>");
        print ($ending_time." ending time". "<br>");
        print ($date." date". "<br>");
       
        }
       
        
    }
    public function CalendarView($uid) {
        
    global $pdo;
        $stmt23=$pdo->prepare ("select start_time, end_time, date from work_schedule
                                                        where uid = :uid");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele         
        $stmt23->execute();
        
        while ($row=$stmt23->fetch())
        {$time_table_startingtime=$row["start_time"];
           $time_table_endingtime=$row["end_time"];
        $time_table_date=$row["date"];
       
        
        print "{ title:'Geplande uren',
                 start:'".$time_table_date."T".$time_table_startingtime."',
                 end:'".$time_table_date."T".$time_table_endingtime."' },"
               
                
                
                
                
                
        
                
        ;}
                
        }        
          
    


        public function ShowStartTime($uid, $day) {
                global $pdo;
            $stmt23=$pdo->prepare ("select start_time from availability
                                                        where uid = :uid AND day = :day");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele      
              $stmt23->bindParam(':day', $day, PDO::PARAM_STR); //Vervang :username naar $user variabele  
        $stmt23->execute();
        
        while ($row=$stmt23->fetch())
        {$startingtimeMonday=$row["start_time"];
            
        print $startingtimeMonday;
        }}

 public function ShowEndTime($uid, $day) {
               global $pdo;
            $stmt23=$pdo->prepare ("select end_time from availability
                                                        where uid = :uid AND day = :day");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele      
              $stmt23->bindParam(':day', $day, PDO::PARAM_STR); //Vervang :username naar $user variabele  
        $stmt23->execute();
        
        while ($row=$stmt23->fetch())
        {$endingtimeMonday=$row["end_time"];
            
        print $endingtimeMonday;
        }}



   public function SetTheUpdateAvailability( $uid, $start_time, $end_time, $day) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("UPDATE availability SET start_time = :start_time, end_time = :end_time WHERE day = :day AND uid = :uid"); //Maak de query klaar
        $sth->bindParam(':start_time', $start_time, PDO::PARAM_STR);
        $sth->bindParam(':end_time', $end_time, PDO::PARAM_STR);
        $sth->bindParam(':day', $day, PDO::PARAM_STR);
        $sth->bindParam(':uid', $uid, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
        return(true);
        
    }
        
      
    
} //Einde class










$calendar = new Calendar; //Zet class vast in variabele

?>