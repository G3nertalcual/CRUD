<?php 
    include("conexion.php");
?>
<html>
    <head>
        <title>EDITAR</title>
    </head>
<body>
    <?php
        if(isset($_POST['enviar'])){
            //aqui entra cuando se presiona el boton de enviar
            $id=$_POST['id'];
            $nombre=$_POST['nombre'];
            $nocontrol=$_POST['nocontrol'];
            
            //update alumnos set nombre=$nombre,nocontrol=$nocontrol where id=$id
            $sql="update alumnos set nombre='".$nombre."', nocontrol='".$nocontrol."'where id='".$id."'";
            $resultado=mysqli_query($conexion,$sql);

                if($resultado){
                    echo "<script language='JavaScript'>
                            alert('Los datos se actualizaron correctamente');
                            location.assign('index.php');
                            </script>";
                }else{
                    echo "<script language='JavaScript'>
                    alert('Los datos NO se actualizaron correctamente');
                    location.assign('index.php');
                    </script>";
                }
                mysqli_close($conexion);
        }else{            
            //aqui entra si no se ha presionado el boton enviar
            $id=$_GET['id'];
            $sql = "select * from alumnos where id='".$id."'";
            $resultado = mysqli_query($conexion,$sql);

            $fila=mysqli_fetch_assoc( $resultado );
            $nombre= $fila["nombre"];
            $nocontrol= $fila["nocontrol"];

            mysqli_close($conexion);
    ?>
     <h1>Editar Alumno</h1>
     <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>"> <br>

        <label>No. control</label>
        <input type="text" name="nocontrol" value="<?php echo $nocontrol; ?>"> <br>
        
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="submit" name="enviar" value="ACTUALIZAR">
        <a href="index.php">Regresar</a> 
    </form>
    <?php
        }
    ?>
</body>
</html>