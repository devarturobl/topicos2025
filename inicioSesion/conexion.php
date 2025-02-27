<?php
$host = "localhost"; // Servidor de la base de datos
$usuario = "root"; // Usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$basedatos = "sistemaphp"; // Nombre de la base de datos

// Crear conexión
$conexion = mysqli_connect($host, $usuario, $password, $basedatos);

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>