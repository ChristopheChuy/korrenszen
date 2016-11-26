<?php
class UtilisateurGateway{
    private $bdd;
    function __construct(){
        $this->bdd = new PDO(DSN, USERNAME, MDP);
        }
     public function insert($email,$mdp,$pseudo) {
            $req =  $this->bdd->prepare('insert into utilisateur (email,mdp,pseudo) VALUES (:email,:mdp,:pseudo)');
            var_dump($req->execute(array(
               ':email' => $email,
                ':mdp' => $mdp,
                  ':pseudo' => $pseudo
            )));
    }
  
}
?>