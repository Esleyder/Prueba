<?php
include 'conexion.php';

// Consultar países para el select 
//order by para oedenarlos
$sql_paises = "SELECT id_pais, nombre_pais FROM pais ORDER BY nombre_pais";
$result_paises = $conexion->query($sql_paises);


// Consultar departamentos para el select
$sql_departamentos = "SELECT id_departamento, nombre_departamento FROM departamento ORDER BY nombre_departamento";
$result_departamentos = $conexion->query($sql_departamentos);
?>

<h2>Formulario Crear Ciudad</h2>
<form method="POST" action="crear_ciudad.php">
    Nombre Ciudad: <input type="text" name="nombre_ciudad" required>
    <br>
    <br>
    Nombre País:
    <select name="pais_id" required>
        <option value=""> Selecciona un país</option>
        <?php
        if ($result_paises->num_rows > 0) {
            while ($fila = $result_paises->fetch_assoc()) {
                echo "<option value='{$fila['id_pais']}'>{$fila['nombre_pais']}</option>";
            }
        } 
        ?>
    </select>
    <br>
    <br>
    Nombre Departamento:
    <select name="departamento_id" required>
        <option value=""> Selecciona un departamento</option>
        <?php
        if ($result_departamentos->num_rows > 0) {
            while ($fila = $result_departamentos->fetch_assoc()) {
                echo "<option value='{$fila['id_departamento']}'>{$fila['nombre_departamento']}</option>";
            }
        } 
        ?>
    </select>

    <br>
    <br>
    <button type="submit">Guardar</button>
</form>
<a href="Ciudades.php">Atrás</a>

