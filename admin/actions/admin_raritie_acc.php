<?php
require_once '../../functions/Autoload.php';

$postData = $_POST;
$isEdit = false;
try {
    if (isset($postData['id']) && is_numeric($postData['id'])) {
        Rarities::update($postData['id'], $postData['name']);
        Alert::add_alert("success", "La rareza con el nombre " . $postData["name"] . " fue Actualizada correctamente");
    } else {
        Rarities::create($postData['name']);
        Alert::add_alert("success", "La rareza con el nombre " . $postData["name"] . " fue creada correctamente");
    }
} catch (Exception $e) {
    Alert::add_alert("danger", "Ocurrio un error al " . $isEdit ? "actualizar" : "crear" . " la rareza");
}

header('Location: ../index.php?page=admin_rarities');
