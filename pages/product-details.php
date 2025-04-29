<?PHP 
require_once 'includes/catalog.php';

$productId = $_GET["id"] ?? 0;

$item = getById($productId);


?>

<section class=" mt-5 d-flex flex-column gap-5 mb-5 container sheika-container pb-5 rounded-3">
      <div class="container-md buy-product-container d-flex flex-column flex-md-row mt-md-5 ">

        <div id="image-product" class="container">
          <img class="img-fluid
          " src="images/items/<?= $item['imagen']; ?>" alt="imagen del producto">
        </div>
        <div class="container d-flex flex-column justify-content-center align-items-center" id="info-container">
        <div class="container pt-2  pb-4" title="title product and price">
          <h2><?= $item["nombre"] ?></h2>
          <h3><img src="images/rupia.png" alt="icono" width="20" height="30" class="me-2"> <?= $item["precio"] ?></h3>
        </div>

        <!-- <div class="container pb-4 d-flex flex-column gap-3" id="cuotas">
          <div>
          <div class="border rounded p-2 ">
            <img class="img-fluid" src="imgs/icons/visa-card.svg" alt="tarjeta visa icono">
            <img class="img-fluid" src="imgs/icons/master-card.svg" alt="tarjeta mastercard icono">
          </div>

          <div class="border rounded p-3">
            <p class="d-inline">6 cuotas sin interes de <strong>1600$</strong></p>
          </div>
        </div>
          <div>
            <a href="">Ver mas financiaciones</a>
          </div>
        </div> -->

        <div class="container d-flex flex-column gap-2  " id="botones">
          <button class="btn btn-custom btn-lg">Comprar</button>
          <button class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar al Carrito</button>
        </div>
      </div>
      </div>

      <div class="container" id="description">
        <h3>Descripcion</h3>
        <p><?= $item["descripcion"] ?></p>

      </div>

      <div class="container">

        <h3>Especificaciones</h3>

        <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-pokeNfts-green">
          <div class="border-end border-dark text-center w-50">
            <h4>Rareza</h4>
          </div>
          <div class="text-center justify-content-center w-50">
            <p class="text-center mt-2 fs-4"><?= $item["rareza"] ?>
            </p>
          </div>
        </div>
        <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-principal-50">
          <div class="border-end border-dark text-center w-50">
            <h4>Material</h4>
          </div>
          <div class="text-center justify-content-center w-50">
            <p class="text-center mt-2 fs-4"><?= $item["material"] ?></p>
          </div>
        </div>
        <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-pokeNfts-green">
          <div class="border-end border-dark text-center w-50">
            <h4>Habilidad</h4>
          </div>
          <div class="text-center justify-content-center w-50">
            <p class="text-center mt-2 fs-4"><?= $item["habilidad"] ?></p>
          </div>
        </div>
        <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-principal-50">
          <div class="border-end border-dark text-center w-50">
            <h4>Fecha de ingreso</h4>
          </div>
          <div class="text-center justify-content-center w-50">
            <p class="text-center mt-2 fs-4"><?= $item["fecha_ingreso"] ?></p>
          </div>
        </div>
        <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-pokeNfts-green">
          <div class="border-end border-dark text-center w-50">
            <h4>Tipo</h4>
          </div>
          <div class="text-center justify-content-center w-50">
            <p class="text-center mt-2 fs-4"><?= $item["tipo"] ?></p>
          </div>
        </div>
        <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-principal-50">
          <div class="border-end border-dark text-center w-50">
            <h4>Categoria</h4>
          </div>
          <div class="text-center justify-content-center w-50">
            <p class="text-center mt-2 fs-4"><?= $item["categoria"] ?></p>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title fs-5" id="exampleModalLabel">El producto fue agregado al carrito</h2>
          </div>
          <div class="modal-body gap-3 d-flex flex-column align-items-center">
            <button type="button" class="btn btn-custom  w-50" onclick="window.location.href='index.html'">Ir al carrito</button>
            <button type="button" class="btn btn-secondary w-50" data-bs-dismiss="modal">Seguir comprando</button>
          </div>
        </div>
      </div>
    </div>