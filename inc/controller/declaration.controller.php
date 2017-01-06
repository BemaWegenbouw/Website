
<?php

class declaration {

//------------------------toevoegen van een declaratie : medewerker----------------------------------    
    public function insert($userid, $date, $start_time, $end_time, $break) {
        global $pdo;
        //--laat zien of de ingevoerde datum in combinatie met UID bestaat, anders komt er een primairy key clash , hier selecteer je alles --
        $sth = $pdo->prepare("SELECT date, uid FROM declaration WHERE uid=:uid and date=:date");//maak de query klaar
        $sth->bindParam(':uid', $userid, PDO::PARAM_STR);//Vervang :uid naar $userid variabele  
        $sth->bindParam(':date', $date, PDO::PARAM_STR);//Vervang :date naar $date variabele  
        $sth->execute(); //Voer de query uit
        
        
		$row = $sth->fetchall(PDO::FETCH_ASSOC);         
		$aantal = count($row); //kijk hoe veel records er uit komen
		 
        if ($aantal == 0) {//als er 0 records uit komen (dat betekent dat hij niet bestaat) dan voert hij de insert declaratie in.
            //Zoek naar $pdo buiten deze functie
            $sth = $pdo->prepare("INSERT INTO declaration (uid, date, start_time, end_time, break) values (:uid, :date, :start_time, :end_time, :break)"); //Maak de query klaar
            $sth->bindParam(':uid', $userid, PDO::PARAM_STR);
            $sth->bindParam(':date', $date, PDO::PARAM_STR);
            $sth->bindParam(':start_time', $start_time, PDO::PARAM_STR);
            $sth->bindParam(':end_time', $end_time, PDO::PARAM_STR);
            $sth->bindParam(':break', $break, PDO::PARAM_STR);
            $sth->execute(); //Voer de query uit
            return(true);
        } else {// als hij niet bestaat komt er een foutmelding
            print("<script type='text/javascript'>noty({text: 'deze dag is al gedeclareerd', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");//foutmelding
        }
    }//einde functie
    
    
    //-------------------------------functie maakt de tr's en de TD's voor de admin tabel aan , voor de openstaande declaraties------------------------------------
    public function declist() {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT first_name, last_name, date, start_time, end_time, break, d.id  FROM declaration d join staff s on d.uid = s.uid WHERE verify IS NULL"); //query
        $sth->execute(); //Voer de query uit

        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {   //Creates a loop to loop through results          maak de tabel aan
            echo "<tr class='gradeA'>
			  <td>" . $row['first_name'] . "</td>
			  <td>" . $row['last_name'] . "</td>
			  <td>" . $row['date'] . "</td>
			  <td>" . $row['start_time'] . "</td>
			  <td>" . $row['end_time'] . "</td>
			  <td>" . $row['break'] . "</td>
                                                        <td>
                                                        <select style='width:80%;' name='" . $row['id'] . "' id='inputID' class='form-control' required>
                                                            <option value='true'>
                                                                ja
                                                            </option>
                                                            <option value='false'>
                                                                nee
                                                            </option>
                                                        </select>
                                                        </td>

			  </tr>";
        }
    }//einde functie

