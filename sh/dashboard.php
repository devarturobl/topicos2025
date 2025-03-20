<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: access_denegate.php"); // Redirigir al inicio de sesión si no está autenticado
    exit();
}

$nombre_usuario = $_SESSION['usuario_nombre'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Bienvenido, <?php echo $nombre_usuario; ?></h2>
                        <p class="text-center">Has iniciado sesión correctamente.</p>
                        <div class="text-center">
                        <style>
    .button-table {
        margin: 0 auto;
        border-collapse: separate;
        border-spacing: 15px;
    }
    .button-table td {
        text-align: center;
    }
</style>

<table class="button-table">
    <tr>
        <td><a href="pages/paselista.php" class="btn btn-primary">Pase de Lista</a></td>
        <td><a href="productos.php" class="btn btn-secondary">Reporte de Asistencias</a></td>
        <td><a href="productos.php" class="btn btn-warning">Imprimir Lista</a></td>
        <td><a href="productos.php" class="btn btn-success">Reporte Semana 5, 10 y 15</a></td>
    </tr>
</table>
                        </div>
                        <div class="text-center">
                            <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>