<?php

class Permission {

   public function Get($name) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT * FROM permission WHERE name = :name"); //Maak de query klaar
        $sth->bindParam(':name', $name, PDO::PARAM_STR); //Vervang :name naar $name variabele
        $sth->execute(); //Voer de query uit
        $result = $sth->fetch(PDO::FETCH_ASSOC); //Sla het resultaat op in een variabele
        return $result["rank"]; //Geef resultaat terug
    }

    public function ListRanks() {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT * FROM rank"); //Maak de query klaar
        $sth->execute(); //Voer de query uit
        
        while($row = $sth->fetch(PDO::FETCH_ASSOC)) { //Begin PDO tabelverwerking
            echo '<option value="'.$row['rank_id'].'">'.$row['name'].'</option>';
        }
        
    }

} //Einde Permission class

$permission = new Permission;

?>