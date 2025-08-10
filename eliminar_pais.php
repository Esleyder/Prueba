<?php
include 'conexion.php';
//Eliminar 
$id_pais = $_GET['id_pais'];
mysqli_query($conexion, "DELETE FROM pais WHERE id_pais=$id_pais");
header("Location: Pais.php");
 
?>
