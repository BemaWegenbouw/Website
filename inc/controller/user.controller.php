<?php



class user {
    
    
    //je gebruikt de functie:   $trueorfalse    =  checkpassword($user,$pass)   dan komt er true of false uit
                            //       de functie controlleerd of de combinatie met pass en username true is
                        //                       
    
    public function checkPassword($user, $pass) {
        global $pdo;
global $config;
global $_POST;
include("inc/controller/db.controller.php");
include("inc/config.php");
$stmt=$pdo->prepare ("select * from staff where username = '$user'  AND password = '$pass'");
        $stmt->execute();
        



        while ($row=$stmt->fetch())
        { $usernam=$row["username"];
            $passw=$row["password"];
                $rank=$row["rank_id"];
       
       

         if ($passw==$pass && $usernam==$user){return true;}else {return false;}

         
         

} 
        
        
        
    }}

	



?>