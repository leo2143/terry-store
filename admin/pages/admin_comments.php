<?php
$comments = Comment::getAll();

?>

<div class="container d-flex flex-column justify-content-center">
    <div class="table-responsive mt-5">
        <table class="table">

            <thead>
                <tr>
                    <th scope="col">Imagen de perfil</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Contenido</th>
                    <th scope="col">Estrellas</th>
                    <th scope="col">Ingreso</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody>

                <?PHP foreach ($comments as $comment) { ?>


                    <tr>
                        <td>
                            <img src="../images/icons/<?= $comment->getProfileImage() ?>" alt="avatar usuario" width="120">
                        </td>
                        <td><?= $comment->getUserName() ?></td>
                        <td><?= $comment->getContent() ?></td>
                        <td><?= $comment->getRating() ?></td>
                        <td><?= date("Y/m/d", $comment->getCreateAt()) ?></td>

                        <td>
                            <div class="d-flex align-items-center justify-content-end gap-3">

                                <a href="index.php?page=cu_comment&id=<?= $comment->getId() ?>" role="button" class="btn btn-sm btn-edit-primary w-50">Editar</a>
                                <a href="#"
                                    class="d-block btn btn-danger btn-sm btn-eliminar w-50"
                                    data-id="<?= $comment->getId(); ?>"
                                    data-entitie="Comment"
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
    <a href="index.php?page=cu_comment" class="btn btn-custom w-100 mt-5  p-3">cargar nuevo comentario</a>

</div>