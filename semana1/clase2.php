<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase 2 - Topicos Avanzados de Programación</title>
</head>
<body>
    <h1>Clase 2 - sintaxis de PHP</h1>
    <h2>Ejemplo 1 - Salida de Texto por PHP funcion echo</h2>
<!--Ejemplo de como integrar una etiqueta php con un echo-->
    <?php
        echo "<p>Este es un texto generado por PHP</p>";
    ?>
    <h2>Ejemplo 2 - Sensibilidad entre mayusculas y minusculas en php no hay Sensibilidad en las funciones nativas</h2>
    <?php
        ECHO "Hello World!<br>";
        echo "Hello World!<br>";
        EcHo "Hello World!<br>";
    ?>
    <h2>Ejemplo 3 - Sencibilidad en variables en php si hay Sensibilidad en la declaracion de variables</h2>
    <?php
        $color = "rojo";
        echo "Mi carro es de color: ".$color."<br>";
        echo "Mi casa es de color: ".$COLOR."<br>";
        echo "Mi barco es de color: ".$coLOR."<br>";
    ?>

    <h2>Comentarios en PHP</h2>
    <ol>
        <li>Comentario de una sola linea</li>
        <?php
            //Este es un comentario de una sola linea
            echo "Este es un comentario de una sola linea";
        ?>
        <li>Comentario de una sola linea</li>
        <?php
            # Este es un comentario de una sola linea
            echo "Este es un comentario de una sola linea";
        ?>
        <li>Comentario de varias lineas</li>
        <?php
            /*Este es un comentario
            de varias lineas*/
            echo "Este es un comentario de varias lineas";
        ?>
    </ol>

    <h2>Variables en PHP</h2>
    <p>Creación (declaración) de variables PHP. 
    En PHP, una variable comienza con el $signo, seguido del nombre de la variable:</p>
    <h3>Declaración de Variable</h3>
    <?php
        $txt = "Hola Mundo!";
        $x = 5;
        $y = 10.5;
        $bandera = true;
        echo "El contenido de la variable txt es: ".$txt;
        echo "<br>";
        echo "El contenido de la variable x es: ".$x;
        echo "<br>";
        echo "El contenido de la variable y es: ".$y;
        echo "<br>";
        echo "El contenido de la variable bandera es: ".$bandera;
    ?>

    <h3>Ejemplo de concatenar variables</h3>
    <?php
$nombre = "Carlos";
$edad = 25;
$ciudad = "Guadalajara";

echo "Había una vez un joven llamado <b>" . $nombre . "</b> que tenía " . $edad . " años.  
Vivía en la hermosa ciudad de " . $ciudad . " y soñaba con convertirse en un gran programador. <br> 
Cada día, " . $nombre . " practicaba escribiendo código en PHP y descubrió que podía unir texto y variables usando el operador de concatenación (.)";
?>

<h2>Trabajando Variables</h2>
<h3>Variable nivel 1: Simple</h3>
<?php
$nombre = "José Arturo";
echo "Mi nombre es: ".$nombre;
?>

<h3>Variable nivel 2: Arreglo</h3>
<p>Arreglo de nombres</p>
<?php
$nombres = ["José Arturo", "María", "Pedro", "Juan"];
echo "<ul>";
foreach($nombres as $nombre){
    echo "<li>".$nombre."</li>";
}
echo "</ul>";
?>

<p>Arreglo de Colores</p>
<?php
$colores = ["rojo", "azul", "verde", "amarillo","rosa", "morado", "naranja","blanco", "negro", "violeta", "cafe"];
echo "<ul>";
foreach($colores as $color){
    echo "<li>".$color."</li>";
}
echo "</ul>";
?>

<p>Arreglo con el nombre de los 150 Pokemones</p>
<?php
    $pokemons = array(
        "Bulbasaur", "Ivysaur", "Venusaur", "Charmander", "Charmeleon", "Charizard",
        "Squirtle", "Wartortle", "Blastoise", "Caterpie", "Metapod", "Butterfree",
        "Weedle", "Kakuna", "Beedrill", "Pidgey", "Pidgeotto", "Pidgeot", "Rattata", "Raticate", "Spearow", "Fearow", "Ekans", "Arbok", "Pikachu", "Raichu", "Sandshrew", "Sandslash", "Nidoran♀", "Nidorina", "Nidoqueen", "Nidoran♂", "Nidorino", "Nidoking", "Clefairy", "Clefable", "Vulpix", "Ninetales", "Jigglypuff", "Wigglytuff", "Zubat", "Golbat",
        "Oddish", "Gloom", "Vileplume", "Paras", "Parasect", "Venonat",
        "Venomoth", "Diglett", "Dugtrio", "Meowth", "Persian", "Psyduck",
        "Golduck", "Mankey", "Primeape", "Growlithe", "Arcanine", "Poliwag",
        "Poliwhirl", "Poliwrath", "Abra", "Kadabra", "Alakazam", "Machop",
        "Machoke", "Machamp", "Bellsprout", "Weepinbell", "Victreebel", "Tentacool",
        "Tentacruel", "Geodude", "Graveler", "Golem", "Ponyta", "Rapidash",
        "Slowpoke", "Slowbro", "Magnemite", "Magneton", "Farfetch’d", "Doduo",
        "Dodrio", "Seel", "Dewgong", "Grimer", "Muk", "Shellder",
        "Cloyster", "Gastly", "Haunter", "Gengar", "Onix", "Drowzee",
        "Hypno", "Krabby", "Kingler", "Voltorb", "Electrode", "Exeggcute", 
        "Exeggutor", "Cubone", "Marowak", "Hitmonlee", "Hitmonchan", "Lickitung",
        "Koffing", "Weezing", "Rhyhorn", "Rhydon", "Chansey", "Tangela",
        "Kangaskhan", "Horsea", "Seadra", "Goldeen", "Seaking", "Staryu",
        "Starmie", "Mr. Mime", "Scyther", "Jynx", "Electabuzz", "Magmar",
        "Pinsir", "Tauros", "Magikarp", "Gyarados", "Lapras", "Ditto",
        "Eevee", "Vaporeon", "Jolteon", "Flareon", "Porygon", "Omanyte",
        "Omastar", "Kabuto", "Kabutops", "Aerodactyl", "Snorlax", "Articuno",
        "Zapdos", "Moltres", "Dratini", "Dragonair", "Dragonite", "Mewtwo",
        "Mew"
    );
    echo "<p>Lista de 150 Pokemones</p>";
    echo "<ol>";
    foreach($pokemons as $pokemon){
        echo "<li>".$pokemon."</li>";
    }
    echo "</ol>";
?>
</body>
</html>