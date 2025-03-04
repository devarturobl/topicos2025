<?php
include 'conexion.php';

// Procesar el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $password_hash = password_hash($clave, PASSWORD_BCRYPT);

    // Verificar si el usuario ya existe
    $sql1 = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $verificar = mysqli_query($conexion, $sql1);

    if (mysqli_num_rows($verificar) > 0) {
        // El usuario ya existe
        $error = "El usuario ya existe en nuestra BD. intenta con otro.";
    } else {
        // Insertar el nuevo usuario
        $sql = "INSERT INTO usuarios (usuario, clave) VALUES ('$usuario', '$password_hash')";
        if (mysqli_query($conexion, $sql)) {
            header("Location: index.php"); // Redirigir al inicio de sesión
            exit();
        } else {
            $error = "Error al registrar el usuario: " . mysqli_error($conexion);
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
                        <h2 class="text-center mb-4">Registro</h2>
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form action="registro.php" method="post">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <div class="mb-3">
                                <label for="clave" class="form-label">Clave</label>
                                <input type="password" class="form-control" id="clave" name="clave" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                        </form>
                        <hr>
                        <p class="text-center">¿Ya tienes una cuenta? <a href="index.php">Inicia sesión aquí</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>