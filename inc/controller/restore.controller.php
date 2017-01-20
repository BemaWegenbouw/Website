<?php

class Restore {

	// Deze functie insert de random code + uid in de tabel restore na password reset aanvraag.
    public function insert($userid, $value) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("INSERT INTO restore (uid,temppass) values (:uid,:temppass)"); //Maak de query klaar
        $sth->bindParam(':temppass', $value, PDO::PARAM_STR);
        $sth->bindParam(':uid', $userid, PDO::PARAM_STR); 
        $sth->execute(); //Voer de query uit
        return(true);
        
    }
	
	//deze funcie haal de username op aan de hand van de tijdelijke code die in me mail word meegestuurd.
	 public function getID($tempcode) {
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT uid FROM restore WHERE temppass = :temppass"); //Maak de query klaar
        $sth->bindParam(':temppass', $tempcode, PDO::PARAM_STR); //Vervang :username naar $user variabele
        $sth->execute(); //Voer de query uit
        $result = $sth->fetch(PDO::FETCH_ASSOC); //Sla het resultaat op in een variabele
        return $result["uid"]; //Geef resultaat terug
    }
	
	//deze functie delete na successvol password reset alles van de gebruiker uit die tabel restore.
	//zodat er geen hacker gegevens uit de tabel kan gebruiken om wachtwoord te wijzigen van iemand.
	public function del($userid) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("DELETE FROM restore where uid = :uid"); //Maak de query klaar
        $sth->bindParam(':uid', $userid, PDO::PARAM_STR); 
        $sth->execute(); //Voer de query uit
        return(true);
        
    }
	//Deze fuctie haal alle tmp codes uit de database voor de user op en met php word gekeken of dezelfde code aanwezig is.
	//indien dit niet het geval is kan de wachtwoord niet veranderd worden.
	public function checkTempc($uid){
		
	
		global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT * FROM restore WHERE uid = :uid"); //Maak de query klaar
        $sth->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang :username naar $user variabele
        $sth->execute(); //Voer de query uit
        $result = $sth->fetch(PDO::FETCH_ASSOC); //Sla het resultaat op in een variabele
        return $result; //Geef resultaat terug
	}
}

$restore = new Restore;

?>