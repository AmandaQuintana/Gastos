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
        }

        /* Estilo adicional para el menú */
        .menu-link {
            display: block;
            padding: 10px 20px;
            margin-bottom: 10px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            text-decoration: none;
            color: #212529;
            transition: background-color 0.3s ease;
        }

        .menu-link:hover {
            background-color: #e2e6ea;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Menu opciones - Usuarios</h1>
            <a href="agregar.php" class="menu-link">AGREGAR USUARIOS</a>
            <a href="buscar.php" class="menu-link">BUSCAR USUARIOS</a>
            <a href="buscar.php" class="menu-link">EDITAR USUARIOS</a>
            <a href="listar.php" class="menu-link">LISTAR USUARIOS</a>
        </div>
    </div>
</body>

</html>
