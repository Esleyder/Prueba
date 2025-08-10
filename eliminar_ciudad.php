<?php
include 'conexion.php';

$id_ciudad = (int) $_GET['id_ciudad'];

// Eliminar la ciudad especificada
mysqli_query($conexion, "DELETE FROM ciudad WHERE id_ciudad = $id_ciudad");

header("Location: Ciudades.php");
exit;
?>
