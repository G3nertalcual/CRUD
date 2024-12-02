<?php 
// Conexión a la base de datos
include("conexion.php");
?>
<html>
<head>
    <!-- Archivo CSS específico para estilizar esta página -->
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>EDITAR</title>
</head>
<body>
<?php
// Lógica para actualizar los datos al enviar el formulario
if (isset($_POST['enviar'])) {
    $id = $_POST['id']; // ID del registro a editar
    $nombre = $_POST['nombre']; // Nuevos datos
    $nocontrol = $_POST['nocontrol'];
    $trabajo_equipo = $_POST['trabajo_equipo'];
    $responsabilidad = $_POST['responsabilidad'];
    $creatividad = $_POST['creatividad'];
    $comunicacion = $_POST['comunicacion'];
    $esfuerzo = $_POST['esfuerzo'];

    // Consulta SQL para actualizar el registro
    $sql = "UPDATE alumnos SET 
        nombre='$nombre', 
        nocontrol='$nocontrol',
        trabajo_equipo='$trabajo_equipo',
        responsabilidad='$responsabilidad',
        creatividad='$creatividad',
        comunicacion='$comunicacion',
        esfuerzo='$esfuerzo' 
        WHERE id='$id'";
    $resultado = mysqli_query($conexion, $sql); // Ejecuta la consulta

    // Mensaje de confirmación o error
    if ($resultado) {
        echo "<script language='JavaScript'>
                alert('Los datos se actualizaron correctamente');
                location.assign('index.php');
              </script>";
    } else {
        echo "<script language='JavaScript'>
                alert('Los datos NO se actualizaron correctamente');
                location.assign('index.php');
              </script>";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
} else {            
    // Si no se envió el formulario, obtiene el registro a editar
    $id = $_GET['id']; // ID del registro
    $sql = "SELECT * FROM alumnos WHERE id='$id'"; // Consulta para obtener los datos
    $resultado = mysqli_query($conexion, $sql); // Ejecuta la consulta
    $fila = mysqli_fetch_assoc($resultado); // Obtiene el registro como un array asociativo

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
?>
    <!-- Formulario para editar los datos -->
    <h1>Editar Alumno</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <!-- Campos prellenados con los datos actuales -->
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>"> <br>

        <label>No. control:</label>
        <input type="text" name="nocontrol" value="<?php echo $fila['nocontrol']; ?>"> <br>

        <label>Trabajo en equipo:</label>
        <input type="number" name="trabajo_equipo" min="1" max="10" value="<?php echo $fila['trabajo_equipo']; ?>"> <br>

        <label>Responsabilidad:</label>
        <input type="number" name="responsabilidad" min="1" max="10" value="<?php echo $fila['responsabilidad']; ?>"> <br>

        <label>Creatividad:</label>
        <input type="number" name="creatividad" min="1" max="10" value="<?php echo $fila['creatividad']; ?>"> <br>

        <label>Comunicación:</label>
        <input type="number" name="comunicacion" min="1" max="10" value="<?php echo $fila['comunicacion']; ?>"> <br>

        <label>Esfuerzo:</label>
        <input type="number" name="esfuerzo" min="1" max="10" value="<?php echo $fila['esfuerzo']; ?>"> <br>

        <!-- Campo oculto para enviar el ID del registro -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="submit" name="enviar" value="ACTUALIZAR"> <!-- Botón para actualizar -->
        <a href="index.php">Regresar</a> <!-- Enlace para volver a la página principal -->
    </form>
<?php
}
?>
</body>
</html>
