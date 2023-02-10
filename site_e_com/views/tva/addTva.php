<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once  $path . '/init.php';

include_once ROOT . 'views/includes/head.php'; ?>
<body>
<?php include_once ROOT . 'views/includes/navbar.php'; ?>

<div class="container">
<h4 class= "my-2 text-denter">Ajouter une TVA</h4>
<a class="btn btn-primary m-3 float-end" href="<?= URL ?>src/Controller/TvaController.php?param=liste"><i class="fas fa-undo-alt"></i></a>
    <form action="<?= URL ?>src/Controller/TvaController.php?param=addTva" method= "post">

    <label for="name" class="label-control">Nom de la tva</label>

    <input type="text"  name="name" id="name" class="form-control" value="<?php if(isset($_POST["name"])){
        echo $_POST["name"];
    } ?>">

    <label for="name" class="label-control">Taux de la tva</label>

    <input type="number"  step="0,01"name="taux" id="taux" class="form-control">

    <button type="submit" class="btn btn-success m-2 w-25" value="Enregistrer">Ok</button>

        
    </form>
</div>
<?php if ($error) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif ?>

<?php include_once  ROOT . 'views/includes/footer.php'; ?>
</body>

</html>