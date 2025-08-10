 <?php
include 'crear_departamento.php';

//consulto a la base de datos por el nombre del pais
$sql = "SELECT id_pais, nombre_pais FROM pais";
$resultado = $conexion->query($sql);
?>

<h2>Formulario Crear Departamento</h2>
<form method="POST">
    Nombre Departamento: <input type="text" name="nombre_departamento" required>
    <br>
    <br>
    nombre País:
    <select name="pais_id" required>
        <option value=""> Selecciona un país</option>
        <?php
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<option value='{$fila['id_pais']}'>{$fila['nombre_pais']}</option>";
            }
        } 
        ?>
    </select>
    <br>
    <br>
    <button type="submit">Guardar</button>
</form>
<a href="Departamentos.php">Atrás</a>

