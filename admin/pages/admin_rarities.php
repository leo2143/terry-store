<?php
$rarities = Rarities::getAll();


?>

<div class="container row mb-5 mt-5 d-flex align-items-center">
    <table class="table">

        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">actions</th>

            </tr>
        </thead>
        <tbody>

            <?PHP foreach ($rarities as $raritie) { ?>

                <tr>
                    <td><?= $raritie->getName(); ?></td>
                    <td><a href="index.php?page=cu_raritie&id=<?= $raritie->getId() ?>" role="button" class="d-block btn btn-sm btn-warning">Editar</a>
                        <a href="" role="button" class="d-block btn btn-sm btn-danger">Eliminar</a>
                    </td>
                </tr>

        </tbody>
    <?PHP } ?>
    </table>
    <a href="index.php?page=cu_raritie" class="button btn-primary">cargar nuevo rareza</a>
</div>