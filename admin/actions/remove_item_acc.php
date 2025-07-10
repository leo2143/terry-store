<?php
require_once '../../functions/Autoload.php';

Cart::removeItem($_GET["id"]);
header('Location: ../../index.php?page=cart');
