<?php

session_start();
/**
 * Carga automáticamente la clase solicitada si su archivo existe en la carpeta `../class/`.
 *
 * @param string $nombreClase Nombre de la clase a cargar.
 */
function autoloadClasses($nombreClase)
{
    $archivoClase = __DIR__ . "/../class/$nombreClase.php";

    if (file_exists($archivoClase)) {
        require_once $archivoClase;
    } else {
        die("No se pudo cargar la clase: $nombreClase");
    }
}

spl_autoload_register('autoloadClasses');
