  <?php


  ?>
  <div class="container">
    <div class="row justify-content-center mt-5 sheika-container">
      <div class="col-12">
        <div class=" bg-secondary-light-20 border-0 p-4 shadow-sm">
          <form action="actions/admin_comments_acc.php" method="post" enctype="multipart/form-data">
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
  </div>