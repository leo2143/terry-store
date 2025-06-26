<?php
require_once '../../functions/Autoload.php';

Cart::clearItem();
header('Location: ../../index.php');
