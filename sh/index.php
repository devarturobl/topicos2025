<?php
    session_start();
    include 'conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $pass1 = $_POST['pass1'];

        $sql = "SELECT id, email, password FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($con, $sql);
    
        if (mysqli_num_rows($resultado)) {
            $usuario = mysqli_fetch_assoc($resultado);
            if (password_verify($pass1, $usuario['password'])) {
                // Iniciar sesión
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['email'];
                header("Location: dashboard.php"); // Redirigir al panel de control
            } else {
                $error = "Contraseña incorrecta.";
            }
        } else {
            $error = "El usuario no existe.";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido al Sistema de Asistencia TecNM Ajalpan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #800020; /* Color vino */
            color: white;
        }
        .login-container {
            max-width: 400px;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
        }
        .btn-primary {
            background-color: #800020;
            border-color: #800020;
        }
        .btn-primary:hover {
            background-color: #5a0015;
            border-color: #5a0015;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="container text-center">
        <h1 class="mb-4">Bienvenido al Sistema de Asistencia TecNM Ajalpan</h1>
        <div class="login-container mx-auto">
            <h4 class="text-center mb-3">Iniciar Sesión</h4>
            <form method="POST">
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="pass1" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Ingresar</button>
            </form>
            <div class="text-center mt-3">
                <a href="register.php" class="text-decoration-none">¿No tienes una cuenta? Regístrate aquí</a>
            </div>
        </div>
    </div>
</body>
</html>