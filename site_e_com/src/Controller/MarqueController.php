<?php
use App\Model\Repository\MarqueRepository;
$path = $_SERVER['DOCUMENT_ROOT'];
include_once  $path . '/init.php';
include_once  $path . '/src/Model/Repository/MarqueRepository.php';

$marqRepo = new MarqueRepository();

// On récupère le param dans l'URL
if($_GET['param']){
    $param = $_GET['param'];
}




switch ($param){

    case 'liste':
        $marques = $marqRepo->findAll();
        include_once ROOT . "views/marque/marque.php";
        break;
    
    case 'addMarque';
    // on affiche un formulaire pour ajouter
    if($_POST){
        $marqRepo->add($_POST);
        header("location: MarqueController.php?param=liste");
    }
    include_once ROOT . "views/marque/addMarque.php";
    break;
    case "deleteMarque":
        $id = $_GET['id'];
        $marqRepo->delete($id);
        header("location: MarqueController.php?param=liste");
        break;

        case "showMarque":
            $id = $_GET['id'];
            $marque = $marqRepo->find($id);
            include_once ROOT . "views/marque/showMarque.php";
            break;

    case 'editMarque';
    $id = $_GET['id'];
    //je recupere l enregistrement a modifier pour completer les inputs du formulaire
    // la recuperation ce fait avant la modification
    $marque = $marqRepo->find($id);
    if($_POST){
        $marqRepo->edit($_POST, $id);
        header("location: MarqueController.php?param=liste");
    }
    include_once ROOT . "views/marque/editMarque.php";
    break; 
}

