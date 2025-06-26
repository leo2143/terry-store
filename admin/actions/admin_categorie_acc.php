<?php

require_once '../../functions/Autoload.php';


$postData = $_POST;

try {
    if (isset($postData['id']) && is_numeric($postData['id'])) {
        Categories::update($postData['id'], $postData['name']);
        Alert::add_alert(type: "success", message: "La categoria fue actualizada correctamente");
    } else {
        Categories::create($postData['name']);
        Alert::add_alert(type: "success", message: "La categoria fue creada correctamente");
    }
} catch (Exception $e) {
    Alert::add_alert("danger", message: "Ocurrio un error al " . $isEdit ? "actualizar" : "crear" . " la categoria");
}

header('Location: ../index.php?page=admin_categories');
