<?php 
include("conexion.php");
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>EDITAR</title>
</head>
<body>
<?php
if(isset($_POST['enviar'])) {
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $nocontrol=$_POST['nocontrol'];
    $trabajo_equipo=$_POST['trabajo_equipo'];
    $responsabilidad=$_POST['responsabilidad'];
    $creatividad=$_POST['creatividad'];
    $comunicacion=$_POST['comunicacion'];
    $esfuerzo=$_POST['esfuerzo'];

    $sql="UPDATE alumnos SET 
        nombre='$nombre', 
        nocontrol='$nocontrol',
        trabajo_equipo='$trabajo_equipo',
        responsabilidad='$responsabilidad',
        creatividad='$creatividad',
        comunicacion='$comunicacion',
        esfuerzo='$esfuerzo' 
        WHERE id='$id'";
    $resultado=mysqli_query($conexion, $sql);

    if($resultado) {
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
    mysqli_close($conexion);
} else {            
    $id=$_GET['id'];
    $sql="SELECT * FROM alumnos WHERE id='$id'";
    $resultado=mysqli_query($conexion, $sql);
    $fila=mysqli_fetch_assoc($resultado);

    mysqli_close($conexion);
?>
    <h1>Editar Alumno</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
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

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="submit" name="enviar" value="ACTUALIZAR">
        <a href="index.php">Regresar</a>
    </form>
<?php
}
?>
</body>
</html>
