<html>
<head>
<title>Lista de alumnos</title>
<script type="text/javascript">
    function confirmar() {
        return confirm('¿Estás Seguro?, se eliminarán los datos');
    }
</script>
</head>
<body>
<?php
    include("conexion.php");
    //select * from alumnos 
    $sql="select * from alumnos";
    $resultado=mysqli_query($conexion,$sql);
?>
    <h1>Lista de Alumnos</h1>
    <a href="agregar.php">Nuevo alumno</a><br><br>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nombre</th>
                <th>No. control</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($filas=mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td><?php echo $filas['id'] ?></td>
                <td><?php echo $filas['nombre'] ?></td>
                <td><?php echo $filas['nocontrol'] ?></td>
                <td> 
                <?php echo "<a href='editar.php?id=".$filas['id']."'>EDITAR</a>
                "; ?>
                <?php echo "<a href='eliminar.php?id=".$filas['id']."'onclick='return confirmar()'>ELIMINAR</a>"; ?>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <?php
        mysqli_close($conexion); 
    ?>
</body>
</html>