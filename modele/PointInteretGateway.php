<?php
class PointInteretGateway{
    private $bdd;
    function __construct($bdd){
        $this->bdd = new PDO(DSN, USERNAME, MDP);
        }
     public function insert() {
            $req =  $this->bdd->prepare('insert into point_interet (id_point,`nom_point`, `description`, `id_type`, `id_coordonnee`, `id_ville`) VALUES (NULL, :nom_point, :description, :id_type, :id_coordonnee, :id_ville)');
            $req->execute(array(
               ':nom_point' => 'gfhfgh1',
                ':description' => 'blablabla',
                  ':id_type' => 1,
                ':id_coordonnee' => 1,
                ':id_ville' => 1
            ));
    }
    public function getEventByType($id_type){
        $req =  $this->bdd->prepare('SELECT nom_point FROM point_interet where id_type = :id_type');
            $req->execute(array(
               ':id_type' => $id_type,
            ));
             return $req -> fetchAll();
    }
    

}
?>