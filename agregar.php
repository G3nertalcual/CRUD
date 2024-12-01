<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>AGREGAR</title>
</head>
<body>
<?php 
if(isset($_POST['enviar'])) {
    $nombre=$_POST['nombre'];
    $nocontrol=$_POST['nocontrol'];
    $trabajo_equipo=$_POST['trabajo_equipo'];
    $responsabilidad=$_POST['responsabilidad'];
    $creatividad=$_POST['creatividad'];
    $comunicacion=$_POST['comunicacion'];
    $esfuerzo=$_POST['esfuerzo'];

    include("conexion.php");
    $sql="INSERT INTO alumnos(nombre, nocontrol, trabajo_equipo, responsabilidad, creatividad, comunicacion, esfuerzo) 
          VALUES('$nombre', '$nocontrol', '$trabajo_equipo', '$responsabilidad', '$creatividad', '$comunicacion', '$esfuerzo')";

    $resultado=mysqli_query($conexion, $sql);

    if($resultado) {
        echo "<script language='JavaScript'>
                alert('Los datos fueron ingresados correctamente a la BD');
                location.assign('index.php');
              </script>";
    } else {
        echo "<script language='JavaScript'>
                alert('ERROR: Los datos NO fueron ingresados a la BD');
                location.assign('index.php');
              </script>";
    }
    mysqli_close($conexion);
} else {
?>
    <h1>Agregar nuevo alumno</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre"> <br>

        <label>No. Control:</label>
        <input type="text" name="nocontrol"> <br>

        <label>Trabajo en equipo:</label>
        <input type="number" name="trabajo_equipo" min="1" max="10"> <br>

        <label>Responsabilidad:</label>
        <input type="number" name="responsabilidad" min="1" max="10"> <br>

        <label>Creatividad:</label>
        <input type="number" name="creatividad" min="1" max="10"> <br>

        <label>Comunicación:</label>
        <input type="number" name="comunicacion" min="1" max="10"> <br>

        <label>Esfuerzo:</label>
        <input type="number" name="esfuerzo" min="1" max="10"> <br>

        <input type="submit" name="enviar" value="AGREGAR">
        <a href="index.php">Regresar</a>
    </form>
<?php 
}
?>
</body>
</html>
