<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semana 2 Topicos Avanzados de Programación</title>
</head>
<body>
    <h1>Diseño de Operaciones CRUD en PHP y MySQli</h1>
    <h2>Modulo 1: Insertar Datos</h2>
    <h3>Formulario HTML a PHP</h3>

    <form method = "post">
        <p>Nombre: <input type="text" name="nombre"></p>
        <p>Edad: <input type="text" name="edad"></p>
        <p>Telefono: <input type="text" name="tel"></p>
        <p><input type="submit" value="Enviar"></p>
    </form>
<!--Importando Conexion a base de datos-->
    <?php
        Include 'conexion.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $name = $_POST['nombre'];
           $age = $_POST['edad'];
           $phone = $_POST['tel'];
           //Metodo Insert
           $query_insert = "INSERT INTO datos (nombre, edad, telefono) VALUES ('$name', '$age', '$phone')";
           mysqli_query($conexion, $query_insert);
        }
    ?>

    <h3>Modulo Despliegue de datos <a href="mostrar.php">Aqui</a></h3>
</body>
</html>