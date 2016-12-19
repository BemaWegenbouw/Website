<?php

class Calendar {
//<------------------------------------------------ Beschikbaarheid ------------------------------------------------------------>
    //functie voor tabel beschikbaarheid ophalen (hij maakt de tr en td , de table moet je dan zelf maken)
   public function GetAvailability() {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT first_name, last_name, start_time , end_time, day FROM availability a join staff s on a.uid = s.uid ORDER BY first_name;" ); //Maak de query klaar
 
            
        $sth->execute(); //Voer de query uit

         
         
            while ($row=$sth->fetch()){
                
               
                
        $starting_time=$row["start_time"];//haalt alle starttijden op
        $ending_time=$row["end_time"];//haalt alle eindtijden op
        $day=$row["day"];//haalt alle dagen op
        $persoon = $row["first_name"] ." ". $row["last_name"]; //haalt de persoongegevens op op
   
        //----print de tabel -----
        print "<tr>".
        "<td>".$persoon."</td>".  
        "<td>".$day."</td>".                
        "<td>".$starting_time."</td>".
        "<td>".$ending_time."</td>".

        "</tr>";
        }//ende functie
       
       
      
}
//<----------------functies voor bescbhikbaarheid , maar hier gaat het om een ENKEL geval ---------------------->
 public function GetAvailabilitySingle($uid) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT first_name, last_name, start_time , end_time, day FROM availability a join staff s on a.uid = s.uid WHERE a.uid=:uid ORDER BY FIELD(day, 'maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag', 'zondag');" ); //Maak de query klaar
         $sth->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele      
            
        $sth->execute(); //Voer de query uit

         
         
            while ($row=$sth->fetch()){
                
               
                
        $starting_time=$row["start_time"];//haalt alle startijdgegevens op
        $ending_time=$row["end_time"];//haalt alle eindtijd gegevens op
        $day=$row["day"];//haalt alle dagen op
        $persoon = $row["first_name"] ." ". $row["last_name"]; //haalt de persoon op
   //tabel word geprint
        print "<tr>".
        "<td>".$persoon."</td>".  
        "<td>".$day."</td>".                
        "<td>".$starting_time."</td>".
        "<td>".$ending_time."</td>".

        "</tr>";
        }
       
       
      
}//einde functie



//laat de starttijd zien van de medewerker voor de X gekozen dag
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
        }}//einde functie
        
        
        
