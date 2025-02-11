<?php
include 'conexion.php'; // Conexión a la base de datos

// Verifica si se recibió un ID válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    //variablre local
    $id = $_GET['id'];

    // Consulta para obtener los datos del usuario
    $query = "SELECT * FROM datos WHERE id = $id";
    $resultado = mysqli_query($conexion, $query);

    // Verifica si el registro existe
    if ($fila = mysqli_fetch_assoc($resultado)) {
        $nombre = $fila['nombre'];
        $edad = $fila['edad'];
        $telefono = $fila['telefono'];
    } else {
        //echo "<script>alert('Registro no encontrado.'); window.location='mostrar.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID inválido.'); window.location='error.html';</script>";
    exit();
}

// Procesar la actualización cuando se envía el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['nombre'];
    $age = $_POST['edad'];
    $phone = $_POST['tel'];

    // Actualizar el registro
    $query_update = "UPDATE datos SET nombre='$name', edad=$age, telefono='$phone' WHERE id=$id";

    if (mysqli_query($conexion, $query_update)) {
echo '
<div class="modal fade" id="alertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">¡Éxito!</h5>
            </div>
            <div class="modal-body">
                <p>Registro actualizado correctamente.</p>
            </div>
            <div class="modal-footer">
                <button id="redirectBtn" class="btn btn-success">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Esperar a que el DOM cargue completamente
    document.addEventListener("DOMContentLoaded", function() {
        var alertModal = new bootstrap.Modal(document.getElementById("alertModal"));
        alertModal.show();

        // Redirigir al cerrar el modal
        document.getElementById("redirectBtn").addEventListener("click", function() {
            window.location.href = "mostrar.php";
        });
    });
</script>
';
    } else {
        echo '
<div class="modal fade" id="alertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">¡Error!</h5>
            </div>
            <div class="modal-body">
                <p>Error al Actualizar Registro. Entrada no Valida.</p>
            </div>
            <div class="modal-footer">
                <button id="redirectBtn" class="btn btn-danger">Terminar</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Esperar a que el DOM cargue completamente
    document.addEventListener("DOMContentLoaded", function() {
        var alertModal = new bootstrap.Modal(document.getElementById("alertModal"));
        alertModal.show();

        // Redirigir al cerrar el modal
        document.getElementById("redirectBtn").addEventListener("click", function() {
            window.location.href = "index.php";
        });
    });
</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Editar Registro</title>
</head>
<body class="container mt-4">
    <h2 class="text-center mb-4">Editar Registro</h2>
    <form method="POST" class="card p-4">
        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($nombre); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Edad:</label>
            <input type="number" name="edad" class="form-control" value="<?php echo $edad; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Teléfono:</label>
            <input type="text" name="tel" class="form-control" value="<?php echo htmlspecialchars($telefono); ?>" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="mostrar.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
