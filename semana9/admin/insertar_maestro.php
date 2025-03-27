<?php
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);

    if (!empty($nombre) && !empty($email) && !empty($password)) {
        $sql = "INSERT INTO maestros (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
        $result = mysqli_query($con, $sql);

        if (!$result) {
            $error="Contraseña incorrecta";
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Contraseña incorrecta',
                        confirmButtonColor: '#800020'
                    });
                });
            </script>"; 
            $success = false;
        } else {
            $success = true; 
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Maestro agregado correctamente',
                        confirmButtonColor: '#800020'
                    });
                });
            </script>";
            
        }
    } else {
        echo '<br><div class="alert alert-warning">Todos los campos son obligatorios.</div>';
    }
}
?>