<?php

class Calendar {

   public function GetAvailability($uid) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT start_time , end_time, date, duty_id FROM availability where uid=:uid" ); //Maak de query klaar
 
             $sth->bindParam(':uid', $uid, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
        $result = $sth->fetch(PDO::FETCH_ASSOC); //Sla het resultaat op in een variabele
        
        $i = 0;
        
        echo "<table style=' border: 1px solid #ccccff;
       color:black; background:#f5f5ef; width:80% '>";
        
        print "<tr><th>starting time</th> <th>ending time </th> <th>date </th> <th>AvailabilityNr</th> <th>Adjust </th><th>Delete availability</th> </tr>";
        
        while($row = $sth->fetch(PDO::FETCH_ASSOC)) { //Begin PDO tabelverwerking
            
            if ($i == 0) {
            $i++;
         
                
          
            
            } //Einde kopjesprojectie
        
        echo " <tr> "; //Print de openingstag voor tabelinhoud
        
        foreach ($row as $key => $value) { //Begin inhoudverwerking
            
                    echo " <td> " . $value .   " </td> "; //Print de inhoud
     
      if ($key == 'duty_id') { //Indien het een gebruiker ID betreft
                    $duty_id = $value; //Houd deze vast
                      print "<td><a href='edit_availability.php?duty_id=$duty_id'>Adjust</a></td>";
                       print "<td><a href='delete_availability.php?duty_id=$duty_id'>Delete</a></td>";
                } //Einde check gebruiker ID
        } //Einde inhoudverwerking
      
        echo " </tr> "; //Einde tabel
           
        } //Einde PDO tabelverwerking
         //Plak overal bewerkknop achter
        echo "</table>"; //Einde van de tabel
       
    } //Einde functie GetAvailability
    
     public function SetTheUpdateAvailability($duty_id, $original, $replacement) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("UPDATE availability SET $original = :replacement WHERE duty_id = :duty_id"); //Maak de query klaar
        $sth->bindParam(':replacement', $replacement, PDO::PARAM_STR);
        $sth->bindParam(':duty_id', $duty_id, PDO::PARAM_STR); //Vervang :username naar $user variabele
        $sth->execute(); //Voer de query uit
        return(true);
        
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
        $stmt23=$pdo->prepare ("select start_time, end_time, date from availability
                                                        where uid = :uid");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele         
        $stmt23->execute();
        
        while ($row=$stmt23->fetch())
        {$time_table_startingtime=$row["start_time"];
           $time_table_endingtime=$row["end_time"];
        $time_table_date=$row["date"];
       
        
        print "{ title:'Available',
                 start:'".$time_table_date."T".$time_table_startingtime."',
                 end:'".$time_table_date."T".$time_table_endingtime."' },"
               
                
                
                
                
                
        
                
        ;}
                
        }        
          
            
      
    
} //Einde class










$calendar = new Calendar; //Zet class vast in variabele

?>