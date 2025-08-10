 <?php
include 'conexion.php';

$id_ciudad = isset($_GET['id_ciudad']) ? intval($_GET['id_ciudad']) : 0;
if (!$id_ciudad) die("ID no especificado");

$result_ciudad = mysqli_query($conexion, "SELECT * FROM ciudad WHERE id_ciudad = $id_ciudad");
if (!$result_ciudad || mysqli_num_rows($result_ciudad) == 0) die("Ciudad no encontrada");
$ciudad = mysqli_fetch_assoc($result_ciudad);

$id_departamento_actual = $ciudad['departamento_id'];
$result_departamento = mysqli_query($conexion, "SELECT * FROM departamento WHERE id_departamento = $id_departamento_actual");
$departamento_actual = mysqli_fetch_assoc($result_departamento);
$id_pais_actual = $departamento_actual['pais_id'] ?? null;

$result_paises = mysqli_query($conexion, "SELECT * FROM pais ORDER BY nombre_pais");
$result_departamentos = mysqli_query($conexion, "SELECT * FROM departamento ORDER BY nombre_departamento");
?>

<form action="editar_ciudad.php" method="POST">
    <input type="hidden" name="id_ciudad" value="<?php echo $id_ciudad; ?>">
    Nombre Ciudad:
    <input type="text" name="nombre_ciudad" value="<?php echo htmlspecialchars($ciudad['nombre_ciudad']); ?>" required>
    <br><br>

    País:
    <select name="pais_id" required>
        <option value="">Seleccione país</option>
        <?php while ($pais = mysqli_fetch_assoc($result_paises)) : 
            $sel = ($pais['id_pais'] == $id_pais_actual) ? 'selected' : ''; ?>
            <option value="<?php echo $pais['id_pais']; ?>" <?php echo $sel; ?>>
                <?php echo htmlspecialchars($pais['nombre_pais']); ?>
            </option>
        <?php endwhile; ?>
    </select>
    <br><br>

    Departamento:
    <select name="departamento_id" required>
        <option value="">Seleccione departamento</option>
        <?php while ($dep = mysqli_fetch_assoc($result_departamentos)) : 
            $sel = ($dep['id_departamento'] == $id_departamento_actual) ? 'selected' : ''; ?>
            <option value="<?php echo $dep['id_departamento']; ?>" <?php echo $sel; ?>>
                <?php echo htmlspecialchars($dep['nombre_departamento']); ?>
            </option>
        <?php endwhile; ?>
    </select>
    <br><br>

    <button type="submit">Actualizar</button>
</form>
