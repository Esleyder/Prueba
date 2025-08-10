<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_ciudad = isset($_POST['id_ciudad']) ? intval($_POST['id_ciudad']) : 0;
    $nombre_ciudad = isset($_POST['nombre_ciudad']) ? mysqli_real_escape_string($conexion, $_POST['nombre_ciudad']) : '';
    $departamento_id = isset($_POST['departamento_id']) ? intval($_POST['departamento_id']) : 0;

    if ($id_ciudad <= 0 || empty($nombre_ciudad) || $departamento_id <= 0) {
        die("Datos inválidos.");
    }

    $sql = "UPDATE ciudad SET nombre_ciudad = '$nombre_ciudad', departamento_id = $departamento_id WHERE id_ciudad = $id_ciudad";

    if (mysqli_query($conexion, $sql)) {
        header("Location: ciudades.php");
        exit;
    } else {
        echo "Error al actualizar la ciudad: " . mysqli_error($conexion);
    }
} else {
    die("Acceso inválido.");
}
?>
