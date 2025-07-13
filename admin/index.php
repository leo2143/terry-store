<?PHP
require_once '../functions/Autoload.php';



$section = isset($_GET["page"]) ? $_GET["page"] : "dashboard";

$vista = View::view_validation($section);

$userData = $_SESSION['loggedIn'] ?? false;

Authentication::verify($vista->getRestricted());

$isAdmin = Authentication::isAdmin();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Uncial Antiqua:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=EB Garamond:wght@400&display=swap" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
    <script src="../scripts/main.js" defer></script>
    <link rel="stylesheet" href="../styles/style.css">
    <title><?= $vista->getTitle() ?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-tecno">
            <div class="container-fluid">

                <!-- Botón toggler solo visible en mobile -->
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminOffcanvas"
                    aria-controls="adminOffcanvas">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar desktop -->
                <div class="collapse navbar-collapse justify-content-between d-none d-lg-flex">
                    <ul class="navbar-nav">
                        <?php if ($userData && $isAdmin) { ?>
                            <li class="nav-item"><a class="nav-link" href="index.php">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?page=admin_equipments">Admin equipamientos</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?page=admin_comments">Admin comentarios</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?page=admin_categories">Admin categorias</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?page=admin_rarities">Admin rarezas</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?page=admin_features">Admin caracteristicas</a></li>
                        <?php } ?>
                    </ul>

                    <ul class="navbar-nav">
                        <?php if ($userData) { ?>
                            <li class="nav-item"><a class="nav-link" href="../index.php?page=user-panel">👤 <?= $userData["full_name"] ?></a></li>
                        <?php } ?>
                        <li class="nav-item"><a class="nav-link" href="../index.php">Página principal</a></li>
                        <li class="nav-item <?= !$userData ? "" : "d-none" ?>">
                            <a class="nav-link" href="index.php?page=login">Login</a>
                        </li>
                        <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                            <a class="nav-link fw-bold" href="actions/auth_logout.php">Logout</a>
                        </li>
                    </ul>
                </div>

                <!-- Offcanvas solo en mobile -->
                <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="adminOffcanvas" aria-labelledby="adminOffcanvasLabel">
                    <div class="offcanvas-header">
                        <a class="offcanvas-title" id="adminOffcanvasLabel">Panel de administración</a>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav">
                            <?php if ($userData && $isAdmin) { ?>
                                <li class="nav-item"><a class="nav-link" href="index.php">Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?page=admin_equipments">Admin equipamientos</a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?page=admin_comments">Admin comentarios</a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?page=admin_categories">Admin categorias</a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?page=admin_rarities">Admin rarezas</a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?page=admin_features">Admin carracteristicas</a></li>
                                <li class="nav-item"><a class="nav-link" href="../index.php?page=user-panel">👤 <?= $userData["full_name"] ?></a></li>
                            <?php } ?>
                            <li class="nav-item"><a class="nav-link" href="../index.php">Página principal</a></li>
                            <li class="nav-item <?= !$userData ? "" : "d-none" ?>">
                                <a class="nav-link" href="index.php?page=login">Login</a>
                            </li>
                            <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                                <a class="nav-link fw-bold" href="actions/auth_logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>

    </header>



    <main>

        <?PHP

        require_once "pages/{$vista->getName()}.php";

        ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow-lg bg-dark text-light">
                    <div class="modal-header border-0">
                        <h2 class="modal-title fs-4" id="exampleModalLabel">¿Estás seguro que deseas eliminar este item?</h2>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body d-flex flex-column align-items-center gap-4 py-4">
                        <form action="actions/admin_delete.php" method="post" class="w-100 d-flex flex-column align-items-center gap-3">
                            <input type="hidden" name="id" id="item-id-to-delete">
                            <input type="hidden" name="entitie" id="item-entitie-to-delete">

                            <button type="submit" class="btn btn-custom w-75 py-2 fw-semibold">Eliminar</button>
                            <button type="button" class="btn btn-outline-light w-75 py-2 fw-semibold" data-bs-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-dark text-light py-4 mt-5 border-seconday-sheika ">
        <div class="container">
            <div class="row text-center text-md-start align-items-center g-4">

                <div class="col-12 col-md-4">
                    <h2 class="h4 fw-bold text-sheika-style">Terry Store</h2>
                    <p class="small">Tu tienda confiable en Hyrule. Armas, escudos y equipo con carisma bokoblin.</p>
                </div>

                <div class="col-12 col-md-4">
                    <h2 class="h4 text-uppercase text-sheika-style">Secciones</h2>
                    <ul class="list-unstyled">
                        <li><a href="index.php?page=about-terry" class="text-light text-decoration-none">Sobre Terry</a></li>
                        <li><a href="index.php?page=alumno" class="text-light text-decoration-none">Alumno</a></li>
                        <li><a href="index.php?page=about-terry#Faq" class="text-light text-decoration-none">Preguntas frecuentes</a></li>
                    </ul>
                </div>

                <div class="col-12 col-md-4 text-md-end">
                    <p class="mb-1">Creado por <strong>Leonardo Orellana</strong></p>
                    <div class="d-flex justify-content-center justify-content-md-end gap-3">
                        <a href="https://www.instagram.com/leo.orellana_/" target="_blank">
                            <img src="../images/footer/instagram-logo.svg" alt="Instagram" width="32">
                        </a>
                        <a href="https://www.linkedin.com/in/leonardo-orellana-998740222/" target="_blank">
                            <img src="../images/footer/linkeding-logo.svg" alt="LinkedIn" width="32">
                        </a>
                    </div>
                </div>

            </div>
            <hr class="border-secondary mt-4">
            <p class="text-center small m-0">&copy; 2025 Terry Store | Orellana leonardo.</p>
        </div>
    </footer>


</body>

</html>