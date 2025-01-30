<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semana 1 Topicos Av Intro PHP</title>
</head>
<body>
    <h1>Hola este es el primer archivo de php</h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet voluptate, harum doloremque laborum vitae deleniti itaque modi qui eveniet cupiditate illo. Voluptatem at eaque quisquam, veniam dignissimos harum pariatur dolores?</p>
    
    <form method="post" action="">
        <label for="num1">Número 1:</label>
        <input type="number" id="num1" name="a" required>
        <br>
        <label for="num2">Número 2:</label>
        <input type="number" id="num2" name="b" required>
        <br>
        <input type="submit" value="Sumar">
    </form>

    <h2>Vinculo a la Clase 2</h2>
    <a href="clase2.php">Ir a la Clase 2</a>
    
    <?php
        //Declarar Variable Regla 1 Poner el signo de $ antes del nombre
        $saludo = "Hola Chicos esto es PHP";
        echo "Hola Mundo, ".$saludo;

        //Declarar una funcion en PHP
        function suma($num1, $num2){
            return $num1 + $num2;
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $num1 = $_POST["a"];
            $num2 = $_POST["b"];
            $resultado = suma($num1, $num2);
            echo "<h2>El resultado de la suma es: $resultado</h2>";
        }

    ?>
</body>
</html>