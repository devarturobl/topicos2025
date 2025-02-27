<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con PHP y MySQLi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            color: #000;
        }
        .custom-card {
            background-color: #fff;
            border: 1px solid #000;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }
        .btn-black {
            background-color: #000;
            color: #fff;
        }
        .btn-black:hover {
            background-color: #333;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-container img {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="logo-container">
            <img src="logo.png" alt="Logotipo">
        </div>
        <h1 class="text-center mb-4">CRUD con PHP y MySQLi</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card custom-card p-3">
                    <div class="card-header text-center bg-dark text-white">
                        <h3>Insertar Datos</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Datos:</label>
                                <input type="text" name="dato" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-black w-100">Guardar</button>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="mostrar.php" class="btn btn-outline-dark">Ver Registros</a>
                </div>
                <?php
                include 'conexion.php';
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $dato = $_POST['dato'];
                    $query = "INSERT INTO demo (dato) VALUES ('$dato')";
                    mysqli_query($conexion, $query);
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>