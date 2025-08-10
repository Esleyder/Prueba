 <?php
//conexion a la base de datos
include 'conexion.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de departamentos</title>
</head>
<body>
<h2>Departamentos</h2>
<a href="vista_departamento.php">Crear nuevo registro</a>
<table border="1">
    <tr>
        <th>Id</th>
        <th>Nombre Departamento</th>
        <th>País</th>
        <th>Acciones</th>
    </tr>
    <?php
       //consulta nombre del departamento  y a que pais pertenece
    $sql = "SELECT d.id_departamento, d.nombre_departamento, p.nombre_pais
            FROM departamento d, pais p
            WHERE d.pais_id = p.id_pais";

    $result = mysqli_query($conexion, $sql);

    // Recorrer resultados
    while ($departamento = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$departamento['id_departamento']}</td>
            <td>{$departamento['nombre_departamento']}</td>
            <td>{$departamento['nombre_pais']}</td>
            <td>
                <a href='eliminar_departamento.php?id_departamento={$departamento['id_departamento']}'>Eliminar Registro</a> |
                <a href='formulario_editardepartamento.php?id_departamento={$departamento['id_departamento']}'>Editar Registro</a>
            </td>
        </tr>";
    }
    ?>
</table>
<a href="index.php">Volver a menú de vistas</a>
</body>
</html>
