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
	
	
	
	public function freeListCompleet(){
	
	global $pdo; //Zoek naar $pdo buiten deze functie
	$sth = $pdo->prepare ("SELECT first_name, last_name, start_date, end_date, start_time, end_time,comment,id 
							FROM free f join staff s on f.uid = s.uid"); //query
	$sth->execute(); //Voer de query uit
		
		$true = true;
		$false = false;
		
		
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
	
	public function approveFree($key){
		
		global $pdo; //Zoek naar $pdo buiten deze functie
		$sth = $pdo->prepare ("UPDATE free SET verify = 'true' WHERE id = :id"); //query
		$sth->bindparam(':id', $key, PDO::PARAM_STR);
		$sth->execute(); //Voer de query uit
		
		global $pdo; //Zoek naar $pdo buiten deze functie
		$sth = $pdo->prepare ("UPDATE free SET comment = 'goedgekeurd' WHERE id = :id"); //query
		$sth->bindparam(':id', $key, PDO::PARAM_STR);
		$sth->execute(); //Voer de query uit
		
		
	
	}
	
	public function denyFree($key){
		
		global $pdo; //Zoek naar $pdo buiten deze functie
		$sth = $pdo->prepare ("UPDATE free SET verify = 'false' WHERE id = :id"); //query
		$sth->bindparam(':id', $key, PDO::PARAM_STR);
		$sth->execute(); //Voer de query uit
		
		global $pdo; //Zoek naar $pdo buiten deze functie
		$sth = $pdo->prepare ("UPDATE free SET comment = 'foutgekeurd' WHERE id = :id"); //query
		$sth->bindparam(':id', $key, PDO::PARAM_STR);
		$sth->execute(); //Voer de query uit
	}
	
	public function backupFree(){
		
		global $pdo; //Zoek naar $pdo buiten deze functie
		
	}
}

	

$free = new free;

?>