<?php
//conexion a la base de datos
include 'conexion.php'; 

// Consulta para obtener ciudades, nombre del departamento y nombre del país sin JOIN explícito
$sql = "
SELECT 
    c.id_ciudad,
    c.nombre_ciudad,
    d.nombre_departamento,
    p.nombre_pais
FROM ciudad c, departamento d, pais p
WHERE c.departamento_id = d.id_departamento
  AND d.pais_id = p.id_pais
ORDER BY p.nombre_pais, d.nombre_departamento, c.nombre_ciudad;
";

$result = mysqli_query($conexion, $sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

$ciudades = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Ciudades</title>
</head>
<body>
<h2>Ciudades</h2>
<a href="vista_ciudad.php">Crear nuevo registro</a>
<table border="1">
    <tr>
        <th>Id Ciudad</th>
        <th>Nombre Ciudad</th>
        <th>Nombre Departamento</th>
        <th>Nombre País</th>
        <th>Acciones</th>
    </tr>
    <?php
    foreach ($ciudades as $ciudad) {
        echo "<tr>
            <td>" . htmlspecialchars($ciudad['id_ciudad']) . "</td>
            <td>" . htmlspecialchars($ciudad['nombre_ciudad']) . "</td>
            <td>" . htmlspecialchars($ciudad['nombre_departamento']) . "</td>
            <td>" . htmlspecialchars($ciudad['nombre_pais']) . "</td>
            <td>
                <a href='formulario_editarciudad.php?id_ciudad={$ciudad['id_ciudad']}'>Editar</a> |
                <a href='eliminar_ciudad.php?id_ciudad={$ciudad['id_ciudad']}'>Eliminar</a>
            </td>
        </tr>";
    }
    ?>
</table>
<a href="index.php">Volver a menú de vistas</a>
</body>
</html>
