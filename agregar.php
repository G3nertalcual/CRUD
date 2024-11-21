<html>
<head>
    <title>AGREGAR</title>
</head>
<body>
<?php 
    if(isset($_POST['enviar'])){
        $nombre=$_POST['nombre'];
        $nocontrol=$_POST['nocontrol'];

        include("conexion.php");
        //insert into alumnos(nombre,nocontrol)
        //values($nombre,$nocontrol);
        $sql="insert into alumnos(nombre,nocontrol)
        values('".$nombre."', '".$nocontrol."')";

        $resultado=mysqli_query($conexion,$sql);

        if($resultado){
            echo "<script language='JavaScript'>
                    alert('Los datos fueron ingresados correctamente a la BD');
                    location.assign('index.php');
                    </script>";
        }else{
            echo "<script language='JavaScript'>
            alert('ERROR: Los datos NO fueron ingresados a la BD');
            location.assign('index.php');
            </script>";
        }
        mysqli_close($conexion);
    }else{
?>
    <h1>Agregar nuevo alumno</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre"> <br>
        <label>No. Control</label>
        <input type="text" name="nocontrol"> <br>
        <input type="submit" name="enviar" value="AGREGAR">
        <a href="index.php">Regresar</a>
    </form>
    <?php 
    }
    ?>
</body>
</html>