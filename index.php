<?PHP

$ok_urls = [
  "home",
  "about-terry",
  "opinions",
  "products",
  "weapons",
  "clothes",
];

$section = isset($_GET["page"]) ? $_GET["page"] : "home";

if (!in_array($section, $ok_urls)) {
  $vista = "404";
}else{

$vista = $section;
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
  <title>Terry store</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-tecno">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=about-terry">Sobre-terry-store</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=opinions">Comentarios del Reino</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=products&item=all">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=products&item=weapons">Armas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=products&item=shield">Escudos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <main>

    <?PHP

    require_once "pages/$vista.php";

    ?>

  </main>

</body>

</html>