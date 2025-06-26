<?php
$items = Cart::getCart();
?>

<h1 class="text-center fs-2 my-5">Carrito de compras</h1>

<div class="container my-4">
    <?php if (count($items)) { ?>
        <form action="admin/actions/update_items_acc.php" method="POST">
            <div class="table-responsive">
                <table class="table align-middle text-center">
                    <thead class="">
                        <tr>
                            <th width="15%">Portada</th>
                            <th>Producto</th>
                            <th width="15%">Cantidad</th>
                            <th class="text-end" width="15%">Precio Unitario</th>
                            <th class="text-end" width="15%">Subtotal</th>
                            <th class="text-end" width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $id => $item) { ?>
                            <tr>
                                <td>
                                    <img src="images/items/<?= $item['image'] ?>" alt="Imagen Ilustrativa de <?= $item['product'] ?>" class="img-fluid rounded" style="max-width: 100px;">
                                </td>
                                <td>
                                    <h2 class="h6"><?= $item['product'] ?></h2>
                                    <small class="text-muted"><?= $item['product'] ?></small>
                                </td>
                                <td>
                                    <label for="q_<?= $id ?>" class="visually-hidden">Cantidad</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        value="<?= $item['quantity'] ?>"
                                        id="q_<?= $id ?>"
                                        name="q[<?= $id ?>]">
                                </td>
                                <td class="text-end">
                                    $<?= number_format($item['price'], 2, ",", ".") ?>
                                </td>
                                <td class="text-end">
                                    $<?= number_format($item['quantity'] * $item['price'], 2, ",", ".") ?>
                                </td>
                                <td class="text-end">
                                    <a href="admin/actions/remove_item_acc.php?id=<?= $id ?>" class="btn btn-sm btn-danger">Quitar</a>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr class="fw-bold">
                            <td colspan="4" class="text-end py-3">Total:</td>
                            <td class="text-end py-3">
                                $<?= number_format(Cart::totalPrice(), 2, ",", ".") ?>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-grid d-md-flex justify-content-md-end gap-3 mt-4">
                <input type="submit" value="Actualizar cantidades" class="btn btn-warning w-100 w-md-auto">
                <a href="index.php?page=equipments" class="btn btn-info w-100 w-md-auto">Seguir comprando</a>
                <a href="admin/actions/delete_all_items_acc.php" class="btn btn-danger w-100 w-md-auto">Vaciar Carrito</a>
                <a href="index.php?page=finish-payment" class="btn btn-custom w-100 w-md-auto">Finalizar compra</a>
            </div>
        </form>
    <?php } else { ?>
        <div class="alert alert-warning text-center p-4 rounded-3">
            <h2 class="h5">Tu carrito está vacío</h2>
        </div>
    <?php } ?>
</div>