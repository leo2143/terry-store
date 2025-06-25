<section class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card bg-dark text-light border-0 shadow rounded-4 p-4">
        <h1 class="text-center mb-4 text-sheika-style">Iniciar sesión</h1>

        <?php if (isset($_GET['error'])): ?>
          <div class="alert alert-danger text-center">
            <?= htmlspecialchars($_GET['error']) ?>
          </div>
        <?php endif; ?>

        <form action="actions/auth_login.php" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Usuario</label>
            <input type="text" class="form-control form-control-custom" id="username" name="username" required>
          </div>

          <div class="mb-4">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control form-control-custom" id="password" name="password" required>
          </div>

          <button type="submit" class="btn btn-custom w-100">Ingresar</button>
        </form>
      </div>
    </div>
  </div>
</section>
