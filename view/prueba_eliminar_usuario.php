<?php
include_once "../models/Usuario.php";

$cedula = "123";

try {
    $lista_objetos_usuarios = Usuario::all();
    $cuenta_usuarios = count($lista_objetos_usuarios);
    echo "<h3><b>TOTAL DE USUARIOS: </b>$cuenta_usuarios</h3> <br>";
    echo "REPORTE DE USUARIOS<br>";
    echo "================================================<br>";

    foreach ($lista_objetos_usuarios as $i => $u) {
        echo "USUARIO # ".($i + 1)." <br>";
        echo "------------------------------------------------<br>";
        echo "<b>CEDULA:</b> $u->cedula <br>";
        echo "<b>CLAVE:</b> $u->clave <br>";
        echo "<b>NOMBRE:</b> $u->nombre <br>";
        echo "<b>EMAIL:</b> $u->email <br>";
        echo "<br><br>";
    }

    echo "Eliminamos el usuario con la Cedula $cedula...<br>";
    Usuario::find("123")->delete();

    $lista_objetos_usuarios = Usuario::all();
    $cuenta_usuarios = count($lista_objetos_usuarios);
    echo "<h3><b>TOTAL DE USUARIOS: </b>$cuenta_usuarios</h3> <br>";
    echo "NUEVO REPORTE DE USUARIOS<br>";
    echo "================================================<br>";

    foreach ($lista_objetos_usuarios as $i => $u) {
        echo "USUARIO # ".($i + 1)." <br>";
        echo "------------------------------------------------<br>";
        echo "<b>CEDULA:</b> $u->cedula <br>";
        echo "<b>CLAVE:</b> $u->clave <br>";
        echo "<b>NOMBRE:</b> $u->nombre <br>";
        echo "<b>EMAIL:</b> $u->email <br>";
        echo "<br><br>";
    }

} catch (Exception $error) {
    echo $error->getMessage();
}