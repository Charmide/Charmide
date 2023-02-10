<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once  $path . '/init.php';


?>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= URL ?>/index.php">Index</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>/category/category.php">categorie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>/article/article.php">Article</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>/user/register.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>/user/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>/user/logout.php">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>/user/profil.php">profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>/user/home.php">home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= URL ?>src/Controller/MarqueController.php?param=liste">Marque</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>src/Controller/TvaController.php?param=liste">Tva</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>src/Controller/ProduitController.php?param=liste">Produit</a></li>
          </ul>
        </li>
       
      </ul>
    </div>
  </div>
  <script rel="stylesheet" href="<?=URL ?>public/assets/css/bootstrap.min.css"></script>
</nav>