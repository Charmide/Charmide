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
                <h4 class="bg-light"></h4>
                <?php foreach($produits as $produit) : ?>
                <div class="m-3">
                    <td><?= $produit->id ?></td>
                    <td><?= $produit->name ?></td>
                    <td><?= $produit->ref ?></td>
                    <td><?= $produit->prix_unit ?></td>
                    <td><?= $produit->quantity ?></td>
                    <td><?= $produit->marque_id ?></td> 
                    <td><?= $produit->image ?></td>

                    <td>
                    <a href="<?= URL ?>src/Controller/ProduitController.php?param=deleteProduit&id=<?= $produit->id?>">Supprimer</a>
                    <a href="<?= URL ?>src/Controller/ProduitController.php?param=showProduit&id=<?= $produit->id?>">Voir</a>
                    <a href="<?= URL ?>src/Controller/ProduitController.php?param=editProduit&id=<?= $produit->id?>">Edit</a>
                    </td>
                </div>
                <?php endforeach ?>
            </div>
            <div class="col-6">
                <a href="<?= URL ?>src/Controller/ProduitController.php?param=addProduit">Ajouter</a>
                
            </div>

        </div>


    </div>


    <?php include_once ROOT . 'views/includes/footer.php'; ?>
</body>

</html>