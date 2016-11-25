<?php

//Copyright J.E. v.d. Heide
//Wees voorzichtig.

class security {
    
    public function checkRisk($input) {
        //Checkt het risico van een gebruiker
    }
    
    public function sanitize($input) {
        //Maakt gebruikersinvoer schoon
        
        $input = filter_var($input, FILTER_SANITIZE_STRING);
        return $input;
        
    }
    
    public function Hash($pass) {
        //Hasht/beveiligd het wachtwoord
        
        $options = [
        'cost' => 15,
        ];
        return password_hash($pass, PASSWORD_DEFAULT, $options);
        
    }
    
    public function checkPassword($user, $pass) {
        //Check het wachtwoord van een gebruiker
        
        global $pdo;
        
        $sth = $pdo->prepare("SELECT * FROM staff WHERE username = :username");
        $sth->bindParam(':username', $user, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        
        if(isset($result) && !empty($result)) {
            
            //Check het wachtwoord
            $check = password_verify($pass, $result["password"]);
            
            //Verwerk de reactie.
            if($check == true) { //Indien check klopt
                
                //Wachtwoord klopt
                return true; //Retourneer dat
                
            } else { //Indien check niet klopt
                
                //Wachtwoord klopt NIET
                return false; //Retourneer dat
            }
        
        } //Stop met checken
        
    } //Einde wachtwoord check functie
    
    public function log($action) {
        //Functie voor het vastleggen van risicovolle interacties
        
        //Laat hem buiten de class zoeken
        global $pdo;
        global $user;
        
        //Stel IP in
        $ip = $user->getIP(); //Roep user class en IP functie aan
        
        //Maak de query op
        $query = "INSERT INTO logs (ip, action) VALUES (:ip, :action)";
        
        $stmt = $pdo->prepare($query); //Bereid de query voor
        
        //Vervang :ip door het IP, SQL-injectie veilig.
        $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
        
        //Stel :action in
        $stmt->bindParam(':action', $action, PDO::PARAM_STR);
        
        //Voer de query uit
        $stmt->execute();
        
    }
    
}

$security = new security; //Open de class voor toekomstig gebruik met $security->functie();

?>