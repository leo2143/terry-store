<?php
// echo "<pre>";

// print_r($_GET);

// echo "</pre>";
$escudos = [
  [
    "nombre" => "Escudo de Madera",
    "categoria" => "Escudo ligero",
    "rareza" => "Común",
    "material" => "Madera hyliana tratada",
    "habilidad" => "Ideal para principiantes",
    "descripcion" => "Fácil de conseguir, fácil de romper. Pero Terry asegura que este en particular tiene 'historia'. ¿Será por las manchas de sopa?",
    "precio" => 80,
    "fecha_ingreso" => "2025-04-08",
    "imagen" => "shields/traveler_shield.png"
  ],
  [
    "nombre" => "Escudo del Soldado",
    "categoria" => "Escudo medio",
    "rareza" => "Raro",
    "material" => "Aleación de hierro y cuero",
    "habilidad" => "Alta durabilidad, resistente al fuego",
    "descripcion" => "Usado por los soldados de Hyrule en tiempos de paz y guerra. Terry dice que lo ganó en una carrera de pollos.",
    "precio" => 240,
    "fecha_ingreso" => "2024-04-08",
    "imagen" => "shields/soldier_shield.png"
  ],
  [
    "nombre" => "Escudo del Caballero",
    "categoria" => "Escudo pesado",
    "rareza" => "Épico",
    "material" => "Acero hyliano pulido",
    "habilidad" => "Bloqueo perfecto causa retroceso",
    "descripcion" => "Diseñado para los caballeros élite. Terry afirma que este modelo puede 'rebotar flechas'. No lo probamos… todavía.",
    "precio" => 380,
    "fecha_ingreso" => "2025-05-08",
    "imagen" => "shields/knight-shield.png"
  ],
  [
    "nombre" => "Escudo Real",
    "categoria" => "Escudo pesado",
    "rareza" => "Legendario",
    "material" => "Oro forjado con alma de guardián",
    "habilidad" => "Resiste todos los tipos de daño",
    "descripcion" => "Un escudo digno de la realeza. Solo unos pocos lo han blandido… y ahora Terry lo tiene en su carrito. Increíble, ¿no?",
    "precio" => 500,
    "fecha_ingreso" => "2024-02-08",
    "imagen" => "shields/royal-shield.png"
  ],
  [
    "nombre" => "Escudo Boko",
    "categoria" => "Escudo improvisado",
    "rareza" => "Muy común",
    "material" => "Madera y huesos",
    "habilidad" => "Ligero pero se rompe con facilidad",
    "descripcion" => "Hecho por bokoblins con amor (o furia). Ideal para una pelea rápida o como bandeja de picnic, según Terry.",
    "precio" => 50,
    "fecha_ingreso" => "2024-12-08",
    "imagen" => "shields/boko-shield.png"
  ],
  [
    "nombre" => "Escudo Boko Puntiagudo",
    "categoria" => "Escudo ofensivo",
    "rareza" => "Poco común",
    "material" => "Madera y clavos oxidados",
    "habilidad" => "Hace daño al ser embestido",
    "descripcion" => "Una mezcla entre escudo y trampa de bricolaje bokoblin. Terry lo recomienda para 'disuasión persuasiva'.",
    "precio" => 120,
    "fecha_ingreso" => "2024-07-08",
    "imagen" => "shields/spiked-boko-shield.png"
  ],
  [
    "nombre" => "Escudo Lizal Reforzado",
    "categoria" => "Escudo medio",
    "rareza" => "Raro",
    "material" => "Caparazón endurecido con huesos",
    "habilidad" => "Gran defensa contra ataques físicos",
    "descripcion" => "Los lizalfos no bromean cuando se trata de defensa. Este escudo es grueso, feo… y tremendamente efectivo. Palabras de Terry.",
    "precio" => 260,
    "fecha_ingreso" => "2025-09-07",
    "imagen" => "shields/reinforced-lizal-shield.png"
  ]
];
$espadas = [
  [
    "nombre" => "Mandoble Real",
    "categoria" => "Espada pesada",
    "rareza" => "Legendaria",
    "material" => "Acero real de Hyrule",
    "habilidad" => "Gran daño de área",
    "descripcion" => "Un mandoble reservado para los campeones de la realeza. Según Terry, fue usado para cortar una montaña en dos. Nadie lo ha confirmado, pero él lo dice muy convencido.",
    "precio" => 700,
    "fecha_ingreso" => "2024-02-08",
    "imagen" => "swords/royal_claymore.png"
  ],
  [
    "nombre" => "Espada Larga Plateada",
    "categoria" => "Espada larga",
    "rareza" => "Rara",
    "material" => "Acero plateado zora",
    "habilidad" => "Mayor alcance de ataque",
    "descripcion" => "Elegante y efectiva. Dicen que los Zora la usaban para defender sus dominios. Terry dice que la encontró en una fuente termal… con descuento.",
    "precio" => 400,
    "fecha_ingreso" => "2024-05-06",
    "imagen" => "swords/eightfold_longblade.png"
  ],
  [
    "nombre" => "Tridente de Escamas Luminiscentes",
    "categoria" => "Lanza legendaria",
    "rareza" => "Épica",
    "material" => "Escamas de Zora y cristal",
    "habilidad" => "Ataques rápidos bajo el agua",
    "descripcion" => "Forjada especialmente para la Campeona Mipha. Terry asegura que le llegó por 'vías misteriosas'.",
    "precio" => 620,
    "fecha_ingreso" => "2025-01-01",
    "imagen" => "swords/lightscale_trident.png"
  ],
  [
    "nombre" => "Espada del Caballero",
    "categoria" => "Espada de una mano",
    "rareza" => "Épica",
    "material" => "Acero hyliano reforzado",
    "habilidad" => "Versátil y equilibrada",
    "descripcion" => "Perfecta para caballeros de élite. Su diseño balanceado la hace ideal para combate cuerpo a cuerpo. Terry dice que combina con todo.",
    "precio" => 340,
    "fecha_ingreso" => "2025-01-07",
    "imagen" => "swords/knight_broadsword.png"
  ],
  [
    "nombre" => "Mandoble del Caballero",
    "categoria" => "Espada pesada",
    "rareza" => "Épica",
    "material" => "Acero hyliano endurecido",
    "habilidad" => "Ataques devastadores en área",
    "descripcion" => "Una versión más pesada del arma de los caballeros. Terry la promociona como 'para romper cosas… o convencer enemigos'.",
    "precio" => 420,
    "fecha_ingreso" => "2025-03-04",
    "imagen" => "swords/knight_claymore.png"
  ],
  [
    "nombre" => "Espada de Penumbra",
    "categoria" => "Espada maldita",
    "rareza" => "Legendaria",
    "material" => "Metal corrompido por Ganon",
    "habilidad" => "Daña enemigos… y al portador",
    "descripcion" => "Una espada envuelta en oscuridad. Tremendamente poderosa, pero peligrosa. Terry la guarda con guantes. Tú deberías también.",
    "precio" => 880,
    "fecha_ingreso" => "2025-07-02",
    "imagen" => "swords/gloom-sword.png"
  ],
  [
    "nombre" => "Cimitarra Gerudo",
    "categoria" => "Espada curva",
    "rareza" => "Rara",
    "material" => "Acero del desierto",
    "habilidad" => "Ataques rápidos con estilo",
    "descripcion" => "Usada por las guerreras Gerudo. Ágil, ligera y con filo impecable. Terry afirma que aprendió a bailar con una de estas. Nadie le cree.",
    "precio" => 380,
    "fecha_ingreso" => "2024-09-08",
    "imagen" => "swords/gerudo_scimitar.png"
  ],
  [
    "nombre" => "Quebrarrocas",
    "categoria" => "Martillo gigante",
    "rareza" => "Épica",
    "material" => "Minerales de Eldin",
    "habilidad" => "Aumenta el daño a enemigos con armadura",
    "descripcion" => "Un arma colosal capaz de destruir minerales con facilidad. Terry dice que una vez cocinó encima del metal tras una batalla. Todavía huele a carne asada.",
    "precio" => 510,
    "fecha_ingreso" => "2025-05-03",
    "imagen" => "swords/boulder_breaker.png"
  ]
];

$allItems = array_merge($espadas, $escudos);

$item = $_GET["item"] ?? null;

if ($item === "weapons") {
  $productTitle = "Armas";
  $catalog = $espadas;
} elseif ($item === "shield") {
  $productTitle = "Escudos";

  $catalog = $escudos;
} else {
  $productTitle = "Todos los items";

  $catalog = $allItems;
}

?>

<div class="container py-5">
  <h1 class="mb-4 text-center"><?= $productTitle ?></h1>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
    <!-- [item] => all-->

    <?php foreach ($catalog as $espada): ?>
      <div class="col">
        <div class="card h-100 text-center">
          <img src="images/traveler-icon.png" class="card-img-top card-img-back  position-absolute z-n1" alt="">
          <img src="images/items/<?= $espada['imagen']; ?>" class="card-img-top" alt="<?= $espada['nombre']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $espada['nombre']; ?></h5>
            <p class="fw-bold"> <img src="images/rupia.png" alt="icono" width="20" height="30" class="me-2">
              <?= $espada['precio']; ?></p>
            <button type="button" class="btn btn-custom w-100">
              Primary</button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>