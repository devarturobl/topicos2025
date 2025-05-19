<?php
session_start();
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $pass1 = mysqli_real_escape_string($conexion, $_POST['pass1']);
    $pass2 = mysqli_real_escape_string($conexion, $_POST['pass2']);

    // Validación de contraseña
    if ($pass1 !== $pass2) {
        $_SESSION['error'] = "Las contraseñas no coinciden.";
        echo json_encode(['status' => 'error', 'message' => $_SESSION['error']]);
        exit();
    }

    // Verificar si el usuario ya existe
    $sql1 = "SELECT * FROM usuarios WHERE email = '$email'";
    $verificar = mysqli_query($conexion, $sql1);

    if (mysqli_num_rows($verificar) > 0) {
        $_SESSION['error'] = "El email ya existe en nuestra BD. Intenta con otro.";
        echo json_encode(['status' => 'error', 'message' => $_SESSION['error']]);
        exit();
    }

    // Hashear contraseña
    $password_hash = password_hash($pass1, PASSWORD_BCRYPT);

    // Insertar usuario en la BD
    $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES ('$nombre', '$email', '$password_hash', 'admin')";
    if (mysqli_query($conexion, $sql)) {
        $_SESSION['success'] = "Usuario registrado correctamente.";
        echo json_encode(['status' => 'success', 'message' => $_SESSION['success']]);
        exit();
    } else {
        $_SESSION['error'] = "Error al registrar el usuario: " . mysqli_error($conexion);
        echo json_encode(['status' => 'error', 'message' => $_SESSION['error']]);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Sistema de Asistencia TecNM</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

<div class="left" data-aos="fade-right">
    <img src="assets/itssna.png" alt="Company Logo" class="company-logo">
    <h2>Bienvenido</h2>
    <p>Sistema de Asistencia TecNM<br>Instituto Tecnológico Superior de la Sierra Negra de Ajalpan</p>
</div>
<div class="right" data-aos="fade-left">
    <h2 class="text-center">Registrar Usuario<br>Administrador</h2>
    <form id="registerForm" action="" method="post">
    <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="nombre" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="pass1" name="pass1" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Ingresa la contraseña nuevamente</label>
            <input type="password" class="form-control" id="pass2" name="pass2" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Registrar Usuario</button>
    </form>
    <p class="text-center mt-3">Ya tienes una cuenta? <a href="index.php">Inicia sesión aquí</a></p>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('register.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            Swal.fire({
                icon: 'success',
                iconColor: "#800020",
                title: 'Éxito',
                text: data.message,
                confirmButtonText: 'OK',
                confirmButtonColor: '#800020',
            }).then(() => {
                window.location.href = 'index.php';
            });
        } else {
            Swal.fire({
                icon: 'error',
                iconColor: "#800020",
                title: 'Error',
                text: data.message,
                confirmButtonText: 'OK',
                confirmButtonColor: '#800020',
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            iconColor: "#800020",
            title: 'Error',
            text: 'Hubo un problema al procesar la solicitud.',
            confirmButtonText: 'OK',
            confirmButtonColor: '#800020',
        });
    });
});
</script>

</body>
</html>
