<?php
include 'conexion.php';

$sql = "INSERT INTO usuarios (email, password, rol) VALUES ('arturobl00@msn.com', '" . password_hash('123456', PASSWORD_DEFAULT) . "', 'admin')";
$result = mysqli_query($con, $sql);

if (!$result) {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}else{
    echo "Admin added successfully";
}
?>