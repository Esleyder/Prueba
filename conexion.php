<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "prueba";

$conexion = new mysqli($host, $usuario, $clave, $bd);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

echo "conexion a la base de datos exitosa";

?>
