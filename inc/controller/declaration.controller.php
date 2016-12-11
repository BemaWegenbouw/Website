
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

    public function declist() {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT * FROM declaration"); //Maak de query klaar
        $sth->execute(); //Voer de query uit

        $row = $sth->fetch(PDO::FETCH_ASSOC);
        print_r($row); //Einde van de tabel
    }

}

$declaration = new declaration;
?>