//laat de eindtijd zien van de medewerker voor de X gekozen dag
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
        }}//einde functie
    
        
        
        
    //update de starttijd en eindtijd en datum van de gekozen persoon
      public function SetTheUpdateAvailability( $uid, $start_time, $end_time, $day) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("UPDATE availability SET start_time = :start_time, end_time = :end_time WHERE day = :day AND uid = :uid"); //Maak de query klaar
        $sth->bindParam(':start_time', $start_time, PDO::PARAM_STR);//vervang variable
        $sth->bindParam(':end_time', $end_time, PDO::PARAM_STR);//vervang variable
        $sth->bindParam(':day', $day, PDO::PARAM_STR);//vervang variable
        $sth->bindParam(':uid', $uid, PDO::PARAM_STR);//vervang variable
        $sth->execute(); //Voer de query uit//voert de query uit
        return(true);
        
    }//einde functie
    
    
    
 //<<-----------------------------------------------------------Calendar functies ------------------------------------------------------------------->
  //deze functie word gebruikt in de calender en laat gegevens van een ENKELE persoon zien
    public function CalendarView($uid) {
        
    global $pdo;
        $stmt23=$pdo->prepare ("select start_time, end_time, date from work_schedule
                                                        where uid = :uid");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele         
        $stmt23->execute();
        
        while ($row=$stmt23->fetch())
        {$time_table_startingtime=$row["start_time"];//startijd word geselecteerd
           $time_table_endingtime=$row["end_time"];//eindtijd word geselecteerd
        $time_table_date=$row["date"];//datum word geselecteerd
       
        if ($row["start_time"] == '00:00:00' && $row["end_time"] == '00:00:00'){ 
        
			print "{ title:'Vrij',
                 start:'".$time_table_date."',
                 end:'".$time_table_date."' },";//haal de gegevens op van de database en het word in de calender input gedaan
		
		}else{
			
			print "{ title:'Geplande uren',
                 start:'".$time_table_date."T".$time_table_startingtime."',
                 end:'".$time_table_date."T".$time_table_endingtime."' },";//haal de gegevens op van de database en het word in de calender input gedaan
  }              
} }      //einde functie  
          

  //deze functie word gebruikt in de calender en laat gegevens van een MEERDERE personen zien
 public function CalendarAllView() {
        
    global $pdo;
        $stmt23=$pdo->prepare ("SELECT first_name, last_name, start_time, end_time, date FROM work_schedule JOIN staff ON staff.uid = work_schedule.uid");  
        $stmt23->execute();
        
        while ($row=$stmt23->fetch())
        {$time_table_startingtime=$row["start_time"];//haalt de startijd op van elke medewerker
           $time_table_endingtime=$row["end_time"];//haalt de eindtijd op van elke medewerker
        $time_table_date=$row["date"];//haalt de datum op van elke medewerker
       $first_name=$row['first_name'];//haalt de first name op van elke medewerker
        $last_name=$row['last_name'];//haalt de last name op van elke medewerker

        if ($row["start_time"] == '00:00:00' && $row["end_time"] == '00:00:00'){ //indien hij VRIJ is dan:
        
			print "{ title:'"."Vrij: ".$first_name." ".$last_name."',
                 start:'".$time_table_date."',
                 end:'".$time_table_date."' },";//plaatst de database gegevens in de calendar
		
		}else{
			
		print "{ title:'".$first_name." ".$last_name."',
                 start:'".$time_table_date."T".$time_table_startingtime."',
                 end:'".$time_table_date."T".$time_table_endingtime."' },";     //plaatst de database gegevens in de calendar
        }
        }           
        }  //einde functie      
        
        
        
        
        
        //<--------------------------------------------- -------------------- Inplanning ---------------------------------------------------------------------->
        //bij deze functie saga gaat het om de inplannen van mensen
          //insertinplanning voegt de inplanning toe
       public function insertPlanning($uid,$start_time,$end_time,$date){
          global $pdo;
      
          $stmt23=$pdo->prepare ("INSERT INTO work_schedule VALUES(:uid, :start_time, :end_time, :date)");
           $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :uid naar  variabele   
            $stmt23->bindParam(':start_time', $start_time, PDO::PARAM_STR); //Vervang :startijd naar  variabele   
             $stmt23->bindParam(':end_time', $end_time, PDO::PARAM_STR); //Vervang :eindtijd naar  variabele   
              $stmt23->bindParam(':date', $date, PDO::PARAM_STR); //Vervang :datum naar  variabele   
          $stmt23->execute();
        
       }//einde functie
     
     
            
        
       //deze functie laat de tabel zien (tr en td niet de table zelf) en neemt de waardes mee die je nodig hebt om een record te verwijderen
        public function SelectPlannedHours(){
   
        $current_date=  date("Y/m/d");
      
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT first_name, last_name, work_schedule.uid, start_time, end_time, date   FROM staff JOIN work_schedule ON staff.uid = work_schedule.uid WHERE start_time !='00:00' AND end_time !='00:00' AND date >= '$current_date' "); //Maak de query klaar
         $sth->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang variabele
         $sth->bindParam(':currentdate', $current_date, PDO::PARAM_STR); //Vervang variabele
        $sth->execute(); //Voer de query uit
        
        //Maak de CSS voor de tabel actief
        
        $i = 0;
                while($row = $sth->fetch(PDO::FETCH_ASSOC)) { //Begin PDO tabelverwerking
             echo "<tr>"; //Vertel in HTML dat je tabelkopjes begint
        foreach ($row as $key => $value) { //Begin inhoudverwerking
             echo "<td>" . $value . "</td>"; //Print de inhoud
                    
             if ($key == 'date') { //Indien het een datum betreft
                    $date = $value; //Houd deze vast
                } //Einde check gebruiker ID
                     if ($key == 'uid') { //Indien het een gebruiker ID betreft
                    $uid = $value; //Houd deze vast
                } //Einde check gebruiker ID           
                } //Einde inhoudverwerking
    print '<td><a class="btn btn-info" role="button" href="delete_planned_hour.php?date='.$date.'&uid='.$uid.'">Verwijder</a></td>';//hier nemen we de datum en uid mee naar het delete pagina
     echo "</tr>"; //Einde tabel
           
            } //Einde PDO tabelverwerking
        
      
        
    } //Einde van de Staff Lijst functie. ik flikker de link in de dropdown en dan moet er op 1 of andere manier de functie geactiveerd worden.
    
    
//deze functie delete de ingeplande record
  public function DeletePlannedHour($uid, $date){
      global $pdo;
       $stmt23=$pdo->prepare ("DELETE FROM work_schedule WHERE uid = :uid AND date = :date
                                                        ");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele      
              $stmt23->bindParam(':date', $date, PDO::PARAM_STR); //Vervang :username naar $user variabele  
        $stmt23->execute();
      

  }
    //Deze functie laat zien wat er gedelete gaat worden
  public function ShowDeleteData($uid, $date){
      global $pdo;
       $stmt23=$pdo->prepare ("SELECT uid, start_time, end_time, date FROM work_schedule WHERE uid = :uid AND date = :date
                                                        ");
             $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele      
              $stmt23->bindParam(':date', $date, PDO::PARAM_STR); //Vervang :username naar $user variabele  
        $stmt23->execute();
      while ($row=$stmt23->fetch()){ 
          $starting_time=$row['start_time'];
         $end_time=$row['end_time'];
         $date=$row['date'];
        
         print "Start Tijd : ".$starting_time."<br>" . "Eind Tijd : ".$end_time."<br> Datum : " .$date."<br>";      
  }}

        //deze functie laat een dropdown menu zien waar je meerdere mensen kunt selecteren voor wie je wil inplannen
        public function DropDownMenuPlannedHours() {
           
            global $pdo;
        $stmt23=$pdo->prepare ("SELECT first_name, last_name, uid FROM staff");//de query
        
        $stmt23->execute();//voer query uit
          
        while ($row=$stmt23->fetch()){
            
        $first_name=$row['first_name'];//haalt alle voornamen op
        $last_name=$row['last_name'];//haalt alle achternamen op
        $uidd=$row['uid'];//haalt alle uid's op
     
      print "<li class='list-group-item'>".$first_name." ".$last_name." <input type='checkbox' value='".$uidd."' name='".$uidd."'<li>";  //maakt de dropdownmenu 
     } }//einde functie

} //Einde class










$calendar = new Calendar; //Zet class vast in variabele

?>