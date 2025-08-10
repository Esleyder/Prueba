<?php
include 'conexion.php';

// Crear ciudad
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_ciudad = $_POST['nombre_ciudad'];
    $departamento_id = $_POST['departamento_id'];

    // Sanitizar datos para evitar SQL Injection (opcional pero recomendado)
    $nombre_ciudad = mysqli_real_escape_string($conexion, $nombre_ciudad);
    $departamento_id = intval($departamento_id);

    $sql = "INSERT INTO ciudad (nombre_ciudad, departamento_id) VALUES ('$nombre_ciudad', $departamento_id)";

    if (mysqli_query($conexion, $sql)) {
        header("Location: Ciudades.php"); // Cambia a la página donde muestras las ciudades
        exit;
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>