    //maakt tr's en td's aan voor de tabel van de admin voor goedgekeurde declaraties.
    public function declistgoedgekeurd() {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare('SELECT first_name, last_name, date, start_time, end_time, break,verify,id
                                            FROM declaration d join staff s on d.uid = s.uid
                                            WHERE verify IS NOT null or verify IS NOT NULL '); //query
        $sth->execute(); //Voer de query uit
 while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {   //Creates a loop to loop through results  && maak de rijen voor de tabel aan
            echo "<tr class = 'gradeA'>
<td>" . $row['first_name'] . "</td>
<td>" . $row['last_name'] . "</td>
<td>" . $row['date'] . "</td>
<td>" . $row['start_time'] . "</td>
<td>" . $row['end_time'] . "</td>
<td>" . $row['break'] . "</td>
<td class = " . $row["verify"] . ">" . $row['verify'] . "</td>
<td><a class='btn btn-sm btn-primary btn-right' role='button' href='delete_declrations.php?id=".$row['id']."'>verwijder</a></td>
</tr>";
        }
    }//einde functie
	// haal 1 record op aan hand van ID
	public function ShowDeleteRecord($id){
		global $pdo; //Zoek naar $pdo buiten deze functie
		$sth = $pdo->prepare ("SELECT first_name, last_name, date, start_time, end_time, break,id
                                            FROM declaration d join staff s on d.uid = s.uid
                                            WHERE id = :id"); //query
		$sth->bindParam(':id', $id, PDO::PARAM_STR);
		$sth->execute(); //Voer de query uit
		
		while($row = $sth->fetch(PDO::FETCH_ASSOC)){   //Creates a loop to loop through results
		
			print "<span style='font-weight:bold;'>Naam:</span> " . $row['first_name'] ." " . $row['last_name'] . "<br>";
			print "<span style='font-weight:bold;'>Dag:</span> " . $row['date'] ."<br>";
			print "<span style='font-weight:bold;'>Gewerkt van:</span> " . $row['start_time'] ." tot " . $row['end_time'] . "<br>";
			print "<span style='font-weight:bold;'>Pauze tijd: </span>" . $row['break'];
			 			  
			
			
		}
	}
	// Delete goed of afgekeurde declaraties 
	public function deleteRecord($id){
		
		global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("delete from declaration where id = :id"); //Maak de query klaar
        $sth->bindParam(':id', $id, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
	}
    
    //---------------------haalt de gegevens op van de medewerkers------------------------------
    public function get($id, $value) {
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT * FROM declaration WHERE id = :id"); //Maak de query klaar
        $sth->bindParam(':id', $id, PDO::PARAM_STR); //Vervang :id naar $id variabele
        $sth->execute(); //Voer de query uit
        $result = $sth->fetch(PDO::FETCH_ASSOC); //Sla het resultaat op in een variabele
        return $result[$value]; //Geef resultaat terug
    }//einde functie

    //functie die bepaalde records GOED KEURT
    public function approveFree($key) {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("UPDATE declaration SET verify = 'goedgekeurd' WHERE id = :id"); //query
        $sth->bindparam(':id', $key, PDO::PARAM_STR);//vervang variable :id naar $key
        $sth->execute(); //Voer de query uit
    }//einde functie

    //Functie die bepaalde records  FOUT KEURT
    public function denyFree($key) {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("UPDATE declaration SET verify = 'afgekeurd' WHERE id = :id"); //query
        $sth->bindparam(':id', $key, PDO::PARAM_STR);//vervang variable :id naar $key
        $sth->execute(); //Voer de query uit
    }//einde functie
 
    
    //------functie die td's en tr's maakt voor de OPENSTAANDE declaraties---------
    public function decListCompleetUnapproved($userid) {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT first_name, last_name, date, start_time, end_time, break,id FROM declaration d join staff s on d.uid = s.uid WHERE d.uid = :uid and verify is null"); //query
        $sth->bindParam(':uid', $userid, PDO::PARAM_STR);//vervang variable :uid naar $userid
        $sth->execute(); //Voer de query uit     
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {   //Creates a loop to loop through results  
            echo "<tr class = 'gradeA'>
            <td>" . $row['first_name'] . "</td>
            <td>" . $row['last_name'] . "</td>
            <td>" . $row['date'] . "</td>
            <td>" . $row['start_time'] . "</td>
            <td>" . $row['end_time'] . "</td>
            <td>" . $row['break'] . "</td>
			<td><a class='btn btn-sm btn-primary btn-right' role='button' href='delete_declrations_user.php?id=".$row['id']."'>verwijder</a></td>
            </tr>";
        }//einde while
    }//einde functie
	
    
         //-----------functie die td's en tr's maakt voor de GESLOTEN declaraties----------------
	  public function decListCompleetApproved($userid) {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT first_name, last_name, date, start_time, end_time, break FROM declaration d join staff s on d.uid = s.uid WHERE d.uid = :uid and verify is not null "); //query
        $sth->bindParam(':uid', $userid, PDO::PARAM_STR);    //vervang variabele :uid met $userid

        $sth->execute(); //Voer de query uit

        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {   //Creates a loop to loop through results print de tr en td"s van de tabel
            echo "<tr class = 'gradeA'>
            <td>" . $row['first_name'] . "</td>
            <td>" . $row['last_name'] . "</td>
            <td>" . $row['date'] . "</td>
            <td>" . $row['start_time'] . "</td>
            <td>" . $row['end_time'] . "</td>
            <td>" . $row['break'] . "</td>
            </tr>";
        }
    }//einde functie

}

$declaration = new declaration;//maakt de class aan
?>