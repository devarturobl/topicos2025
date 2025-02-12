<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro Usuarios</title>
</head>
<body>
    <h1>Formulario de Registro Usuarios</h1>
    <form method="post">
        <label for="nombre">Nombre de Usuario:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Registrar">
        <a href="sesion.php">Iniciar Sesión</a>
    </form>
</body>

<?php
    include 'conexion.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];

        $pass = password_hash($password, PASSWORD_DEFAULT);
        echo $pass;

        $query = "INSERT INTO users (username, password) VALUES ('$nombre', '$pass')";
        mysqli_query($conexion, $query);
        header('Location: index.php');
    }
?>
</html>