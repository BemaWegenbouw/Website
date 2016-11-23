<?php

class user {

    public function logout($uid) {
        session_destroy();
    }
    
    public function getIP() {
        $ip = $_SERVER["REMOTE_ADDR"];
        return $ip;
    }
    
    public function getID($user) {
        global $pdo;
        $sth = $pdo->prepare("SELECT uid FROM staff WHERE username = :username");
        $sth->bindParam(':username', $user, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result["uid"];
    }
    
    public function authorize($user) {
        $userid = $this->getID($user);
        $_SESSION["username"] = $user;
        $_SESSION["uid"] = $userid;
        return true;
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