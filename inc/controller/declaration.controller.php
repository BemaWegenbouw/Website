
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
        $sth = $pdo->prepare("SELECT first_name voornaam, last_name achternaam, date datum, start_time starttijd, end_time eindtijd, break pauze FROM declaration d JOIN staff s ON d.uid=s.uid;"); //Maak de query klaar
        $sth->execute(); //Voer de query uit

        echo'           ';
//        echo"<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-exampl'>"; //begin tabel
        echo"<tbody>"; //begin tabel
        $i = 0;

        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { //Begin PDO tabelverwerking
            if ($i == 0) {
                $i++;
                echo "<tr>"; //Vertel in HTML dat je tabelkopjes begint

                foreach ($row as $key => $value) { //Begin kopjesverwerking
                    echo "<th>" . $key . "</th>"; //Geef het kopje weer
                } //Einde verwerking kopjes
            } //Einde kopjesprojectie

            echo "<tr>"; //Print de openingstag voor tabelinhoud

            foreach ($row as $key => $value) { //Begin inhoudverwerking
                echo "<td>" . $value . "</td>"; //Print de inhoud

                if ($key == 'uid') { //Indien het een gebruiker ID betreft
                    $uid = $value; //Houd deze vast
                } //Einde check gebruiker ID
            } //Einde inhoudverwerking

            echo "</tr>"; //Einde tabel
        } //Einde PDO tabelverwerking
        echo "</tbody>";
//        echo "</table></div></div></div></div>"; //Einde van de tabel
    }

//Einde van de Staff Lijst functie.
    public function decListCompleet() {

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

}

$declaration = new declaration;
?>