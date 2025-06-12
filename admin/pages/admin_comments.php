<?php
$comments = Comment::getAll();
?>

<div class="container row mb-5 mt-5 d-flex align-items-center">
    <table class="table">

        <thead>
            <tr>
                <th scope="col">profile_image</th>
                <th scope="col">name</th>
                <th scope="col">content</th>
                <th scope="col">rating</th>
                <th scope="col">admissionDate</th>
                <th scope="col">actions</th>

            </tr>
        </thead>
        <tbody>

            <?PHP foreach ($comments as $comment) { ?>

                <tr>
                    <td><?= $comment->getProfileImage() ?></td>
                    <td><?= $comment->getName() ?></td>
                    <td><?= $comment->getContent() ?></td>
                    <td><?= $comment->getRating() ?></td>
                    <td><?= $comment->getAdmissionDate() ?></td>

                    <td><a href="" role="button" class="d-block btn btn-sm btn-warning">Editar</a>
                        <a href="" role="button" class="d-block btn btn-sm btn-danger">Eliminar</a>
                    </td>
                </tr>

        </tbody>
    <?PHP } ?>
    </table>
    <a href="" class="button btn-primary">cargar nuevo equipamiento</a>
</div>