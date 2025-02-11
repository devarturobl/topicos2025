<?php
include 'conexion.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM datos WHERE id = $id";
    $resultado = mysqli_query($conexion, $query);


    if($fila = mysqli_fetch_assoc($resultado)){
        $nombre = $fila['nombre'];
        $edad = $fila['edad'];
        $telefono = $fila['telefono'];
    }else {
        //echo "<script>alert('Registro no encontrado.'); window.location='mostrar.php';</script>";
        exit();
    }
}else {
    echo "<script>alert('ID inválido.'); window.location='error.html';</script>";
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $query_delete = "DELETE FROM datos WHERE id=$id";
    
    if (mysqli_query($conexion, $query_delete)) {
            echo '
            <div class="modal fade" id="alertModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title">¡Éxito!</h5>
                        </div>
                        <div class="modal-body">
                            <p>Registro eliminado correctamente.</p>
                        </div>
                        <div class="modal-footer">
                            <button id="redirectBtn" class="btn btn-primary">Aceptar</button>
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
    <title>Eliminar Registro</title>
</head>
<body class="container mt-4">
    <h2 class="text-center mb-4">Eliminar Registro</h2>
    <form method="POST" class="card p-4">
        <div class="mb-3">
            <label class="form-label">Nombre: <?php echo $nombre?></label>
        </div>
        <div class="mb-3">
            <label class="form-label"><?php echo $edad; ?></label>
        </div>
        <div class="mb-3">
            <label class="form-label">Teléfono: <?php echo htmlspecialchars($telefono); ?></label>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="mostrar.php" class="btn btn-primary">Cancelar</a>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>