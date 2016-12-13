<?php

class restore {

    public function insert($userid, $value) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("INSERT INTO restore (uid,temppass) values (:uid,:temppass)"); //Maak de query klaar
        $sth->bindParam(':temppass', $value, PDO::PARAM_STR);
        $sth->bindParam(':uid', $userid, PDO::PARAM_STR); 
        $sth->execute(); //Voer de query uit
        return(true);
        
    }
	
	 public function getID($tempcode) {
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT uid FROM restore WHERE temppass = :temppass"); //Maak de query klaar
        $sth->bindParam(':temppass', $tempcode, PDO::PARAM_STR); //Vervang :username naar $user variabele
        $sth->execute(); //Voer de query uit
        $result = $sth->fetch(PDO::FETCH_ASSOC); //Sla het resultaat op in een variabele
        return $result["uid"]; //Geef resultaat terug
    }
	
	public function del($userid) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("DELETE FROM restore where uid = :uid"); //Maak de query klaar
        $sth->bindParam(':uid', $userid, PDO::PARAM_STR); 
        $sth->execute(); //Voer de query uit
        return(true);
        
    }
	
}

$restore = new restore;

?>