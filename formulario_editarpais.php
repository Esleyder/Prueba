 <?php
include 'editar_pais.php';
 
?>

<h2>Editar Pais</h2>
<form method="POST" action="editar_pais.php?id_pais=<?php echo $id_pais; ?>">
    Nombre País:
    <input type="text" name="nombre_pais" value="<?php echo $pais['nombre_pais']; ?>" required><br><br>
    <button type="submit">Actualizar</button>
</form>

<a href="pais.php">Volver a países</a>
