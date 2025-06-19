<?PHP
$comments = Comment::getAll();
?>
<section class="opinions-section container pb-5  pt-5">
  <div class="text-center mb-4">
    <h1 class="display-5 text-sheika-style">Comentarios del Reino</h1>
    <p class="  fst-italic text-light">¡Deja tu marca en las runas de Terry!</p>
  </div>

  <div class="glow-wrapper d-flex flex-column gap-4 align-items-center justify-content-center rounded-4 mt-5">
    <?php foreach ($comments as $comment): ?>
      <div class="opinions-container p-5 d-flex flex-column flex-lg-row align-items-lg-start align-items-center rounded-4 gap-3">

        <div class="opinions-title d-flex align-items-center gap-5">

          <img src="images/icons/<?= $comment->getProfileImage(); ?>.png" alt=<?= $comment->getProfileImage(); ?>>
        </div>
        <div class="opinions-text ps-lg-5 d-flex flex-column">
          <h2><?= $comment->getName(); ?></h2>

          <p>
            <?= $comment->getDescription(); ?>
          </p>

          <div class="opinions-stars-container d-flex gap-3">
            <?php for ($i = 0; $i < $comment->getStartsCount(); $i++): ?>
              <div class="star"></div>
            <?php endfor; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>

  <div class="row justify-content-center mt-5 sheika-container">
    <div class="col-12">
      <div class=" bg-secondary-light-20 border-0 p-4 shadow-sm">
        <h2 class=" mb-3">Deja tu comentario</h2>
        <form action="index.php?page=formulario&action=add" method="post">
          <div class="mb-3">
            <label for="name" class="form-label text-light">Nombre</label>
            <input type="text" class="form-control form-control-custom" id="name" name="name" placeholder="Link, Zelda, tú mismo…" required>
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
            <label for="commentText" class="form-label text-light">Tu reseña</label>
            <textarea class="form-control form-control-custom" id="commentText" name="commentText" rows="4" placeholder="¡Escribe tu experiencia con Terry!" required></textarea>
          </div>


          <div class="mb-3 custom-file-upload">
            <label for="commentImage" class="btn btn-upload w-100 rounded-2">Subir imagen</label>
            <input type="file" id="commentImage" name="commentImage" accept="image/*">
          </div>

          <button type="submit" class="btn btn-custom w-100">Enviar comentario</button>
        </form>
      </div>
    </div>
  </div>




</section>