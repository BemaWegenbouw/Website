<?php

//Copyright J.E. v.d. Heide
//Do not touch.

class security {
    
    public function sanitize($input) {
        
        return $input;
    }
    
    public function log($action) {
       
        $ip = $_SERVER["REMOTE_ADDR"];
        $query = "INSERT INTO logs (ip, action) VALUES (:ip, :action)";
        
        
    }
    
}

$security = new security;

?>