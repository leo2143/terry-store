<?php
require_once 'includes/catalog.php';


$item = $_GET["item"] ?? null;

if ($item === "weapons") {
  $productTitle = "Armas";
  $catalog =   getByCategory("Arma");
} elseif ($item === "shield") {
  $productTitle = "Escudos";
  $catalog =   getByCategory("Escudo");
} else {
  $productTitle = "Todos los items";
  $catalog = getAll();
}

?>

<div class="container py-5 my-5">
  <h1 class="mb-4 text-center"><?= $productTitle ?></h1>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

    <?php foreach ($catalog as $espada): ?>
      <div class="col">
        <div class="card-1">
          <div class="card h-100 text-center">
            <img src="images/traveler-icon.png" class="card-img-top card-img-back  position-absolute z-n1" alt="">
            <img src="images/items/<?= $espada['imagen']; ?>" class="card-img-top" alt="<?= $espada['nombre']; ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $espada['nombre']; ?></h5>
              <p class="fw-bold"> <img src="images/rupia.png" alt="icono" width="20" height="30" class="me-2">
                <?= $espada['precio']; ?></p>
              <a class="btn btn-custom w-100" href="index.php?page=product-details&id=<?= $espada["id"] ?>">Comprar</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>
