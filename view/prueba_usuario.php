<?php
require_once "../models/Usuario.php";

$u = new Usuario();
$u->cedula = "1234";
$u->nombre = "María Perez";
$u->email = "mperez@gmail.com";

try {
    $u->save();
    $total = @Usuario::count();
    echo "Usuario guardado";
    echo "Total $total";
} catch (Exception $error) {
    $msj = $error->getMessage();
    if (strstr($msj, "Duplicate")) {
        echo "El usuario ya existe";
    }
}