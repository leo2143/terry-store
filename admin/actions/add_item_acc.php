<?php
require_once '../../functions/Autoload.php';

$id = $_GET["id"];
$quantity = $_GET["quantity"];

if ($id) {
    Cart::addItem($id, $quantity);
    header('Location: ../../index.php?page=cart');
}
