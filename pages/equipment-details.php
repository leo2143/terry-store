<?PHP

$productId = $_GET["id"] ?? 0;

$item = Equipment::getByid($productId);
$comments = Comment::getByEquipmentId($productId);


?>

<section class=" mt-5 d-flex flex-column gap-5 mb-5 container sheika-container pb-5 rounded-3">
  <div class="container-md buy-product-container d-flex flex-column flex-md-row mt-md-5 ">

    <div id="image-product" class="container">
      <img class="img-fluid
          " src="images/items/<?= $item->getImage(); ?>" alt="imagen del producto">
    </div>
    <div class="container d-flex flex-column justify-content-center align-items-center" id="info-container">
      <div class="container pt-2  pb-4" title="title product and price">
        <h1><?= $item->getName() ?></h1>
        <h2><img src="images/rupia.png" alt="rupia" width="30" height="40" class="me-2"> <?= $item->getPrice(); ?></h2>
      </div>

      <!-- <div class="container d-flex flex-column gap-2  " id="botones">
        <button class="btn btn-custom btn-lg">Comprar</button>
        <button class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar al Carrito</button>
      </div> -->
      <form action="admin/actions/add_item_acc.php" method="GET" class="row ">
        <div class="col-6 d-flex align-items-center">
          <label for="q" class="fw-bold me-2">Cantidad:</label>
          <input type="number" class="form-control" value="1" name="q" id="q">
        </div>

        <div class="col-6">
          <input type="submit" value="AGREGAR A CARRITO" class="btn btn-custom btn-lg">
          <input type="hidden" value="<?= $id ?>" name="id" id="id">
        </div>
      </form>
    </div>
  </div>

  <div class="container" id="description">
    <h2>Descripcion</h2>
    <p><?= $item->getDescription(); ?></p>

  </div>

  <div class="container d-flex flex-column gap-3">

    <h2>Especificaciones</h2>

    <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-pokeNfts-green">
      <div class="border-end border-dark text-center w-50">
        <h3>Rareza</h3>
      </div>
      <div class="text-center justify-content-center w-50">
        <p class="text-center mt-2 fs-4"><?= $item->getRarity()->getName(); ?>
        </p>
      </div>
    </div>
    <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-principal-50">
      <div class="border-end border-dark text-center w-50">
        <h3>Material</h3>
      </div>
      <div class="text-center justify-content-center w-50">
        <p class="text-center mt-2 fs-4"><?= $item->getMaterial(); ?></p>
      </div>
    </div>
    <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-pokeNfts-green">
      <div class="border-end border-dark text-center w-50">
        <h3>Habilidad</h3>
      </div>
      <div class="text-center justify-content-center w-50">
        <p class="text-center mt-2 fs-4"><?= $item->getAbility(); ?></p>
      </div>
    </div>
    <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-principal-50">
      <div class="border-end border-dark text-center w-50">
        <h3>Fecha de ingreso</h3>
      </div>
      <div class="text-center justify-content-center w-50">
        <p class="text-center mt-2 fs-4"><?= $item->getDateAdded(); ?></p>
      </div>
    </div>
    <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-pokeNfts-green">
      <div class="border-end border-dark text-center w-50">
        <h3>Tipo</h3>
      </div>
      <div class="text-center justify-content-center w-50">
        <p class="text-center mt-2 fs-4"><?= $item->getType(); ?></p>
      </div>
    </div>
    <div class="item-1 d-flex gap-0 align-items-center justify-content-center text-center bg-principal-50">
      <div class="border-end border-dark text-center w-50">
        <h3>Categoria</h3>
      </div>
      <div class="text-center justify-content-center w-50">
        <p class="text-center mt-2 fs-4"><?= $item->getCategory()->getName(); ?></p>
      </div>
    </div>
  </div>
  <div class="container">
    <h2>Características</h2>
    <div class="d-flex gap-4 flex-wrap mt-3">
      <?php foreach ($item->getFeatures() as $feature) { ?>
        <div class="value-card p-2 ps-3 pe-3 rounded-pill">
          <p class="m-0 custom-text"><?= $feature->getName() ?></p>
        </div>
      <?php } ?>
    </div>
  </div>
  <div class="comentarios">
    <div class="text-center mb-4">
      <h2 class=" text-sheika-style">Comentarios del Reino</h2>
    </div>

    <div class="glow-wrapper d-flex flex-column gap-4 align-items-center justify-content-center rounded-4 mt-5">
      <?php foreach ($comments as $comment): ?>
        <div class="opinions-container p-5 d-flex flex-column flex-lg-row align-items-lg-start align-items-center rounded-4 gap-3">

          <div class="opinions-title d-flex align-items-center gap-5">

            <img src="images/icons/<?= $comment->getProfileImage(); ?>" alt=<?= $comment->getProfileImage(); ?> class="rounded-circle" height="120">
          </div>
          <div class="opinions-text ps-lg-5 d-flex flex-column">
            <h3><?= $comment->getUserName(); ?></h3>

            <p>
              <?= $comment->getContent(); ?>
            </p>

            <div class="opinions-stars-container d-flex gap-3">
              <?php for ($i = 0; $i < $comment->getRating(); $i++): ?>
                <div class="star"></div>
              <?php endfor; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
  <div class="row justify-content-center mt-5">
    <div class="col-12">
      <div class=" bg-secondary-light-20 border-0 p-4 shadow-sm">
        <h3 class=" mb-3">Deja tu comentario</h3>
        <form action="admin/actions/admin_comments_acc.php" method="post" enctype="multipart/form-data">
          <input type="hidden" class="form-control form-control-custom" id="equipment_id" name="equipment_id" value="<?= $item->getId(); ?>" required>

          <div class="mb-3">
            <label for="username" class="form-label text-light">Nombre</label>
            <input type="text" class="form-control form-control-custom" id="username" name="username" placeholder="Link, Zelda, tú mismo…" required>
          </div>

          <div class="mb-3">
            <label for="rating" class="form-label text-light">Puntuación</label>
            <select class="form-select form-select-custom" id="rating" name="rating" required>
              <option value="">– Selecciona –</option>
              <option value="5">⭐⭐⭐⭐⭐</option>
              <option value="4">⭐⭐⭐⭐</option>
              <option value="3">⭐⭐⭐</option>
              <option value="2">⭐⭐</option>
              <option value="1">⭐</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="content" class="form-label text-light">Tu reseña</label>
            <textarea class="form-control form-control-custom" id="content" name="content" rows="4" placeholder="¡Escribe tu experiencia con Terry!" required></textarea>
          </div>


          <div class="mb-3 custom-file-upload">
            <label for="image" class="btn btn-upload w-100 rounded-2">Subir imagen</label>
            <input type="file" id="image" name="image" accept="image/*">
          </div>

          <button type="submit" class="btn btn-custom w-100">Enviar comentario</button>
        </form>
      </div>
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