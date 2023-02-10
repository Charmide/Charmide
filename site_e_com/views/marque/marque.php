<?php
$path = ($_SERVER['DOCUMENT_ROOT']);
include_once $path . '/init.php'; 

include_once ROOT . 'views/includes/head.php'; 
?>

<body>
    <?php include_once ROOT . 'views/includes/navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <?php foreach($marques as $marque) : ?>
                <div class="m-3">
                    <p><?= $marque->name ?></p>
                    <a href="<?= URL ?>src/Controller/MarqueController.php?param=deleteMarque&id=<?= $marque->id?>">Supprimer</a>
                    <a href="<?= URL ?>src/Controller/MarqueController.php?param=showMarque&id=<?= $marque->id?>">Voir</a>
                    <a href="<?= URL ?>src/Controller/MarqueController.php?param=editMarque&id=<?= $marque->id?>">Edit</a>
                </div>
                <?php endforeach ?>
            </div>
            <div class="col-6">
                <a href="<?= URL ?>src/Controller/MarqueController.php?param=addMarque">Ajouter</a>
                
            </div>

        </div>


    </div>


    <?php include_once ROOT . 'views/includes/footer.php'; ?>
</body>

</html>