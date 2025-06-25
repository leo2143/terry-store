<?php
$rarities = Rarities::getAll();


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

                <?PHP foreach ($rarities as $raritie) { ?>

                    <tr>

                        <td><?= $raritie->getName(); ?></td>

                        <td>
                            <div class="d-flex align-items-center justify-content-end gap-3">

                                <a href="index.php?page=cu_raritie&id=<?= $raritie->getId() ?>" role="button" class="btn btn-sm btn-edit-primary w-50">Editar</a>
                                <a href="#"
                                    class=" btn btn-danger btn-sm btn-eliminar w-50"
                                    data-id="<?= $raritie->getId(); ?>"
                                    data-entitie="Rarities"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Eliminar
                                </a>
                        </td>
                    </tr>

            </tbody>
        <?PHP } ?>
        </table>
    </div>
    <a href="index.php?page=cu_raritie" class="btn btn-custom w-100 mt-5  p-3">cargar nuevo rareza</a>
</div>