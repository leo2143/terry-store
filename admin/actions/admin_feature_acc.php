<?php
require_once '../../functions/Autoload.php';


$postData = $_POST;

try {
    if (isset($postData['id']) && is_numeric($postData['id'])) {
        Features::update($postData['id'], $postData['name']);
    } else {
        Features::create($postData['name']);
    }
} catch (Exception $e) {
    die("No se pudo cargar la característica: " . $e->getMessage());
}

header('Location: ../index.php?page=admin_features');
