<?php
session_start();
session_destroy(); // Elimina todos los datos de sesión
header("Location: index.php"); // Redirige a la página de inicio de sesión
exit();
