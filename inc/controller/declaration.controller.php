
<?php

class declaration {

    public function insert($userid, $date, $start_time, $end_time, $break) {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("INSERT INTO declaration (uid, date, start_time, end_time, break) values (:uid, :date, :start_time, :end_time, :break)"); //Maak de query klaar
        $sth->bindParam(':uid', $userid, PDO::PARAM_STR);
        $sth->bindParam(':date', $date, PDO::PARAM_STR);
        $sth->bindParam(':start_time', $start_time, PDO::PARAM_STR);
        $sth->bindParam(':end_time', $end_time, PDO::PARAM_STR);
        $sth->bindParam(':break', $break, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
        return(true);
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
        $sth = $pdo->prepare("SELECT first_name, last_name, date, start_time, end_time, break
							FROM declaration d join staff s on d.uid = s.uid"); //query
        $sth->execute(); //Voer de query uit




        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {   //Creates a loop to loop through results
            echo "<tr class='gradeA'>
			  <td>" . $row['first_name'] . "</td>
			  <td>" . $row['last_name'] . "</td>
			  <td>" . $row['date'] . "</td>
			  <td>" . $row['start_time'] . "</td>
			  <td>" . $row['end_time'] . "</td>
			  <td>" . $row['break'] . "</td>
			  </tr>";
        }
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
            echo "<tr class='gradeA'>
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