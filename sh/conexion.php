<?php
$host="localhost";
$user="root";
$pass="";
$db="asistencia";

$con = mysqli_connect($host,$user,$pass,$db);
if (!$con) {
    echo('Could not connect: ' . mysql_error());
}
?>