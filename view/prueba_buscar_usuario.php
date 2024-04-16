<?php
include_once "../models/Usuario.php";

$cedula = "123";

try {
    $u = Usuario::find($cedula);
    echo "<b>CEDULA:</b> $u->cedula <br>";
    echo "<b>CLAVE:</b> $u->clave <br>";
    echo "<b>NOMBRE:</b> $u->nombre <br>";
    echo "<b>EMAIL:</b> $u->email <br>";

    $gastos = $u->gastos;
    $numero_de_gastos = count($gastos);
    echo "<br>";
    echo "<b>GASTOS:</b> $numero_de_gastos <br>";
    $suma_total_de_gastos = 0;

    foreach ($gastos as $i => $g) {
        echo "------------------------------------------------<br>";
        echo "GASTO # ".($i + 1)." <br>";
        echo "------------------------------------------------<br>";
        echo "<b>ID:</b> $g->id <br>";
        echo "<b>FECHA:</b> $g->fecha <br>";
        echo "<b>VALOR:</b> $g->valor <br>";
        echo "<b>DETALLES:</b> $g->detalles <br>";
        $suma_total_de_gastos += $g->valor;
    }
    echo "<h3><b>TOTAL GASTOS:</b> $suma_total_de_gastos </h3><br>";

} catch (Exception $error) {
    echo $error->getMessage();
}