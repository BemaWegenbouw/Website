<?php

//Copyright J.E. v.d. Heide
//Wees voorzichtig.

class Security {
    
    public function checkRisk($input) {
        //Checkt het risico van een gebruiker
    }
    
    public function Sanitize($input) {
        //Maakt gebruikersinvoer schoon
        
        $input = filter_var($input, FILTER_SANITIZE_STRING);
        return $input;
        
    }
    
    public function Hash($pass) {
        // Hasht het wachtwoord
        
        $options = [
        'cost' => 15,
        ];
        return password_hash($pass, PASSWORD_DEFAULT, $options); //Retourneer hash
        
    }
    
    public function checkPassword($user, $pass) {
        //Check het wachtwoord van een gebruiker
        
        global $pdo; //Zoek naar PDO buiten de scope van de functie
        
        $sth = $pdo->prepare("SELECT * FROM staff WHERE username = :username"); //Bereid query voor
        $sth->bindParam(':username', $user, PDO::PARAM_STR); //Stel variabele in
        $sth->execute(); //Voer query uit
        $result = $sth->fetch(PDO::FETCH_ASSOC); //Sla resultaat op als array
        
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
        
        //Zoek variabele buiten de functie, in de global scope.
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
        
    } // Einde logfunctie
    
}

$security = new Security; //Open de class voor toekomstig gebruik met $security->functie();

?>