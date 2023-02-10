<?php

namespace App\Core;
use PDO;
class BdManager
{
   private $dsn = "mysql:host=localhost;dbname=site_e_com";

   private $userName = "root";

   private $password = "";

   public function getConnect(){
        $pdo = new PDO($this->dsn , $this->userName , $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
   }

   public function cleanFormulaire($string){
    $string = htmlspecialchars(strip_tags($string));
    return $string;

   }

   private function requete($sql , array $param = null){
    // je recupere une connection a la bdd
    $con = $this->getConnect();
    
    if($param !== null){
        //si le tableau n est pas vide j execute une requete prepare
        //pour ce proteger d une attaque par injection sql
        $stmnt = $con->prepare($sql);
        $stmnt->execute($param);
        return $stmnt;
    }else{
        //si il n y a pas de paramettre j execute une requete query
        return $con->query($sql);

    }
   }

   public function findAll($table){
// la requete pour recuperer ts les enregistrements d une table
    $sql = "SELECT * FROM $table";
    // jexecute la requete
    $stmnt = $this->requete($sql);
    //je recup les enregistrements en mode objet et non en tableau assoc
    return $stmnt->fetchAll(PDO::FETCH_OBJ);
   }
   public function add(array $tableau , string $table){
    //premier tableau vide pour stocker les key qui represente les colonnes
        $colonne = [];
    //tableau pour stocker les valeurs a inserer ds la bdd
        $valeurs = [];
    //un tableau pour stocker les params
        $params = [];
        
    foreach( $tableau as $key => $value) {
        $colonne [] = $key;
        $valeurs [] = '?';
        $params [] = $this->cleanFormulaire($value);// je netoie l entré du form
    }
    
    //Je transforme le tableau colonne en string
    $string_colonne = implode(",", $colonne);
    //Je transforme le tableau valeurs en string
    $string_valeurs  = implode(",", $valeurs);
    //Je cree la requete sql
    $sql = "INSERT INTO $table (". $string_colonne . ") VALUES (". $string_valeurs . ")";
    
    return $this->requete($sql,$params);

   }
   public function delete($table , $id){
    $id = $this->cleanFormulaire($id);
    $sql = "DELETE FROM $table WHERE id = $id ";
    $this->requete($sql);
}
   public function find($table , $id){
    //Je netoie le param $id recu par le formulaire
    $id = $this->cleanFormulaire($id);
    $sql = "SELECT * FROM $table WHERE id = $id ";
    $stmnt=$this->requete($sql);

    return $stmnt->fetch(PDO::FETCH_OBJ);
}

public function edit(array $tableau ,string $table ,$id){
    //Je cree un tableau pour recuperer les nom de colonne de la table qui sont le keys du $_POST
    $colonne = [];
    $param = [];
    $id = $this->cleanFormulaire($id);
    foreach($tableau as $key =>$value){
        $colonne[] = "$key = ?";
        $param[] = $this->cleanFormulaire($value);
    }
    $string_colonne = implode(",", $colonne);

    $sql ="UPDATE $table SET $string_colonne WHERE id = $id";

    $this->requete($sql ,$param);


}

}


