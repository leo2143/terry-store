<?php
require_once 'class/equipment.php';


$item = $_GET["item"] ?? null;
?>

<div class="container py-5 my-5">
  <h2 class="display-5 mb-4 text-center text-sheika-style"><?= $equipmentSelected ?? "Catalogo completo" ?></h2>
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3  g-4">

    <?php foreach ($catalog as $item): ?>

      <a class="col" href="index.php?page=equipment-details&id=<?= $item->getId() ?>">
        <div class="card-1">
          <div class="card h-100 text-center">
            <img src="images/traveler-icon.png" class="card-img-top card-img-back  position-absolute z-n1" alt="">
            <img src="images/items/<?= $item->getImage() ?>" class="card-img-top" alt="<?= $item->getName(); ?>">
            <div class="card-body">
              <h3 class="card-title h5 text-sheika-style"><?= $item->getname(); ?></h3>
              <p class="text-start equipments-description mb-sm-2 mb-xl-0"><?= $item->reduceDescription() ?></p>
              <p class="fw-bold h2 pt-3 pb-3"> <img src="images/rupia.png" alt="rupia" width="30" height="40" class="me-2">
                <?= $item->getPrice(); ?></p>
            </div>
          </div>
        </div>
      </a>
    <?php endforeach; ?>

  </div>
</div>