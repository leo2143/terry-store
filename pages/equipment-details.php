<?PHP

$productId = $_GET["id"] ?? 0;

$item = Equipment::getByid($productId);


?>

<section class=" mt-5 d-flex flex-column gap-5 mb-5 container sheika-container pb-5 rounded-3">
  <div class="container-md buy-product-container d-flex flex-column flex-md-row mt-md-5 ">

    <div id="image-product" class="container">
      <img class="img-fluid
          " src="images/items/<?= $item->getImage(); ?>" alt="imagen del producto">
    </div>
    <div class="container d-flex flex-column justify-content-center align-items-center" id="info-container">
      <div class="container pt-2  pb-4" title="title product and price">
        <h2><?= $item->getName() ?></h2>
        <h3><img src="images/rupia.png" alt="rupia" width="30" height="40" class="me-2"> <?= $item->getPrice(); ?></h3>
      </div>

      <div class="container d-flex flex-column gap-2  " id="botones">
        <button class="btn btn-custom btn-lg">Comprar</button>
        <button class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar al Carrito</button>
      </div>
    </div>
  </div>

  <div class="container" id="description">
    <h3>Descripcion</h3>
    <p><?= $item->getDescription(); ?></p>

  </div>

  <div class="container d-flex flex-column gap-3">

    <h3>Especificaciones</h3>

    <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-pokeNfts-green">
      <div class="border-end border-dark text-center w-50">
        <h4>Rareza</h4>
      </div>
      <div class="text-center justify-content-center w-50">
        <p class="text-center mt-2 fs-4"><?= $item->getRarity()->getName(); ?>
        </p>
      </div>
    </div>
    <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-principal-50">
      <div class="border-end border-dark text-center w-50">
        <h4>Material</h4>
      </div>
      <div class="text-center justify-content-center w-50">
        <p class="text-center mt-2 fs-4"><?= $item->getMaterial(); ?></p>
      </div>
    </div>
    <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-pokeNfts-green">
      <div class="border-end border-dark text-center w-50">
        <h4>Habilidad</h4>
      </div>
      <div class="text-center justify-content-center w-50">
        <p class="text-center mt-2 fs-4"><?= $item->getAbility(); ?></p>
      </div>
    </div>
    <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-principal-50">
      <div class="border-end border-dark text-center w-50">
        <h4>Fecha de ingreso</h4>
      </div>
      <div class="text-center justify-content-center w-50">
        <p class="text-center mt-2 fs-4"><?= $item->getDateAdded(); ?></p>
      </div>
    </div>
    <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-pokeNfts-green">
      <div class="border-end border-dark text-center w-50">
        <h4>Tipo</h4>
      </div>
      <div class="text-center justify-content-center w-50">
        <p class="text-center mt-2 fs-4"><?= $item->getType(); ?></p>
      </div>
    </div>
    <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-principal-50">
      <div class="border-end border-dark text-center w-50">
        <h4>Categoria</h4>
      </div>
      <div class="text-center justify-content-center w-50">
        <p class="text-center mt-2 fs-4"><?= $item->getCategory()->getName(); ?></p>
      </div>
    </div>
    <div>
      <h4>Features</h4>
      <?php foreach ($item->getFeatures() as $feature) { ?>
        <p><?= $feature->getName() ?></p>
      <?php } ?>

    </div>
  </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 rounded-4 shadow-lg bg-dark text-light">
      <div class="modal-header border-0">
        <h3 class="modal-title fs-4" id="exampleModalLabel">¡Producto agregado al carrito!</h3>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center gap-4 py-4">
        <button type="button" class="btn btn-custom w-75 py-2 fw-semibold" onclick="window.location.href='index.php'">
          Ir al carrito
        </button>
        <button type="button" class="btn btn-outline-light w-75 py-2 fw-semibold" data-bs-dismiss="modal">
          Seguir comprando
        </button>
      </div>
    </div>
  </div>
</div>