<?php
require_once "../models/Usuario.php";
require_once "../models/Gasto.php";

$g = new Gasto();
$g->fecha = "2024-11-04";
$g->valor = 27000;
$g->detalles = "Detalle de prueba";
$g->usuario_id = "123";

try {
    $g->save();
    $total = @Gasto::count();
    echo "Gasto guardado";
    echo "Total $total";
} catch (Exception $error) {
    $msj = $error->getMessage();
    if (strstr($msj, "Duplicate")) {
        echo "El gasto ya existe";
    }
}