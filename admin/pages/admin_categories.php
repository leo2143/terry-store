<?php
$categories = Categories::getAll();


?>

<div class="container d-flex flex-column justify-content-center">
    <div>
        <?= Alert::get_alerts(); ?>
    </div>
    <div class="table-responsive mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $categorie) { ?>
                    <tr>
                        <td><?= $categorie->getName() ?></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-end gap-3">
                                <a href="index.php?page=cu_categorie&id=<?= $categorie->getId() ?>" role="button" class=" btn btn-sm btn-edit-primary w-50">Editar</a>
                                <a href="#"
                                    class=" btn btn-danger btn-sm btn-eliminar w-50"
                                    data-id="<?= $categorie->getId(); ?>"
                                    data-entitie="Categories"
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

    <a href="index.php?page=cu_categorie" class="btn btn-custom w-100 mt-5  p-3">Cargar nuevo equipamiento</a>
</div>