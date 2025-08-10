 <?php
include 'conexion.php';

// Crear
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_departamento = $_POST['nombre_departamento'];
    $pais_id = $_POST['pais_id'];

    $sql = "INSERT INTO departamento (nombre_departamento, pais_id) VALUES ('$nombre_departamento', $pais_id)";

    if (mysqli_query($conexion, $sql)) {
        header("Location: Departamentos.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>
