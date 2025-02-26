<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo</title>
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
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"])) {
            $nombre = htmlspecialchars($_POST["nombre"]);
            echo "<h2>Hola, <span class='text-success'>$nombre</span>!</h2>";
            echo "<p>¡Qué gusto tenerte en este sitio!</p>";
        } else {
            echo "<h2>No se proporcionó un nombre.</h2>";
        }
        ?>
        <br>
        <a href="index.php" class="btn btn-custom">Volver</a>
    </div>
</body>
</html>
