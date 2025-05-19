<?php
include 'conexion.php';

$sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES ('Ramon','outset0700st@gmail.com', '" . password_hash('ramonshesh', PASSWORD_DEFAULT) . "', 'administrador')";
$result = mysqli_query($conexion, $sql);

if (!$result) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}else{
    echo "Admin added successfully";
}
?>