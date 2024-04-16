<?php
// Obtenemos el mensaje enviado por el controlador
$msj = @$_REQUEST["msj"];
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

            <h1 class="fw-bold">Mensaje</h1>
            <div class="alert alert-danger" role="alert">
                <h3 class="fw-bold text-dark"><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></h3>
            </div>
        </div>

    </div>
</body>

</html>