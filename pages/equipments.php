<?php

$item = $_GET["item"] ?? null;
$toSpanish = "";
switch ($equipmentSelected) {
  case "sword":
    $toSpanish = "espadas";
    break;
  case "shield":
    $toSpanish = "escudos";
    break;
  default:
    $toSpanish = "Catalogo completo";
}
$equipmentSelected = "sword" ?? "espadas";

?>

<div class="container py-5 my-5">
  <h1 class="display-5 mb-4 text-center text-sheika-style"><?= $toSpanish ?></h1>
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3  g-4">

    <?php foreach ($catalog as $item): ?>

      <a class="col" href="index.php?page=equipment-details&id=<?= $item->getId() ?>">
        <div class="card-1">
          <div class="card h-100 text-center">
            <img src="images/traveler-icon.png" class="card-img-top card-img-back  position-absolute z-n1" alt="imagen de fondo en productos">
            <img src="images/items/<?= $item->getImage() ?>" class="card-img-top" alt="<?= $item->getName(); ?>">
            <div class="card-body">
              <h2 class="card-title text-sheika-style"><?= $item->getname(); ?></h2>
              <p class="text-start equipments-description mb-sm-2 mb-xl-0"><?= $item->reduceDescription() ?></p>
              <p class="fw-bold pt-3 pb-3 card-font"> <img src="images/rupia.png" alt="rupia" width="30" height="40" class="me-2">
                <?= $item->getPrice(); ?></p>
            </div>
          </div>
        </div>
      </a>
    <?php endforeach; ?>

  </div>
</div>