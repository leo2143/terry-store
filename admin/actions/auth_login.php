<?php

require_once '../../functions/Autoload.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$sesionStatus = Authentication::log_in($username, $password);

if ($sesionStatus) {

    if ($sesionStatus == "client") {
        header(header: 'Location: ../../index.php');
    } else {
        header(header: 'Location: ../index.php?page=dashboard');
    }
} else {

    header("Location: ../index.php?page=login");
}
