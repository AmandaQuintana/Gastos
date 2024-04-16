<?php
// Obtenemos el mensaje enviado por el controlador
session_start();

require_once $_SERVER["DOCUMENT_ROOT"]."/gastos/models/Usuario.php";

$msj = @$_REQUEST["msj"];
$u = @$_SESSION["usuario.find"];
$u = unserialize($u);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EJEMPLO DE CRUD PHP CON ORM ACTIVERECORD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="../js/validaciones.js"></script>
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
            <h1>Buscar usuario</h1> <!-- Título del formulario -->
            <form action="../../controllers/UsuarioController.php" method="POST">
                <div class="mb-3">
                    <label for="cc" class="form-label">CEDULA:</label>
                    <input type="number" class="form-control" id="cc" name="cc" value="<?= $u->cedula ?>" required
                        placeholder="Digita la Cedula">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">CLAVE:</label>
                    <input type="text" class="form-control" id="pass" name="pass"
                        value="<?= isset($u) && is_object($u) && !empty($u->clave) ? $u->clave : '' ?>"
                        readonly placeholder="Clave">
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">NOMBRE:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        value="<?= isset($u) && is_object($u) && !empty($u->nombre) ? $u->nombre : '' ?>"
                        readonly required placeholder="Nombre">
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">EMAIL:</label>
                    <input type="email" class="form-control" id="correo" name="correo"
                    value="<?= isset($u) && is_object($u) && !empty($u->email) ? $u->email : '' ?>"
                        readonly placeholder="Email">
                </div>
                <button type="reset" class="btn btn-secondary" id="limpiar" name="accion" value="Limpiar">Limpiar</button>
                <button type="submit" class="btn btn-primary" id="buscar" name="accion" value="Buscar">Buscar</button>
                <button type="submit" class="btn btn-warning" id="editar" name="accion" value="Editar">Editar</button>
                <button type="submit" class="btn btn-danger" id="eliminar" name="accion" value="Eliminar">Eliminar</button>
            </form>

            <?php
            // Obtenemos el mensaje enviado por el controlador
            $msj = @$_REQUEST["msj"];
            ?>
            <span style="color: red;">
                <?= ($msj != NULL || isset($msj)) ? $msj : "" ?>
            </span>

            <script>
                habilitarBotones()
                confirmarOperacion()
            </script>
        </div>
    </div>
</body>

</html>