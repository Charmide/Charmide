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
                <?php foreach($tvas as $tva) : ?>
                <div class="m-3">
                    <p><?= $tva->name ?></p>
                    <p><?= $tva->taux ?></p>
                    <a href="<?= URL ?>src/Controller/TvaController.php?param=deleteTva&id=<?= $tva->id?>">Supprimer</a>
                    <a href="<?= URL ?>src/Controller/TvaController.php?param=showTva&id=<?= $tva->id?>">Voir</a>
                    <a href="<?= URL ?>src/Controller/TvaController.php?param=editTva&id=<?= $tva->id?>">Edit</a>
                </div>
                <?php endforeach ?>
            </div>
            <div class="col-6">
                <a href="<?= URL ?>src/Controller/TvaController.php?param=addTva">Ajouter</a>
                
            </div>

        </div>


    </div>


    <?php include_once ROOT . 'views/includes/footer.php'; ?>
</body>

</html>