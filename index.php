<?PHP
require_once 'class/Equipment.php';
require_once 'class/View.php';


$section = isset($_GET["page"]) ? $_GET["page"] : "home";

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
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Uncial Antiqua:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=EB Garamond:wght@400&display=swap" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/style.css">
  <title><?= $vista->getTitle() ?></title>
</head>

<body>

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
            <a class="nav-link" href="index.php?page=about-terry">Sobre terry</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=opinions">Comentarios del Reino</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=equipments">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=equipments&item=Arma">Arma</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=equipments&item=Escudo">Escudo</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <main>

    <?PHP

    require_once "pages/{$vista->getName()}.php";

    ?>

  </main>
  <footer class="bg-footer ">
    <div
      class="container bg-footer text-light text-center d-flex flex-column justify-content-between align-items-center p-5 fw-medium fs-4 flex-lg-row">
      <div class="d-flex justify-content-center gap-5 align-items-center text-center mb-1">
        <div class="">
          <a class="m-0" href="https://www.instagram.com/leo.orellana_/">
            <img class="img-fluid" src="images/footer/instagram-logo.svg" alt="icono de instagram" />
          </a>
        </div>
        <div class="">
          <p class="m-0">Leonardo Orellana</p>
        </div>
        <div class="">
          <a class="m-0" href="https://www.linkedin.com/in/leonardo-orellana-998740222/?originalSubdomain=ar">
            <img class="img-fluid" src="images/footer/linkeding-logo.svg" alt="linkedin logo" />
          </a>
        </div>
      </div>
      <div class="">
        <img class="img-fluid rounded-5" src="images/footer/foto-de-mi.svg" alt="foto retrato propia" />
      </div>
      <div class="">
        <div class="">
          <p class="m-0">leonardo.orellana@davinci.edu.ar</p>
        </div>
      </div>
    </div>
  </footer>

</body>

</html>