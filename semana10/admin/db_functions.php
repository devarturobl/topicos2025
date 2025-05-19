<?php
// db_functions.php
require_once '../conexion.php';

/**
 * Registrar un nuevo docente
 */
function registrarDocente($nombre, $email, $password) {
    global $conexion;
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $rol = "Docente";
    
    $sql = "INSERT INTO docentes (nombre, email, password, rol) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    
    if (!$stmt) {
        error_log("Error al preparar la consulta: " . $conexion->error);
        return false;
    }
    
    $stmt->bind_param("ssss", $nombre, $email, $hashed_password, $rol);
    $resultado = $stmt->execute();
    
    if (!$resultado) {
        error_log("Error al ejecutar: " . $stmt->error);
    }
    
    $stmt->close();
    return $resultado;
}

/**
 * Actualizar docente existente
 */
function actualizarDocente($id, $nombre, $email, $rol) {
    global $conexion;
    
    $sql = "UPDATE docentes SET nombre = ?, email = ?, rol = ? WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    
    if (!$stmt) {
        error_log("Error al preparar la consulta: " . $conexion->error);
        return false;
    }
    
    $stmt->bind_param("sssi", $nombre, $email, $rol, $id);
    $resultado = $stmt->execute();
    
    if (!$resultado) {
        error_log("Error al ejecutar: " . $stmt->error);
    }
    
    $stmt->close();
    return $resultado;
}

/**
 * Obtener todos los docentes
 */
function obtenerDocentes() {
    global $conexion;
    
    $sql = "SELECT id, nombre, email, rol FROM docentes";
    $result = $conexion->query($sql);
    
    if (!$result) {
        error_log("Error en la consulta: " . $conexion->error);
        return [];
    }
    
    $docentes = [];
    while ($row = $result->fetch_assoc()) {
        $docentes[] = $row;
    }
    
    return $docentes;
}

/**
 * Eliminar un docente
 */
function eliminarDocente($id) {
    global $conexion;
    
    $sql = "DELETE FROM docentes WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    
    if (!$stmt) {
        error_log("Error al preparar la consulta: " . $conexion->error);
        return false;
    }
    
    $stmt->bind_param("i", $id);
    $resultado = $stmt->execute();
    
    if (!$resultado) {
        error_log("Error al ejecutar: " . $stmt->error);
    }
    
    $stmt->close();
    return $resultado;
}
/**
 * Registrar una nueva materia
 */
function registrarMateria($nombre, $codigo, $creditos, $docente_id = null) {
    global $conexion;
    
    $sql = "INSERT INTO materias (nombre, codigo, creditos, docente_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    
    if (!$stmt) {
        error_log("Error al preparar: " . $conexion->error);
        return false;
    }
    
    $stmt->bind_param("ssii", $nombre, $codigo, $creditos, $docente_id);
    $resultado = $stmt->execute();
    
    $stmt->close();
    return $resultado;
}

/**
 * Obtener todas las materias con información del docente
 */
function obtenerMateriasConDocentes() {
    global $conexion;
    
    $sql = "SELECT m.*, d.nombre as docente_nombre 
            FROM materias m
            LEFT JOIN docentes d ON m.docente_id = d.id";
    $result = $conexion->query($sql);
    
    $materias = [];
    while ($row = $result->fetch_assoc()) {
        $materias[] = $row;
    }
    
    return $materias;
}

/**
 * Obtener todos los docentes para select options
 */
function obtenerDocentesParaSelect() {
    global $conexion;
    
    $sql = "SELECT id, nombre FROM docentes ORDER BY nombre";
    $result = $conexion->query($sql);
    
    $docentes = [];
    while ($row = $result->fetch_assoc()) {
        $docentes[] = $row;
    }
    
    return $docentes;
}
?>