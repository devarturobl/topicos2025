<?php
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario_id']) || empty($_SESSION['usuario_id'])) {
    header("Location: access_denegated.php"); // Redirige si no hay sesión activa
    exit(); // IMPORTANTE: Detiene la ejecución del script
}

$nombre_usuario = htmlspecialchars($_SESSION['usuario_nombre'], ENT_QUOTES, 'UTF-8'); // Seguridad contra XSS
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $nombre_usuario; ?> 👋</h1>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
