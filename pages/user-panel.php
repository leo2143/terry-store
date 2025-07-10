<?php

// Verificar si el usuario está logueado
if (!isset($_SESSION['loggedIn'])) {
    Alert::add_Alert('warning', "Debe iniciar sesión para acceder a esta sección");
    header('Location: ../index.php?sec=login');
}

// Obtener compras del usuario
$userId = $_SESSION['loggedIn']['user_id'];
$purchases = Purchases::get_purchases_by_user($userId);

?>
<div class="container">
    <h1 class="text-center">Panel de Usuario</h1>

    <!-- Mostrar Alerts -->
    <?= Alert::get_alerts(); ?>

    <section class="purchase-history">
        <h2 class="my-5">Historial de Compras</h2>

        <?php if (empty($purchases)): ?>
            <p>No hay compras registradas.</p>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($purchases as $purchase): ?>
                            <tr>
                                <td><?= htmlspecialchars($purchase['purchase_date']) ?></td>
                                <td>$<?= number_format($purchase['total_amount'], 2) ?></td>
                                <!-- Vista corregida: -->
                                <td>
                                    <ul>
                                        <?php foreach (explode(', ', $purchase['items_detail']) as $item): ?>
                                            <li><?= htmlspecialchars($item) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </section>
</div>
</body>

</html>