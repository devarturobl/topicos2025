<?php
    include 'conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];   

        if($pass1 == $pass2){
            // Buscar que no exista el correo
            $sql = "SELECT * FROM usuarios WHERE email = '$email'";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                      <script>
                          document.addEventListener('DOMContentLoaded', function() {
                              Swal.fire({
                                  icon: 'error',
                                  title: 'Error',
                                  text: 'El correo ya está registrado',
                                  confirmButtonColor: '#800020'
                              });
                          });
                      </script>";
            }
            else{
                $pass1 = password_hash($pass1, PASSWORD_BCRYPT);
                $sql = "INSERT INTO usuarios (email, password, rol) VALUES ('$email', '$pass1', 'user')";
                mysqli_query($con, $sql);
                header("Location: index.php"); 
            }
        }else{
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                  <script>
                      document.addEventListener('DOMContentLoaded', function() {
                          Swal.fire({
                              icon: 'error',
                              title: 'Error',
                              text: 'Las contraseñas no coinciden',
                              confirmButtonColor: '#800020'
                          });
                      });
                  </script>";    
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
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
            <h4 class="text-center mb-3">Registrar Usuario</h4>
            <form method="post">
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="pass1" required>
                </div>
                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Repetir Contraseña</label>
                    <input type="password" class="form-control" id="password" name="pass2" required>
                </div>
                <button type="submit" class="btn btn-secondary w-100">Registrar</button>
            </form>
            <div class="text-center mt-3">
                <a href="index.php" class="text-decoration-none">¿Ya tienes una cuenta? Login aquí</a>
            </div>
        </div>
    </div>
    
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>