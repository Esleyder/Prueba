 <?php
include 'conexion.php'; 
//consulta 
$sql = "
SELECT 
    p.nombre_pais,
    (SELECT COUNT(*) 
     FROM departamento d 
     WHERE d.pais_id = p.id_pais) AS cantidad_departamentos,
    d.nombre_departamento,
    (SELECT COUNT(*) 
     FROM ciudad c 
     WHERE c.departamento_id = d.id_departamento) AS cantidad_ciudades
FROM pais p, departamento d
WHERE d.pais_id = p.id_pais;
";

$result = mysqli_query($conexion, $sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

// Convertir a array asociativo 
$filas = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prueba</title>
</head>
<body>
<h2>Departamentos y Paises</h2>
<br>
<a href="Pais.php">Vista a Paises</a>
<br>
<br>
<a href="Departamentos.php">Vista a Departamentos</a>
<br>
<br>
<a href="Ciudades.php">Vista a ciudades</a>
<br>
<br>
<table border="1">
    <tr>
        <th>País</th>
        <th>Departamento</th>
        <th>Cantidad de Ciudades</th>
        <th>Cantidad de Departamentos en el País</th>
    </tr>
    <?php
    foreach ($filas as $fila) {
        echo "<tr>
            <td>" . htmlspecialchars($fila['nombre_pais']) . "</td>
            <td>" . htmlspecialchars($fila['nombre_departamento']) . "</td>
            <td>" . intval($fila['cantidad_ciudades']) . "</td>
            <td>" . intval($fila['cantidad_departamentos']) . "</td>
        </tr>";
    }
    ?>
</table>
</body>
</html>
