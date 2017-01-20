<?php

class rank {

//------------------------toevoegen van een declaratie : medewerker----------------------------------
    public function insert($rank_id, $name) {
        $sth = $pdo->prepare("INSERT INTO rank (rank_id, name) values (:rank_id, :name)"); //Maak de query klaar
        $sth->bindParam(':rank_id', $rank_id, PDO::PARAM_STR);
        $sth->bindParam(':name', $name, PDO::PARAM_STR);
        $sth->execute(); //Voer de query uit
        return(true);
    }

//einde functie
}

//Einde Permission class
