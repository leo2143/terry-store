<?php
Authentication::verify(2); // Asegura que solo admins accedan
$userData = $_SESSION['loggedIn'];
?>

<div class="container my-5">
    <div class="p-4 rounded-3 border  shadow-sm">
        <h1 class="fs-2 mb-3">Bienvenido al Panel de Administración</h1>
        <p class="lead">
            Hola <strong><?= htmlspecialchars($userData['full_name']) ?></strong>,
            estás logueado como <span class="badge bg-secondary"><?= $userData['role'] ?></span>.
        </p>
        <p>Desde aquí podés gestionar el contenido de la tienda.</p>

        <hr>

        <div class="row mt-4 g-3">
            <div class="col-md-4">
                <a href="index.php?page=admin_equipments" class="btn btn-custom w-100 py-3">
                    Administrar Equipamientos
                </a>
            </div>
            <div class="col-md-4">
                <a href="index.php?page=admin_comments" class="btn btn-custom w-100 py-3">
                    Administrar Comentarios
                </a>
            </div>
            <div class="col-md-4">
                <a href="index.php?page=admin_categories" class="btn btn-custom w-100 py-3">
                    Administrar Categorías
                </a>
            </div>
            <div class="col-md-4">
                <a href="index.php?page=admin_rarities" class="btn btn-custom w-100 py-3">
                    Administrar Rarezas
                </a>
            </div>
            <div class="col-md-4">
                <a href="index.php?page=admin_features" class="btn btn-custom w-100 py-3">
                    Administrar Features
                </a>
            </div>
            <div class="col-md-4">
                <a href="../index.php" class="btn btn-outline-secondary w-100 py-3">
                    Volver al sitio
                </a>
            </div>
        </div>
    </div>
</div>
