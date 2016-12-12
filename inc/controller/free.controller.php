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
	
	public function ListID() {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT id FROM free"); //Maak de query klaar
        $sth->execute(); //Voer de query uit
        
        $ja = 'ja';
		$nee = 'nee';
		
        while($row = $sth->fetch(PDO::FETCH_ASSOC)) { //Begin PDO tabelverwerking
			echo '<option value="'.$ja.'">"'.$ja.'"</option><option value="'.$nee.'">"'.$ja.'"</option>';
			echo '<option value="'.$nee.'">"'.$ja.'"</option>';
        }
        
    }
	
	public function freeListCompleet(){
	
	global $pdo; //Zoek naar $pdo buiten deze functie
	$sth = $pdo->prepare ("SELECT first_name, last_name, start_date, end_date, start_time, end_time,comment,id 
							FROM free f join staff s on f.uid = s.uid"); //query
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
			 <td><form><select style='width:80%; 'name='".$row['id']."' id='inputID' class='form-control'
			  required><option value='ja'>ja</option><option value='nee'>nee</option></select></form></td>
			  </tr>";
			
		}
		

	}
}

$free = new free;

?>