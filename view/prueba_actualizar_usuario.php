<?php
include_once "../models/Usuario.php";

$cedula = "123";

try {
    $u = Usuario::find($cedula);
    echo "<b>DATOS ACTUALES DEL USUARIO</b> <br>";
    echo "<b>CEDULA:</b> $u->cedula <br>";
    echo "<b>CLAVE:</b> $u->clave <br>";
    echo "<b>NOMBRE:</b> $u->nombre <br>";
    echo "<b>EMAIL:</b> $u->email <br>";

    echo "<br>";
    echo "Cambiando la clave y el email....<br>";

    $u->clave = "NuevaClave123";
    $u->email = "nuevoemail@gmail.com";
    $u->save();
    echo "<br>";

    echo "<b>DATOS CAMBIADOS DEL USUARIO ACTUAL</b> <br>";
    echo "<b>CEDULA:</b> $u->cedula <br>";
    echo "<b>CLAVE:</b> $u->clave <br>";
    echo "<b>NOMBRE:</b> $u->nombre <br>";
    echo "<b>EMAIL:</b> $u->email <br>";

} catch (Exception $error) {
    echo $error->getMessage();
}