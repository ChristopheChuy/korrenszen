<?php
class TypeGateway{
    private $bdd;
    function __construct(){
        $this->bdd = new PDO(DSN, USERNAME, MDP);
        }
    
   
    public function getNbCentreInteretByType($id_type){
        $req =  $this->bdd->prepare('SELECT (SELECT COUNT(*) FROM evenement WHERE evenement.id_type = 1)+ (SELECT COUNT(*) from point_interet WHERE point_interet.id_type = 1) AS SumCount');
            $req->execute(array(
               ':id_type' => $id_type,
            ));
             return $req -> fetchAll();
    }
    
  
}
?>
