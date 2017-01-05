<?php

class free {

    public function insert($userid,$start_date,$end_date,$start_time,$end_time,$comment) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("INSERT INTO free (uid,start_date,end_date,start_time,end_time,comment) values (:uid,:start_date,:end_date,:start_time,:end_time,:comment)"); //Maak de query klaar
        $sth->bindParam(':uid', $userid, PDO::PARAM_STR);
		$sth->bindParam(':start_date', $start_date, PDO::PARAM_STR);
		$sth->bindParam(':end_date', $end_date, PDO::PARAM_STR);
		$sth->bindParam(':start_time', $start_time, PDO::PARAM_STR);
		$sth->bindParam(':end_time', $end_time, PDO::PARAM_STR);
		$sth->bindParam(':comment', $comment, PDO::PARAM_STR); 
        $sth->execute(); //Voer de query uit
        return(true);
        
    }
	
	public function get($id,$value){
		global $pdo; //Zoek naar $pdo buiten deze functie
         $sth = $pdo->prepare("SELECT * FROM free WHERE id = :id"); //Maak de query klaar
        $sth->bindParam(':id', $id, PDO::PARAM_STR); //Vervang :username naar $user variabele
        $sth->execute(); //Voer de query uit
        $result = $sth->fetch(PDO::FETCH_ASSOC); //Sla het resultaat op in een variabele
        return $result[$value]; //Geef resultaat terug
	}
	
		
	public function getStaff($uid,$value){
		
		global $pdo; //Zoek naar $pdo buiten deze functie
		$sth = $pdo->prepare ("SELECT * FROM free f join staff s on f.uid = s.uid WHERE uid = :uid"); //query
		$sth->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele
		$sth->execute(); //Voer de query uit
		$result = $sth->fetch(PDO::FETCH_ASSOC); //Sla het resultaat op in een variabele
        return $result[$value]; //Geef resultaat terug
	}	
		
		public function approveRequest(){
		
		global $pdo; //Zoek naar $pdo buiten deze functie
		$sth = $pdo->prepare ("SELECT first_name, last_name, start_date, end_date, start_time, end_time,comment,id 
								FROM free f join staff s on f.uid = s.uid WHERE verify is null"); //query
		$sth->execute(); //Voer de query uit
		
	
		
		while($row = $sth->fetch(PDO::FETCH_ASSOC)){   //Creates a loop to loop through results
		echo "<tr class='gradeA'>
			  <td>" . $row['first_name'] . "</td>
			  <td>" . $row['last_name'] . "</td>
			  <td>" . $row['start_date'] . "</td>
			  <td>" . $row['end_date'] . "</td>
			  <td>" . $row['start_time']. "</td>
			  <td>" . $row['end_time'] . "</td>
			  <td>" . $row['comment'] . "</td>
			 <td><select style='width:80%; 'name='".$row['id']."' id='inputID' class='form-control'
			  required><option value='true'>ja</option><option value='false'>nee</option></select></td>
			  </tr>";
			
		}
		

	}
	
	public function freeListCompleet(){
	
	global $pdo; //Zoek naar $pdo buiten deze functie
	$sth = $pdo->prepare ("SELECT first_name, last_name, start_date, end_date, start_time, end_time,comment,id,verify 
							FROM free f join staff s on f.uid = s.uid where verify is not NULL"); //query
	$sth->execute(); //Voer de query uit
		
		
		
		
		while($row = $sth->fetch(PDO::FETCH_ASSOC)){   //Creates a loop to loop through results
		echo "<tr class='gradeA'>
			  <td>" . $row['first_name'] . "</td>
			  <td>" . $row['last_name'] . "</td>
			  <td>" . $row['start_date'] . "</td>
			  <td>" . $row['end_date'] . "</td>
			  <td>" . $row['start_time']. "</td>
			  <td>" . $row['end_time'] . "</td>
			  <td>" . $row['comment'] . "</td>
			  <td class=" . $row["verify"] . ">" . $row['verify'] . "</td>
			  </tr>";
			
		}
		

	}
	

	public function approveFree($key){
		
		global $pdo; //Zoek naar $pdo buiten deze functie
		$sth = $pdo->prepare ("UPDATE free SET verify = 'goedgekeurd' WHERE id = :id"); //query
		$sth->bindparam(':id', $key, PDO::PARAM_STR);
		$sth->execute(); //Voer de query uit
	
	}
	
	public function denyFree($key){
		
		global $pdo; //Zoek naar $pdo buiten deze functie
		$sth = $pdo->prepare ("UPDATE free SET verify = 'afgekeurd' WHERE id = :id"); //query
		$sth->bindparam(':id', $key, PDO::PARAM_STR);
		$sth->execute(); //Voer de query uit
	
	}
	
	public function backupFree(){
		
		global $pdo; //Zoek naar $pdo buiten deze functie
		
	}
	
	public function updateWorkHours($uid,$startdate,$enddate){
		
		global $pdo; //Zoek naar $pdo buiten deze functie    als date work, valt tussen start en eind date dan delete van een bepaalde gebruiker
		$sth = $pdo->prepare ("DELETE FROM work_schedule WHERE uid = :uid AND (date >= :start_date and date < :end_date)"); 
		$sth->bindparam(':uid', $uid, PDO::PARAM_STR);//query
		$sth->bindparam(':start_date', $startdate, PDO::PARAM_STR);//query
		$sth->bindparam(':end_date', $enddate, PDO::PARAM_STR);//query
		$sth->execute(); //Voer de query uit
		
		
		$date = $startdate; 	
		$date2 = $enddate;
		
		if ($date == $date2){
			
			global $pdo; //Zoek naar $pdo buiten deze functie    als date work, valt tussen start en eind date dan delete van een bepaalde gebruiker
				$sth = $pdo->prepare ("INSERT INTO work_schedule (uid,start_time,end_time, date) VALUES (:uid,'00:00:00','00:00:00', :date)"); 
				$sth->bindparam(':uid', $uid, PDO::PARAM_STR);//query
				$sth->bindparam(':date', $date, PDO::PARAM_STR);//query
				$sth->execute(); //Voer de query uit

				
		}else{
			
				while ($date < $date2){
				
				global $pdo; //Zoek naar $pdo buiten deze functie    als date work, valt tussen start en eind date dan delete van een bepaalde gebruiker
				$sth = $pdo->prepare ("INSERT INTO work_schedule (uid,start_time,end_time, date) VALUES (:uid,'00:00:00','00:00:00', :date)"); 
				$sth->bindparam(':uid', $uid, PDO::PARAM_STR);//query
				$sth->bindparam(':date', $date, PDO::PARAM_STR);//query
				$sth->execute(); //Voer de query uit
				
				$time_original = strtotime($date);
				$time_add      = $time_original + (3600*24); //add seconds of one day

				$new_date      = date("Y-m-d", $time_add);
				$date = $new_date;
			
				/* $daycount = $daycount + 1; */

			}
		}
	}
	
	public function insertNewWorkHours($uid,$startdate){
		
		/*
		$date = $startdate;
		$daycount = 0;
		$i = $temp;
	
		while ($daycount > $temp){
		*/
		global $pdo; //Zoek naar $pdo buiten deze functie    als date work, valt tussen start en eind date dan delete van een bepaalde gebruiker
		$sth = $pdo->prepare ("INSERT INTO work_schedule (uid,start_time,end_time, date)  VALUES (:uid,'00:00:00','00:00:00', :date)"); 
		$sth->bindparam(':uid', $uid, PDO::PARAM_STR);//query
		$sth->bindparam(':date', $startdate, PDO::PARAM_STR);//query
		$sth->execute(); //Voer de query uit
		/*
		$date->add(new DateInterval('P1D'));
		$daycount = $daycount + 1; 
	}
	*/
	
}
}

	

$free = new free;

?>