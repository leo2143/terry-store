<?php
require_once '../../class/Categories.php';
require_once '../../class/Connection.php';

$postData = $_POST;

try {
    if (isset($postData['id']) && is_numeric($postData['id'])) {
        Categories::update($postData['id'], $postData['name']);
    } else {
        Categories::create($postData['name']);
    }
} catch (Exception $e) {
    die("No se pudo cargar la categoria: " . $e->getMessage());
}

header('Location: ../index.php?page=admin_categories');
