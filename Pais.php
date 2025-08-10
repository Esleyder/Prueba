 
<?php
//conexion a la base de datos
include 'conexion.php'; 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Paises</title>
</head>
<body>
<h2> Paises</h2>
<a href="vista_pais.php">Crear nuevo registro de Pais</a>
<table border="1">
    <tr>
        <th>id</th>
        <th>nombre_pais</th>
        <th>Acciones</th>
    </tr>
    <?php

    // Ejecutar consulta 
    $result = mysqli_query($conexion, " SELECT * FROM  pais  ");

    // Convertir a array asociativo
    $paises = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Recorrer con foreach
    foreach ($paises as $pais) {
        echo "<tr>
            <td>{$pais['id_pais']}</td>
            <td>{$pais['nombre_pais']}</td>
 
            <td>
                <a href='formulario_editarpais.php?id_pais={$pais['id_pais']}'> Editar</a> |
                <a href='eliminar_pais.php?id_pais={$pais['id_pais']}'>Eliminar Registro </a>
            </td>
        </tr>";
    }
    ?>
</table>
<a href="index.php">Volver a menu de vistas</a>
</body>
</html>
