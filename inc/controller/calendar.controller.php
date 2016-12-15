<?php

class Calendar {

   public function GetAvailability($uid) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT first_name, last_name, start_time , end_time, day FROM availability a join staff s on a.uid = s.uid where a.uid=:uid ORDER BY first_name;" ); //Maak de query klaar
 
             $sth->bindParam(':uid', $uid, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit

         
         
            while ($row=$sth->fetch()){
                
               
                
        $starting_time=$row["start_time"];
        $ending_time=$row["end_time"];
        $day=$row["day"];
        $persoon = $row["first_name"] ." ". $row["last_name"]; 
   
        print "<tr>".
        "<td>".$persoon."</td>".  
        "<td>".$day."</td>".                
        "<td>".$starting_time."</td>".
        "<td>".$ending_time."</td>".

        "</tr>";
        }
       
       
      
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
       
        if ($row["start_time"] == '00:00:00' && $row["end_time"] == '00:00:00'){ 
        
			print "{ title:'Vrij',
                 start:'".$time_table_date."',
                 end:'".$time_table_date."' },";
		
		}else{
			
			print "{ title:'Geplande uren',
                 start:'".$time_table_date."T".$time_table_startingtime."',
                 end:'".$time_table_date."T".$time_table_endingtime."' },";
               
        }       
               
                
                
                
        
                
        }
                
        }        
          
         
        
        
        public function DropDownMenuPlannedHours() {
           
            global $pdo;
        $stmt23=$pdo->prepare ("SELECT first_name, last_name, uid FROM staff");//de permission laat ik achterwege
        
        $stmt23->execute();
          
        while ($row=$stmt23->fetch()){
            
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        $uidd=$row['uid'];
            
            
         print    '<li><button class="btn btn-lg btn-primary btn-right" backgroundcolor="grey" type="submit" value="'.$uidd.'" name="'.$uidd.'">'.$first_name." ".$last_name."</button><br /></li>";
        
        
            
        }  
            
            
        }
        
        public function countstaff(){
            global $pdo;
        
            $stmt23=$pdo->prepare ("SELECT COUNT(uid)visje FROM staff");//de permission laat ik achterwege
        
        $stmt23->execute();
          
        while ($row=$stmt23->fetch()){
            
        $count=$row['visje'];
        return $count;
        }}
      
    
        
        
 public function CalendarAllView() {
        
    global $pdo;
        $stmt23=$pdo->prepare ("SELECT first_name, last_name, start_time, end_time, date FROM work_schedule JOIN staff ON staff.uid = work_schedule.uid
                                                        ");
            
        $stmt23->execute();
        
        while ($row=$stmt23->fetch())
        {$time_table_startingtime=$row["start_time"];
           $time_table_endingtime=$row["end_time"];
        $time_table_date=$row["date"];
       $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        
        
        if ($row["start_time"] == '00:00:00' && $row["end_time"] == '00:00:00'){ 
        
			print "{ title:'"."Vrij: ".$first_name." ".$last_name."',
                 start:'".$time_table_date."',
                 end:'".$time_table_date."' },";
		
		}else{
			
		print "{ title:'".$first_name." ".$last_name."',
                 start:'".$time_table_date."T".$time_table_startingtime."',
                 end:'".$time_table_date."T".$time_table_endingtime."' },";
               
        }
		
		
               
                
                
                
        
                
        }
                
        }        
        
        
        
       public function insertPlanning($uid, $start_time, $end_time, $date){
          global $pdo;
          $stmt23=$pdo->prepare ("INSERT INTO work_schedule VALUES(:uid, :start_time, :end_time, :date)");
           $stmt23->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele   
            $stmt23->bindParam(':start_time', $start_time, PDO::PARAM_STR); //Vervang :username naar $user variabele   
             $stmt23->bindParam(':end_time', $end_time, PDO::PARAM_STR); //Vervang :username naar $user variabele   
              $stmt23->bindParam(':date', $date, PDO::PARAM_STR); //Vervang :username naar $user variabele   
          $stmt23->execute();
        
       }
        
        
} //Einde class










$calendar = new Calendar; //Zet class vast in variabele

?>