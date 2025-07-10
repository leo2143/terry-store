<?php
$items = Cart::getCart();
$userData = $_SESSION['loggedIn'];
?>

<h1 class="text-center fs-2 my-5">Resumen de compra</h1>

<div class="container my-4">
    <!-- Datos del comprador -->
    <div class="mb-4 p-3 border rounded-3">
        <h2 class="h5 mb-3">Datos del comprador</h2>
        <div class="row">
            <div class="col-12 col-md-4">
                <p><strong>Nombre completo:</strong> <?= $userData['full_name'] ?></p>
            </div>
            <div class="col-12 col-md-4">
                <p><strong>Usuario:</strong> <?= $userData['username'] ?></p>
            </div>
            <div class="col-12 col-md-4">
                <p><strong>Email:</strong> <?= User::getByUsername($userData['username'])->getEmail() ?></p>
            </div>
        </div>
    </div>

    <?php if (count($items)) { ?>
        <form action="admin/actions/checkout_confirm.php" method="POST">
            <div class="table-responsive">
                <table class="table align-middle text-center">
                    <thead class="">
                        <tr>
                            <th width="15%">Portada</th>
                            <th>Producto</th>
                            <th width="15%">Cantidad</th>
                            <th class="text-end" width="15%">Precio Unitario</th>
                            <th class="text-end" width="15%">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $id => $item) { ?>
                            <tr>
                                <td>
                                    <img src="images/items/<?= $item['image'] ?>" alt="Imagen de <?= $item['product'] ?>" class="img-fluid rounded" style="max-width: 100px;">
                                </td>
                                <td>
                                    <h2 class="h6"><?= $item['product'] ?></h2>
                                    <small class="text-muted"><?= $item['title'] ?? '' ?></small>
                                </td>
                                <td><?= $item['quantity'] ?></td>
                                <td class="text-end">$<?= number_format($item['price'], 2, ",", ".") ?></td>
                                <td class="text-end">$<?= number_format($item['quantity'] * $item['price'], 2, ",", ".") ?></td>
                            </tr>
                        <?php } ?>
                        <tr class="fw-bold">
                            <td colspan="4" class="text-end py-3">Total a pagar:</td>
                            <td class="text-end py-3">$<?= number_format(Cart::totalPrice(), 2, ",", ".") ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-custom btn-lg">Pagar</button>
            </div>
        </form>
    <?php } else { ?>
        <div class="alert alert-warning text-center p-4 rounded-3">
            <h2 class="h5">No hay productos para finalizar la compra</h2>
        </div>
    <?php } ?>
</div>