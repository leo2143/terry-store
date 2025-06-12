<?PHP
require_once '../class/Equipment.php';
require_once '../class/Categories.php';
require_once '../class/Rarities.php';
require_once '../class/features.php';
require_once '../class/Comment.php';
require_once '../class/View.php';
require_once '../class/Connection.php';


$section = isset($_GET["page"]) ? $_GET["page"] : "dashboard";

$vista = View::view_validation($section);

$equipmentSelected = isset($_GET['item']) ? $_GET['item'] : null;
if ($equipmentSelected) {
    $catalog = Equipment::getByType($equipmentSelected);
} else {
    $catalog = Equipment::getAll();
}


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
    <link rel="stylesheet" href="../styles/style.css">
    <title><?= $vista->getTitle() ?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-tecno">
            <div class="container-fluid pb-2">
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=admin_equipments">Administrar equipamientos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=admin_comments">Administrar comentarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=admin_categories">Administrar categorias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=admin_rarities">Administrar rarezas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=admin_features">Administrar features</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>



    <main>

        <?PHP

        require_once "pages/{$vista->getName()}.php";

        ?>

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