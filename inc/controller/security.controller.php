<?php

//Copyright J.E. v.d. Heide
//Do not touch.

class security {
    
    public function sanitize($input) {
        
        return $input;
        
    }
    
    public function log($action) {
       
        //Laat hem buiten de class zoeken
        global $pdo;
        
        //Stel IP in
        $ip = $_SERVER["REMOTE_ADDR"];
        
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