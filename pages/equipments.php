<?php
require_once 'class/equipment.php';


$item = $_GET["item"] ?? null;
?>

<div class="container py-5 my-5">
  <h2 class="mb-4 text-center"><?= $equipmentSelected ?? "Catalogo completo" ?></h2>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

    <?php foreach ($catalog as $item):?>

      <div class="col">
        <div class="card-1">
          <div class="card h-100 text-center">
            <img src="images/traveler-icon.png" class="card-img-top card-img-back  position-absolute z-n1" alt="">
            <img src="images/items/<?= $item->getImage() ?>" class="card-img-top" alt="<?= $item->getName(); ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $item->getname(); ?></h5>
              <p class="fw-bold"> <img src="images/rupia.png" alt="icono" width="20" height="30" class="me-2">
                <?= $item-> getPrice(); ?></p>
              <a class="btn btn-custom w-100" href="index.php?page=equipment-details&id=<?= $item->getId() ?>">Comprar</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>
