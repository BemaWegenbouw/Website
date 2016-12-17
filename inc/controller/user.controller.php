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
    
    public function Get($userid, $value) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT * FROM staff WHERE uid = :uid"); //Maak de query klaar
        $sth->bindParam(':uid', $userid, PDO::PARAM_STR); //Vervang :username naar $user variabele
        $sth->execute(); //Voer de query uit
        $result = $sth->fetch(PDO::FETCH_ASSOC); //Sla het resultaat op in een variabele
        return $result[$value]; //Geef resultaat terug
        
    }
    
    public function Set($userid, $what, $value) {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("UPDATE staff SET $what = :value WHERE uid = :uid"); //Maak de query klaar
        $sth->bindParam(':value', $value, PDO::PARAM_STR);
        $sth->bindParam(':uid', $userid, PDO::PARAM_STR); //Vervang :username naar $user variabele
        $sth->execute(); //Voer de query uit
        return(true);
        
    }
    
    public function staffList() {
        
        global $pdo; //Zoek naar $pdo buiten deze functie
        $sth = $pdo->prepare("SELECT * FROM staff"); //Maak de query klaar
        $sth->execute(); //Voer de query uit
        
        $i = 0;
        
        while($row = $sth->fetch(PDO::FETCH_ASSOC)) { //Begin PDO tabelverwerking
            
            if ($i == 0) {
            $i++;
            echo "<tr>"; //Vertel in HTML dat je tabelkopjes begint
                
                foreach ($row as $key => $value) { //Begin kopjesverwerking
                    
                    if($key != 'password') { //Indien het geen wachtwoord betreft
                        echo "<th>" . $key . "</th>"; //Geef het kopje weer
                    } //Einde weergave
                    
                } //Einde verwerking kopjes
        
            echo "<th>Bewerken</th></tr>"; //Maak bewerkkop aan en sluit de kopjes
            
            } //Einde kopjesprojectie
        
        echo "<tr>"; //Print de openingstag voor tabelinhoud
        
        foreach ($row as $key => $value) { //Begin inhoudverwerking
            
                if($key != 'password') { //Indien het geen wachtwoord betreft
                    echo "<td>" . $value . "</td>"; //Print de inhoud
                } //Einde check
            
                if ($key == 'uid') { //Indien het een gebruiker ID betreft
                    $uid = $value; //Houd deze vast
                } //Einde check gebruiker ID
        
        } //Einde inhoudverwerking
        
        echo "<td><a href='editstaff.php?uid=$uid'>Berwerken</a></td>"; //Plak overal bewerkknop achter
        echo "</tr>"; //Einde tabel
            
        } //Einde PDO tabelverwerking
        
        echo "</tbody>"; //Einde van de tabel
        
    } //Einde van de Staff Lijst functie.
    
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
    
    public function checkID($uid) {
     
        global $pdo; //Zoek buiten de scope van de functie en class
        
        
        $sth = $pdo->prepare("SELECT username FROM staff WHERE uid = :uid"); //Maak query op
        $sth->bindParam(':uid', $uid, PDO::PARAM_STR); //Vervang variabele
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