<?php
require_once '../../functions/Autoload.php';

$postData = $_POST;

try {
    if (isset($postData['id']) && is_numeric($postData['id'])) {
        Rarities::update($postData['id'], $postData['name']);
    } else {
        Rarities::create($postData['name']);
    }
} catch (Exception $e) {
    die("No se pudo cargar la rareza: " . $e->getMessage());
}

header('Location: ../index.php?page=admin_rarities');
