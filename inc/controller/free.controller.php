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
	$sth = $pdo->prepare ("SELECT first_name, last_name, start_date, end_date, start_time, end_time,comment,verify 
							FROM free f join staff s on f.uid = s.uid"); //query
	$sth->execute(); //Voer de query uit
		
		
		
		echo "<div class='row'>";
		echo "<div class='col-lg-12'>";
		echo "<div class='panel panel-default'>";
		echo "<div class='panel-heading'>";	
		echo "</div>";
		
		echo "<div class='panel-body'>";
		echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>"; // start a table tag in the HTML
		echo "<thead>";
			echo "<tr>";
				echo "<th>"."Voornaam"."</th>";
				echo "<th>"."Achternaam"."</th>";
				echo "<th>"."Van"."</th>";
				echo "<th>"."Tot"."</th>";
				echo "<th>"."Start tijd"."</th>";
				echo "<th>"."Eind tijd"."</th>";
				echo "<th>"."Reden"."</th>";
				echo "<th>"."Goedkeuring"."</th>";				
			echo "</tr>";
        echo "</thead>";
		echo "<tbody";
		while($row = $sth->fetch(PDO::FETCH_ASSOC)){   //Creates a loop to loop through results
		echo "<tr class='gradeA'><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['start_date'] . "</td><td>" . $row['end_date'] . "</td><td>" . $row['start_time']
			. "</td><td>" . $row['end_time'] . "</td><td>" . $row['comment'] . "</td>
			<td><div style='color:green;'><input type='checkbox' name='verified'>"." Goedkeuren"."</div>"."<br>
			<div style='color:red;'><input type='checkbox' name='unverified'>"." Afkeuren"."</div>". $row['verify'] . "</td></tr>";  //$row['index'] the index here is a field name
		}
		echo "<div><button class='btn btn-lg btn-primary btn-right pull-right' style='margin-right:1%' backgroundcolor='blue' type='submit' name='submit'>Verzenden</button></div>";
		echo "</tbody>";
		echo "</table>"; //Close the table in HTML
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		
	}
}

$free = new free;

?>