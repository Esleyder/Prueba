<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_departamento = intval($_POST['id_departamento']);
    $nombre_departamento = $_POST['nombre_departamento'];
    $pais_id = intval($_POST['pais_id']);

    $sql = "UPDATE departamento SET nombre_departamento = '$nombre_departamento', pais_id = $pais_id WHERE id_departamento = $id_departamento";

    if (mysqli_query($conexion, $sql)) {
        header("Location: departamentos.php");
        exit;
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
} else {
    echo "Acceso no autorizado.";
}
 