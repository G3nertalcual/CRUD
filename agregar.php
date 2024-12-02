<?php 
// Conexión a la base de datos
include("conexion.php");
?>
<html>
<head>
    <!-- Archivo CSS específico para estilizar esta página -->
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>AGREGAR</title>
</head>
<body>
<?php
// Lógica para agregar un nuevo registro al enviar el formulario
if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre']; // Datos del nuevo registro
    $nocontrol = $_POST['nocontrol'];
    $trabajo_equipo = $_POST['trabajo_equipo'];
    $responsabilidad = $_POST['responsabilidad'];
    $creatividad = $_POST['creatividad'];
    $comunicacion = $_POST['comunicacion'];
    $esfuerzo = $_POST['esfuerzo'];

    // Consulta SQL para insertar el nuevo registro en la base de datos
    $sql = "INSERT INTO alumnos (nombre, nocontrol, trabajo_equipo, responsabilidad, creatividad, comunicacion, esfuerzo)
            VALUES ('$nombre', '$nocontrol', '$trabajo_equipo', '$responsabilidad', '$creatividad', '$comunicacion', '$esfuerzo')";

    $resultado = mysqli_query($conexion, $sql); // Ejecuta la consulta

    // Mensaje de confirmación o error
    if ($resultado) {
        echo "<script language='JavaScript'>
                alert('Los datos se guardaron correctamente');
                location.assign('index.php');
              </script>";
    } else {
        echo "<script language='JavaScript'>
                alert('Los datos NO se guardaron correctamente');
                location.assign('index.php');
              </script>";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
} else {
?>
    <!-- Formulario para agregar un nuevo registro -->
    <h1>Agregar Nuevo Alumno</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" required> <br>

        <label>No. control:</label>
        <input type="text" name="nocontrol" required> <br>

        <label>Trabajo en equipo:</label>
        <input type="number" name="trabajo_equipo" min="1" max="10" required> <br>

        <label>Responsabilidad:</label>
        <input type="number" name="responsabilidad" min="1" max="10" required> <br>

        <label>Creatividad:</label>
        <input type="number" name="creatividad" min="1" max="10" required> <br>

        <label>Comunicación:</label>
        <input type="number" name="comunicacion" min="1" max="10" required> <br>

        <label>Esfuerzo:</label>
        <input type="number" name="esfuerzo" min="1" max="10" required> <br>

        <input type="submit" name="enviar" value="AGREGAR"> <!-- Botón para agregar -->
        <a href="index.php">Regresar</a> <!-- Enlace para volver a la página principal -->
    </form>
<?php
}
?>
</body>
</html>
