<?php

//Copyright J.E. v.d. Heide
//Do not touch.

class security {
    
    public function sanitize($input) {
        
        return $input;
        
    }
    
    public function hashPassword($pass) {
        $options = [
        'cost' => 11,
        ];
        return password_hash($pass, PASSWORD_DEFAULT, $options);
    }
    
    public function checkPassword($user, $pass) {
        global $pdo;
        
        $sth = $pdo->prepare("SELECT * FROM staff WHERE username = :username");
        $sth->bindParam(':username', $user, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        
        if(isset($result) && !empty($result)) {
            
            //Check het wachtwoord
            $check = password_verify($pass, $result["password"]);
            
            //Verwerk de reactie.
            if($check == true) {
                
                //Wachtwoord klopt
                return true;
                
            } else {
                //Wachtwoord klopt NIET
                return false;
            }
        
        }
        
    }
    
    public function log($action) {
       
        //Laat hem buiten de class zoeken
        global $pdo;
        global $user;
        
        //Stel IP in
        $ip = $user->getIP();
        
        //Maak de query op
        $query = "INSERT INTO logs (ip, action) VALUES (:ip, :action)";
        
        $stmt = $pdo->prepare($query);
        
        //Vervang :ip door het IP, SQL-injectie veilig.
        $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
        
        //Stel :action in
        $stmt->bindParam(':action', $action, PDO::PARAM_STR);
        
        $stmt->execute();
        
    }
    
}

$security = new security;

?>