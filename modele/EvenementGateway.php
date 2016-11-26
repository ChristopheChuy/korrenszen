<?php
class EvenementGateway{
    private $bdd;
    function __construct(){
        $this->bdd = new PDO(DSN, USERNAME, MDP);
        }
    
    public function getAllEvent() {
            $req =  $this->bdd->prepare('SELECT nom_evenement FROM evenement;');
            $req->execute();
            $req -> fetchAll();
    }
    public function getEventByType($id_type){
        $req =  $this->bdd->prepare('SELECT nom_evenement FROM evenement where id_type = :id_type');
            $req->execute(array(
               ':id_type' => $id_type,
            ));
             return $req -> fetchAll();
    }
  
}
?>