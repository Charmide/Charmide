<?php
namespace App\Model\Repository;

use App\Core\BdManager;


$path = $_SERVER['DOCUMENT_ROOT'];
include_once  $path . '/src/Core/BdManager.php';

class ProduitRepository
{
    private $bdmanager;

    public function __construct(){
        $this->bdmanager = new BdManager();
    }

    public function findAll(){
        $result = $this->bdmanager->findAll('produit');
        return $result;
    }
/**
 * methode pour ajouter un enregistrement a la table produit
 *
 * @param mixed $post le tableau representera le $_POST
 * @return void
 */
    public function add($post){
        $this->bdmanager->add($post, 'produit');
    }
    public function delete($id){
        $this->bdmanager->delete('produit', $id);
        
    }

    public function find(int $id){
        $result = $this->bdmanager->find('produit', $id);

        return $result;
        
    }

    public function edit($post , $id){
        $this->bdmanager->edit($post,'produit',$id);
    }
}