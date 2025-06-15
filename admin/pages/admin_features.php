<?php
$features = Features::getAll();


?>

<div class="container d-flex flex-column justify-content-center">
    <div class="table-responsive mt-5">

        <table class="table">

            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody>

                <?PHP foreach ($features as $feature) { ?>

                    <tr>
                        <td><?= $feature->getName() ?></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-end gap-3 w-50">

                                <a href="index.php?page=cu_feature&id=<?= $feature->getId() ?>" role="button" class="btn btn-sm btn-edit-primary w-50">Editar</a>

                                <a href="#"
                                    class=" btn btn-danger btn-sm btn-eliminar w-50"
                                    data-id="<?= $feature->getId(); ?>"
                                    data-entitie="Features"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Eliminar
                                </a>
                            </div>

                        </td>
                    </tr>

            </tbody>
        <?PHP } ?>
        </table>
    </div>
    <a href="index.php?page=cu_feature" class="btn btn-custom w-100 mt-5  p-3">cargar nueva característica</a>
</div>