<?php
session_start();

// Limpiar y destruir la sesión
$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

// Solo devolver una respuesta simple
header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
exit();
?>