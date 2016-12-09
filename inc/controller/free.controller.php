<?php

class free {

    public function insert($userid, $date,$start_time,$end_time,$comment) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("INSERT INTO free (uid,date,start_time,end_time,comment) values (:uid,:date,:start_time,:end_time,:comment)"); //Maak de query klaar
        $sth->bindParam(':uid', $userid, PDO::PARAM_STR);
		$sth->bindParam(':date', $date, PDO::PARAM_STR);
		$sth->bindParam(':start_time', $start_time, PDO::PARAM_STR);
		$sth->bindParam(':end_time', $end_time, PDO::PARAM_STR);
		$sth->bindParam(':comment', $comment, PDO::PARAM_STR); 
        $sth->execute(); //Voer de query uit
        return(true);
        
    }
	
	
	public function freeList(){
	
	global $pdo; //Zoek naar $pdo buiten deze functie
	$sth = $pdo->prepare ("SELECT * FROM free"); //query
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
				echo "<th>"."Gebruikersnaam"."</th>";
				echo "<th>"."Datum"."</th>";
				echo "<th>"."Start tijd"."</th>";
				echo "<th>"."Eind tijd"."</th>";
				echo "<th>"."Reden"."</th>";				
			echo "</tr>";
        echo "</thead>";
		echo "<tbody";
		while($row = $sth->fetch(PDO::FETCH_ASSOC)){   //Creates a loop to loop through results
		echo "<tr class='gradeA'><td>" . $row['uid'] . "</td><td>" . $row['date'] . "</td><td>" . $row['start_time']
		. "</td><td>" . $row['end_time'] . "</td><td>" . $row['comment'] . "</td></tr>";  //$row['index'] the index here is a field name
		}
		echo "</tbody";
		echo "</table>"; //Close the table in HTML
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		
	}
}

$free = new free;

?>