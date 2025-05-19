<?php
session_start();
include '../conexion.php';
$error = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);

    $sql = "SELECT * FROM usuarios WHERE rol = 'administrador' AND email = '$email'";
    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nombre'] = $user['nombre'];
            $success = true;
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "El usuario no es administrador.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencia - TecNM</title>
    <link rel="stylesheet" href="../styles.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    
</head>
<body class="dark-mode">
    <div class="container">
        <div class="illustration">
            <div class="illustration-content">
                <h1>¡Hola de nuevo!</h1>
                <p>Todo está listo para que sigas con la gestión.</p>
            </div>
        </div>
        
        <div class="form-container">
            <div class="form-header">
                <h2>Acceso Administrativo</h2>
                <p>Ingresa tus credenciales para gestionar el sistema</p>
                <button class="theme-toggle" id="themeToggle">
                    <i class="fas fa-sun"></i>
                </button>
            </div>
            
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@tecnm.mx" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                
                <div class="form-footer">
                    <p>Sistema exclusivo para personal autorizado</p>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Theme toggle functionality
        const themeToggle = document.getElementById('themeToggle');
        const icon = themeToggle.querySelector('i');
        const text = themeToggle.querySelector('span');
        
        // Set dark mode as default
        document.body.classList.add('dark-mode');
        localStorage.setItem('theme', 'dark');
        
        // Check for saved theme preference
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'light') {
            document.body.classList.remove('dark-mode');
            document.body.classList.add('light-mode');
            icon.classList.replace('fa-sun', 'fa-moon');
            text.textContent = 'Modo Oscuro';
        }
        
        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            document.body.classList.toggle('light-mode');
            
            if (document.body.classList.contains('light-mode')) {
                icon.classList.replace('fa-sun', 'fa-moon');
                text.textContent = 'Modo Oscuro';
                localStorage.setItem('theme', 'light');
            } else {
                icon.classList.replace('fa-moon', 'fa-sun');
                text.textContent = 'Modo Claro';
                localStorage.setItem('theme', 'dark');
            }
        });
    </script>

    <?php if (!empty($error)): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get current theme
            const isDarkMode = document.body.classList.contains('dark-mode');
            const background = isDarkMode ? '#1e1e1e' : '#ffffff';
            const color = isDarkMode ? '#f8f9fa' : '#333333';
            
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "<?php echo $error; ?>",
                confirmButtonText: 'OK',
                confirmButtonColor: isDarkMode ? '#9b1b30' : '#800020',
                background: background,
                color: color
            });
        });
    </script>
    <?php endif; ?>

    <?php if ($success): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get current theme
            const isDarkMode = document.body.classList.contains('dark-mode');
            const background = isDarkMode ? '#1e1e1e' : '#ffffff';
            const color = isDarkMode ? '#f8f9fa' : '#333333';
            
            Swal.fire({
                icon: 'success',
                title: 'Acceso concedido',
                text: 'Autenticación exitosa. Redirigiendo...',
                showConfirmButton: false,
                timer: 2000,
                background: background,
                color: color
            }).then(() => {
                window.location.href = 'dashboard.php';
            });
        });
    </script>
    <?php endif; ?>
</body>
</html>