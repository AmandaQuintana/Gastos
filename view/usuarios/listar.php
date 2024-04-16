<?php
// Obtenemos el mensaje enviado por el controlador
session_start();

require_once $_SERVER["DOCUMENT_ROOT"]."/gastos/models/Usuario.php";

$msj = @$_REQUEST["msj"];
$usuarios = @$_SESSION["usuarios.all"];
$usuarios = unserialize($usuarios);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EJEMPLO DE CRUD PHP CON ORM ACTIVERECORD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    body,
    html {
        height: 100%;
    }

    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .form-container {
        width: 400px;
        text-align: center;
        /* Alineación de texto al centro */
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Listar usuarios</h1> <!-- Título del formulario -->
            <hr>
            <?php
                if($usuarios == null || count($usuarios) <= 0){
            ?>

            <span style="color: red;">
                No existen usuarios registrados
            </span>

            <?php
                } else {
            ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">CEDULA</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">EMAIL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($usuarios as $i => $u){
                    ?>
                    <tr>
                        <th scope="row"> <?= ($i + 1) ?> </th>
                        <td><?= ($u->cedula) ?></td>
                        <td><?= ($u->nombre) ?></td>
                        <td><?= ($u->email) ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>


            <?php
                }
            ?>

        </div>
    </div>
    <span style="color: red;">
        <?= ($msj != NULL || isset($msj)) ? $msj : "" ?>
    </span>
</body>

</html>