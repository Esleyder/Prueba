<?php
include 'conexion.php';
 
//Crear
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_pais = $_POST['nombre_pais'];
 

    $sql = "INSERT INTO pais (nombre_pais) VALUES ('$nombre_pais')";
    if (mysqli_query($conexion, $sql)) {
        header("Location: Pais.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}

 
?>
