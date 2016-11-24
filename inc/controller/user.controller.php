<?php

class user {

    public function logout($uid) {
        session_destroy(); //Verwijder de sessie van de gebruiker
    }
    
    public function getIP() {
        $ip = $_SERVER["REMOTE_ADDR"]; //Maak een variabele van het IP-adres
        return $ip; //Stuur IP variabele terug
    }
    
    public function LoggedIn() {
        if(isset($_SESSION["uid"]) && !empty($_SESSION["uid"])) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getID($user) {
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT uid FROM staff WHERE username = :username"); //Maak de query klaar
        $sth->bindParam(':username', $user, PDO::PARAM_STR); //Vervang :username naar $user variabele
        $sth->execute(); //Voer de query uit
        $result = $sth->fetch(PDO::FETCH_ASSOC); //Sla het resultaat op in een variabele
        return $result["uid"]; //Geef resultaat terug
    }
    
    public function authorize($user) {
        $userid = $this->getID($user); //Krijg het userID via de getID functie in dit bestand
        $_SESSION["username"] = $user; //Stel de username in als sessie variabele
        $_SESSION["uid"] = $userid; //Stel het userID in als sessievariabele
        return true; //Geef "goed" als resultaat terug
    }
    
    public function checkUser($user) {
     
        global $pdo; //Zoek buiten de scope van de functie en class
        
        
        $sth = $pdo->prepare("SELECT uid FROM staff WHERE username = :username"); //Maak query op
        $sth->bindParam(':username', $user, PDO::PARAM_STR); //Vervang variabele
        $sth->execute(); //Uitvoeren
        $result = $sth->fetch(PDO::FETCH_ASSOC); //Sla resultaat op in variabele
        
        if(isset($result) && !empty($result)) { //Check of er resultaat is
            //Gebruiker bestaat
            return true; //Retourneer "goed"
        } else {
            //Gebruiker bestaat NIET
            return false; //Retourneer "fout"
        }
        
    }
	
}

$user = new user; //Zorg dat deze class aangeroepen kan worden met $user->functie();

?>