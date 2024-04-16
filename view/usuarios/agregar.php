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
            <h1>Agregar usuario</h1> <!-- Título del formulario -->
            <form action="../../controllers/UsuarioController.php" method="POST">
                <div class="mb-3">
                    <label for="cc" class="form-label">CEDULA:</label>
                    <input type="number" class="form-control" id="cc" name="cc" required placeholder="Digita la Cedula">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">CLAVE:</label>
                    <input type="text" class="form-control" id="pass" name="pass" placeholder="Digita la Clave">
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">NOMBRE:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required
                        placeholder="Digita el Nombre">
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">EMAIL:</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Digita el Email">
                </div>
                <button type="reset" class="btn btn-secondary">Limpiar</button>
                <button type="submit" class="btn btn-success" name="accion" value="Guardar">Guardar</button>
            </form>

            <?php
            // Obtenemos el mensaje enviado por el controlador
            $msj = @$_REQUEST["msj"];
            ?>
            <span style="color: red;">
                <?= ($msj != NULL || isset($msj)) ? $msj : "" ?>
            </span>
        </div>
    </div>
</body>

</html>