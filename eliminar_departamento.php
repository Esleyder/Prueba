 <?php
include 'conexion.php';

 
$id_departamento = (int) $_GET['id_departamento'];

// Eliminar primero las ciudades de ese departamento ojo
mysqli_query($conexion, "DELETE FROM ciudad WHERE departamento_id = $id_departamento");

// Luego eliminar el departamento mucho cuidado 
mysqli_query($conexion, "DELETE FROM departamento WHERE id_departamento = $id_departamento");

header("Location: Departamentos.php");
exit;
?>
