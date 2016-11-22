<?php

class user {

    public function getIP() {
        $ip = $_SERVER["REMOTE_ADDR"];
        return $ip;
    }
    
	public function checkPassword($user, $pass) {
        
        
        
    }
    
    public function checkUser($user) {
     
        //Laat hem buiten de class zoeken
        global $pdo;
        
        
        $sth = $pdo->prepare("SELECT uid FROM staff WHERE username = :username");
        $sth->bindParam(':username', $user, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        
        if(isset($result) && !empty($result)) {
            //Gebruiker bestaat
            return true;
        } else {
            //Gebruiker bestaat NIET
            return false;
        }
        
    }
	
}

$user = new user;

?>