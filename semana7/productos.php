<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: access_denegate.php"); // Redirigir al inicio de sesión si no está autenticado
    exit();
}

$nombre_usuario = $_SESSION['usuario_nombre'];
?>

<?php
include 'conexion.php';

// Procesar el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $codigobarras = mysqli_real_escape_string($conexion, $_POST['codigobarras']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $precioventa = mysqli_real_escape_string($conexion, $_POST['precioventa']);

    // Verificar si el usuario ya existe
    $sql1 = "SELECT * FROM producto WHERE nombre = '$nombre'";
    $verificar = mysqli_query($conexion, $sql1);

    if (mysqli_num_rows($verificar) > 0) {
        // El usuario ya existe
        $error = "Este producto ya ha sido registrado";
    } else {
        // Insertar el nuevo usuario
        $sql = "INSERT INTO producto (nombre, codigobarras, descripcion, precioventa) VALUES ('$nombre', '$codigobarras', '$descripcion', '$precioventa')";
        if (mysqli_query($conexion, $sql)) {
            header("Location: dashboard.php"); // Redirigir al inicio de sesión
            exit();
        } else {
            $error = "Error al registrar el producto: " . mysqli_error($conexion);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Sistema de Punto de Venta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="estilos.css">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Registro de Producto</h2>
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Producto - Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="codigobarras" class="form-label">Codigo de Barras:</label>
                                <input type="text" class="form-control" id="codgobarras" name="codigobarras">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Producto - Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                            </div>
                            <div class="mb-3">
                                <label for="precioventa" class="form-label">Precio Venta:</label>
                                <input type="number" class="form-control" id="precioventa" name="precioventa" step="0.01" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Guardar Producto</button>
                        </form>
                        <hr>
                        <p class="text-center"><a href="dashboard.php">Salir sin cambios</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>