<?php
$equipments = Equipment::getAll();
?>

<div class="container row mb-5 mt-5 d-flex align-items-center">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Categoría</th>
                <th>Rareza</th>
                <th>Material</th>
                <th>Habilidad</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Fecha de Alta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipments as $equipment) { ?>
                <tr>
                    <td>
                        <img src="../images/items/<?= $equipment->getImage() ?>" alt="<?= $equipment->getName(); ?>" width="50">
                    </td>
                    <td><?= $equipment->getName(); ?></td>
                    <td><?= $equipment->getType(); ?></td>
                    <td><?= $equipment->getCategory(); ?></td>
                    <td><?= $equipment->getRarity(); ?></td>
                    <td><?= $equipment->getMaterial(); ?></td>
                    <td><?= $equipment->getAbility(); ?></td>
                    <td><?= $equipment->reduceDescription(); ?></td>
                    <td>$<?= number_format($equipment->getPrice(), 2); ?></td>
                    <td><?= $equipment->getDateAdded(); ?></td>

                    <td>
                        <a href="edit.php?id=<?= $equipment->getId(); ?>" class="btn btn-sm btn-warning mb-1">Editar</a>
                        <a href="delete.php?id=<?= $equipment->getId(); ?>" class="btn btn-sm btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="create.php" class="btn btn-primary mt-3">Cargar nuevo equipamiento</a>
</div>