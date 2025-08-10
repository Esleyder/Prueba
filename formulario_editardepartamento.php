 <?php
include 'conexion.php';

// Obtener el id del departamento desde GET
$id_departamento = isset($_GET['id_departamento']) ? intval($_GET['id_departamento']) : null;

if (!$id_departamento) {
    die("ID de departamento no especificado.");
}

// Obtener datos del departamento
$result = mysqli_query($conexion, "SELECT * FROM departamento WHERE id_departamento = $id_departamento");
if (!$result || mysqli_num_rows($result) == 0) {
    die("Departamento no encontrado.");
}
$departamento = mysqli_fetch_assoc($result);

// Obtener países para el select
$sql_paises = "SELECT id_pais, nombre_pais FROM pais";
$result_paises = $conexion->query($sql_paises);
?>

<h2>Editar Departamento</h2>
<form method="POST" action="editar_departamento.php">
    <input type="hidden" name="id_departamento" value="<?php echo $id_departamento; ?>">
    
    Nombre Departamento: 
    <input type="text" name="nombre_departamento" value="<?php echo htmlspecialchars($departamento['nombre_departamento']); ?>" required>
    <br><br>
    
    País:
    <select name="pais_id" required>
        <option value="">Selecciona un país</option>
        <?php
        if ($result_paises->num_rows > 0) {
            while ($fila = $result_paises->fetch_assoc()) {
                $selected = ($fila['id_pais'] == $departamento['pais_id']) ? "selected" : "";
                echo "<option value='{$fila['id_pais']}' $selected>{$fila['nombre_pais']}</option>";
            }
        }
        ?>
    </select>
    <br><br>
    
    <button type="submit">Actualizar</button>
</form>

<a href="departamentos.php">Volver a Departamento</a>

