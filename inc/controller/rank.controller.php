<?php

class rank {

//------------------------toevoegen van een declaratie : medewerker----------------------------------
    public function ranktabel() {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT name, rank_id FROM rank"); //query
        $sth->execute(); //Voer de query uit
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {   //Creates a loop to loop through results
            echo "<tr class = 'gradeA'>
            <td>" . $row['rank_id'] . "</td>
            <td>" . $row['name'] . "</td>
            </tr>";
        }//einde while
    }

    public function rankstafftabel() {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT name, first_name, last_name FROM rank r JOIN staff s on r.rank_id = s.rank_id"); //query
        $sth->execute(); //Voer de query uit
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {   //Creates a loop to loop through results
            echo "<tr class = 'gradeA'>
            <td>" . $row['first_name'] . "</td>
            <td>" . $row['last_name'] . "</td>
            <td>" . $row['name'] . "</td>
            </tr>";
        }//einde while
    }

//einde functie

    public function insert($rank_id, $name) {
        global $pdo;
        $sth = $pdo->prepare("INSERT INTO rank (rank_id, name) values (:rank_id, :name) "); //Maak de query klaar
        $sth->bindParam(':rank_id', $rank_id, PDO::PARAM_STR);
        $sth->bindParam(':name', $name, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
        return(true);
    }

    public function editstaffrank($rank_id, $uidd) {
        global $pdo;
        $sth = $pdo->prepare("UPDATE staff SET rank_id = :rank_id WHERE uid = :uidd"); //Maak de query klaar
        $sth->bindParam(':rank_id', $rank_id, PDO::PARAM_STR);
        $sth->bindParam(':uidd', $uidd, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
        return(true);
    }

    public function editpermission($pid, $rank) {
        global $pdo;
        $sth = $pdo->prepare("UPDATE permission SET rank = :rank WHERE pid = :pid"); //Maak de query klaar
        $sth->bindParam(':pid', $pid, PDO::PARAM_STR);
        $sth->bindParam(':rank', $rank, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
        return(true);
    }

    public function delete($rank_id) {
        global $pdo;
        $sth = $pdo->prepare(
                "Update staff SET rank_id = 10 WHERE rank_id = :rank_id;"
                . "DELETE FROM rank Where rank_id=:rank_id;"
        ); //Maak de query klaar
        $sth->bindParam(':rank_id', $rank_id, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
        return(true);
    }

    public function updateboth($rank_id1, $rank_id2, $rankname) {
        global $pdo;
        $sth = $pdo->prepare(
                "Update rank SET rank_id = :rank_id2, name=:rankname WHERE rank_id = :rank_id1;"
        ); //Maak de query klaar
        $sth->bindParam(':rank_id1', $rank_id1, PDO::PARAM_STR);
        $sth->bindParam(':rank_id2', $rank_id2, PDO::PARAM_STR);
        $sth->bindParam(':rankname', $rankname, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
        return(true);
    }

    public function Updaterank($rank_id1, $rank_id2) {
        global $pdo;
        $sth = $pdo->prepare(
                "Update rank SET rank_id = :rank_id2 WHERE rank_id = :rank_id1;"
        ); //Maak de query klaar
        $sth->bindParam(':rank_id1', $rank_id1, PDO::PARAM_STR);
        $sth->bindParam(':rank_id2', $rank_id2, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
        return(true);
    }

    public function updatename($rank_id1, $rankname) {
        global $pdo;
        $sth = $pdo->prepare(
                "Update rank SET name = :rankname WHERE rank_id = :rank_id1;"
        ); //Maak de query klaar
        $sth->bindParam(':rank_id1', $rank_id1, PDO::PARAM_STR);
        $sth->bindParam(':rankname', $rankname, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
        return(true);
    }

    public function Listname() {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT first_name, last_name, uid, name FROM staff s Join rank r on r.rank_id=s.rank_id "); //Maak de query klaar
        $sth->execute(); //Voer de query uit

        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { //Begin PDO tabelverwerking
            echo '<option value="' . $row['uid'] . '">' . $row['first_name'] . ' ' . $row['last_name'] . ' (' . $row['name'] . ')' . '</option>';
        }
    }

    public function Listpermission() {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT pid, name, rank FROM permission"); //Maak de query klaar
        $sth->execute(); //Voer de query uit

        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { //Begin PDO tabelverwerking
            echo '<option value="' . $row['pid'] . '">' . $row['name'] . ' (' . $row['rank'] . ')' . '</option>';
        }
    }

    public function ListRanks() {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT * FROM rank"); //Maak de query klaar
        $sth->execute(); //Voer de query uit

        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { //Begin PDO tabelverwerking
            echo '<option value="' . $row['rank_id'] . '">' . $row['name'] . ' (' . $row['rank_id'] . ')' . '</option>';
        }
    }

    public function ListRanksdelete() {

        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT * FROM rank WHERE rank_id != 10 and rank_id != 20 and rank_id != 100"); //Maak de query klaar
        $sth->execute(); //Voer de query uit

        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { //Begin PDO tabelverwerking
            echo '<option value="' . $row['rank_id'] . '">' . $row['name'] . '</option>';
        }
    }

//einde functie
//einde functie
}

$rank = new rank; //Zet class vast in variabele
//Einde Permission class
?>