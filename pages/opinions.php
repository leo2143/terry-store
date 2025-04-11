<?PHP
$comments = [
  [
    "name" => "Zelda — Princesa de Hyrule",
    "avatar" => "zelda",
    "comment" => "Confieso que desconfiaba al principio. Una tienda conectada a una piedra ancestral parecía inestable…pero me equivoqué.La interfaz es intuitiva, los pedidos llegan con precisión, y hasta recibí un escudo con detalles en oro gerudo.Terry ha logrado lo impensado: unir tradición y tecnología con un toque encantador.”",
    "cantidad-estrellas" => 4,
    "fecha_ingreso" => "2024-02-08",
  ],
  [
    "name" => "🦅 Revali — Campeón Rito",
    "avatar" => "revall",
    "comment" => "No suelo alabar a vendedores... pero admito que el sistema de Terry me sorprendió. Pude hacer el pedido desde el aire y me lo entregaron antes de aterrizar. Eso sí, la espada que pedí no es tan elegante como yo, pero bueno, eso ya es mucho pedir.”",
    "cantidad-estrellas" => 4,
    "fecha_ingreso" => "2024-02-08",
  ],
  [
    "name" => "Link — Guerro de Hyrule",
    "avatar" => "link",
    "comment" => "Recibí el escudo justo a tiempo antes de enfrentar a un Lynel. Aguantó más que el último que conseguí en el Castillo. El proceso fue tan rápido que casi me olvido de que lo pedí. Lo único que no entendí fue por qué venía con una calcomanía de la cara de Terry…",
    "cantidad-estrellas" => 4,
    "fecha_ingreso" => "2024-02-08"
  ]
]

?>
<section class="opinions-section container">



  <div class="glow-wrapper d-flex flex-column gap-4 align-items-center justify-content-center rounded-4 mt-5">
    <?php foreach ($comments as $comment): ?>
      <div class="opinions-container p-5 d-flex flex-column flex-lg-row align-items-lg-start align-items-center rounded-4 gap-3">

        <div class="opinions-title d-flex align-items-center gap-5">

          <img src="images/icons/<?= $comment['avatar'] . '.png' ?>" alt=<?= $comment['avatar'] ?>>
        </div>
        <div class="opinions-text ps-lg-5 d-flex flex-column">
          <h3><?= $comment['name']; ?></h3>

          <p>
            <?= $comment['comment'] ?>
          </p>

          <div class="opinions-stars-container d-flex gap-3">
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>




</section>