
<?php

class declaration {

    public function insert($userid, $date, $start_time, $end_time, $break) {
        global $pdo;
        $sth = $pdo->prepare("SELECT date, uid
                                            FROM declaration
                                             WHERE uid=:uid and date=:date");
        $sth->bindParam(':uid', $userid, PDO::PARAM_STR);
        $sth->bindParam(':date', $date, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
        
		$row = $sth->fetchall(PDO::FETCH_ASSOC);         
		$aantal = count($row); 
		 
        if ($aantal == 0) {
            //Zoek naar $pdo buiten deze functie
            $sth = $pdo->prepare("INSERT INTO declaration (uid, date, start_time, end_time, break) values (:uid, :date, :start_time, :end_time, :break)"); //Maak de query klaar
            $sth->bindParam(':uid', $userid, PDO::PARAM_STR);
            $sth->bindParam(':date', $date, PDO::PARAM_STR);
            $sth->bindParam(':start_time', $start_time, PDO::PARAM_STR);
            $sth->bindParam(':end_time', $end_time, PDO::PARAM_STR);
            $sth->bindParam(':break', $break, PDO::PARAM_STR);
            $sth->execute(); //Voer de query uit
            return(true);
        } else {
            print("<script type='text/javascript'>noty({text: 'deze dag is al gedeclareerd', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");
        }
    }

//    public function declist() {
//
//        global $pdo; //Zoek naar $pdo buiten deze functie
//        $sth = $pdo->prepare("SELECT * FROM declaration"); //Maak de query klaar
//        $sth->execute(); //Voer de query uit
//
//        $row = $sth->fetch(PDO::FETCH_ASSOC);
//        print_r($row); //Einde van de tabel
//    }

    public function declist() {



        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT first_name, last_name, date, start_time, end_time, break, d.id
                                            FROM declaration d join staff s on d.uid = s.uid
                                             WHERE verify IS NULL"); //query
        $sth->execute(); //Voer de query uit




        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {   //Creates a loop to loop through results
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
    }

    public function declistgoedgekeurd() {



        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare('SELECT first_name, last_name, date, start_time, end_time, break,verify
                                            FROM declaration d join staff s on d.uid = s.uid
                                            WHERE verify IS NOT null or verify IS NOT NULL '); //query
        $sth->execute(); //Voer de query uit




        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {   //Creates a loop to loop through results
            echo "<tr class = 'gradeA'>
<td>" . $row['first_name'] . "</td>
<td>" . $row['last_name'] . "</td>
<td>" . $row['date'] . "</td>
<td>" . $row['start_time'] . "</td>
<td>" . $row['end_time'] . "</td>
<td>" . $row['break'] . "</td>
<td class = " . $row["verify"] . ">" . $row['verify'] . "</td>
</tr>";
        }
    }

    public function get($id, $value) {
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT * FROM declaration WHERE id = :id"); //Maak de query klaar
        $sth->bindParam(':id', $id, PDO::PARAM_STR); //Vervang :username naar $user variabele
        $sth->execute(); //Voer de query uit
        $result = $sth->fetch(PDO::FETCH_ASSOC); //Sla het resultaat op in een variabele
        return $result[$value]; //Geef resultaat terug
    }

    public function approveFree($key) {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("UPDATE declaration SET verify = 'goedgekeurd' WHERE id = :id"); //query
        $sth->bindparam(':id', $key, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
    }

    public function denyFree($key) {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("UPDATE declaration SET verify = 'afgekeurd' WHERE id = :id"); //query
        $sth->bindparam(':id', $key, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
    }

//Einde van de Staff Lijst functie.
    public function decListCompleet($userid) {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT first_name, last_name, date, start_time, end_time, break
FROM declaration d join staff s on d.uid = s.uid
WHERE d.uid = :uid "); //query
        $sth->bindParam(':uid', $userid, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit




        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {   //Creates a loop to loop through results
            echo "<tr class = 'gradeA'>
            <td>" . $row['first_name'] . "</td>
            <td>" . $row['last_name'] . "</td>
            <td>" . $row['date'] . "</td>
            <td>" . $row['start_time'] . "</td>
            <td>" . $row['end_time'] . "</td>
            <td>" . $row['break'] . "</td>
            </tr>";
        }
    }

}

$declaration = new declaration;
?>