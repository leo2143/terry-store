<?php
require_once '../../functions/Autoload.php';

if (!empty($_POST)) {

    Cart::updateItems($_POST["q"]);
    header('Location: ../../index.php?page=cart');
}
