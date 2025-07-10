<?php
$commentId = $_GET["id"] ?? 0;
$comment = null;

if ($commentId != 0) {
  $comment = Comment::getById($commentId);
}
?>
<div class="container">
  <div class="row justify-content-center mt-5 sheika-container">
    <div class="col-12">
      <div class="bg-secondary-light-20 border-0 p-4 shadow-sm">
        <form action="actions/admin_comments_acc.php" method="post" enctype="multipart/form-data">
          <?php if ($comment): ?>
            <input type="hidden" name="id" value="<?= $comment->getId(); ?>">
            <input type="hidden" name="equipment_id" value="<?= $comment->getEquipmentId(); ?>">

          <?php endif; ?>

          <div class="mb-3">
            <label for="username" class="form-label text-light">Nombre</label>
            <input type="text" class="form-control form-control-custom" id="username" name="username"
              value="<?= isset($comment) ? $comment->getUsername() : ""; ?>"
              placeholder="Link, Zelda, tú mismo…" required>
          </div>

          <div class="mb-3">
            <label for="rating" class="form-label text-light">Puntuación</label>
            <select class="form-select form-select-custom" id="rating" name="rating" required>
              <option value="">– Selecciona –</option>
              <?php
              for ($i = 5; $i >= 1; $i--) {
                $selected = (isset($comment) && $comment->getRating() == $i) ? 'selected' : '';
                echo "<option value=\"$i\" $selected>" . str_repeat("⭐", $i) . "</option>";
              }
              ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="content" class="form-label text-light">Tu reseña</label>
            <textarea class="form-control form-control-custom" id="content" name="content" rows="4"
              placeholder="¡Escribe tu experiencia con Terry!" required><?= isset($comment) ? $comment->getContent() : ""; ?></textarea>
          </div>

          <div class="mb-3 custom-file-upload">
            <?php if ($comment && $comment->getProfileImage()): ?>
              <label for="image" class="form-label text-light">Imagen actual</label>
              <input type="hidden" name="image" value="<?= $comment->getProfileImage(); ?>">
              <img src="../images/icons/<?= $comment->getProfileImage(); ?>" alt="foto perfil de <?= $comment->getUsername(); ?>" class="img-fluid mb-2">
            <?php endif; ?>
            <label for="image" class="btn btn-upload w-100 rounded-2">Subir imagen</label>
            <input type="file" id="image" name="image" accept="image/*">

          </div>

          <button type="submit" class="btn btn-custom w-100">Enviar comentario</button>
        </form>
      </div>
    </div>
  </div>
</div>