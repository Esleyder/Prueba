 <?php
include 'conexion.php';

//obtengo el id del pais que voy a actualizar
$id_pais = $_GET['id_pais'] ?? null;


// Obtener datos del país
$result = mysqli_query($conexion, "SELECT * FROM pais WHERE id_pais=$id_pais");
$pais = mysqli_fetch_assoc($result);

 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_pais = $_POST['nombre_pais'];

    $sql = "UPDATE pais SET nombre_pais='$nombre_pais' WHERE id_pais=$id_pais";

    if (mysqli_query($conexion, $sql)) {
        header("Location: pais.php"); // Vuelve a la lista
        exit;
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
}
?>
