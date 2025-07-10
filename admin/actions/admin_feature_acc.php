<?php
require_once '../../functions/Autoload.php';


$postData = $_POST;
$isEdit = false;
try {
    if (isset($postData['id']) && is_numeric($postData['id'])) {
        Features::update($postData['id'], $postData['name']);
        Alert::add_alert("success", "La carracteristica con el nombre " . $postData["name"] . " fue actualizada correctamente");
    } else {
        Features::create($postData['name']);
        Alert::add_alert("success", message: "La carracteristica con el nombre " . $postData["name"] . " fue creada correctamente");
    }
} catch (Exception $e) {
    Alert::add_alert("danger", "Ocurrio un error al " . $isEdit ? "actualizar" : "crear" . " la carracteristica");
}

header('Location: ../index.php?page=admin_features');
