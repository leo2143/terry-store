<?php
$equipments = Equipment::getAll();
$toDelete = null;
?>
<div class="container d-flex flex-column justify-content-center">
        <h1 class="text-center my-3">Dashboard de equipamientos</h1>

    <div>
        <?= Alert::get_alerts(); ?>
    </div>
    <div class="table-responsive mt-5">
        <table class="table ">
            <thead>
                <tr>
                    <th style="width: 120px; text-align: center;">Imagen</th>
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
                            <img src="../images/items/<?= $equipment->getImage() ?>" alt="<?= $equipment->getName(); ?>" width="120">
                        </td>
                        <td><?= $equipment->getName(); ?></td>
                        <td><?= $equipment->getType(); ?></td>
                        <td><?= $equipment->getCategory()->getName(); ?></td>
                        <td><?= $equipment->getRarity()->getName(); ?></td>
                        <td><?= $equipment->getMaterial(); ?></td>
                        <td><?= $equipment->getAbility(); ?></td>
                        <td><?= $equipment->reduceDescription(); ?></td>
                        <td>$<?= number_format($equipment->getPrice(), 2); ?></td>
                        <td><?= $equipment->getDateAdded(); ?></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-end gap-3">

                                <a href="index.php?page=cu_equipment&id=<?= $equipment->getId() ?>" class="btn btn-sm btn-edit-primary w-50">Editar</a>
                                <a href="#"
                                    class="d-block btn btn-danger btn-sm btn-eliminar w-50"
                                    data-id="<?= $equipment->getId(); ?>"
                                    data-entitie="Equipment"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Eliminar
                                </a>
                            </div>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <a href="index.php?page=cu_equipment" class="btn btn-custom w-100 mt-5  p-3">Cargar nuevo equipamiento</a>
</div>