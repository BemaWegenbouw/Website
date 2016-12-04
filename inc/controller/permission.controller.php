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
	
}

$permission = new Permission;

?>