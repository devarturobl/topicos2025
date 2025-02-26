<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Nombre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343541;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #40414F;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .form-control {
            background-color: #565869;
            color: #fff;
            border: none;
        }
        .btn-custom {
            background-color: #10A37F;
            color: #fff;
            border-radius: 8px;
            padding: 10px 20px;
        }
        .btn-custom:hover {
            background-color: #0d8a6b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bienvenido</h2>
        <p>Introduce tu nombre para continuar</p>
        <form action="saludo.php" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre aquí" required>
            </div>
            <button type="submit" class="btn btn-custom">Aceptar</button>
        </form>
    </div>
</body>
</html>
