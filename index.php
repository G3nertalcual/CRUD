<html>
<head>
    <title>Lista de alumnos</title>
    <link rel="stylesheet" type="text/css" href="css/estilos_index.css">
    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Estás Seguro?, se eliminarán los datos');
        }
    </script>
</head>
<body>
<?php
    include("conexion.php");

    // Verificar si se envió una consulta de búsqueda
    $buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';

    // Construir la consulta SQL según si hay búsqueda o no
    if ($buscar) {
        $sql = "SELECT * FROM alumnos WHERE nombre LIKE '%$buscar%' OR nocontrol LIKE '%$buscar%'";
    } else {
        $sql = "SELECT * FROM alumnos";
    }

    $resultado = mysqli_query($conexion, $sql);
?>
    <h1>Lista de Alumnos</h1>

    <!-- Formulario de búsqueda -->
    <form method="get" action="">
        <input type="text" name="buscar" placeholder="Buscar por nombre o No. Control" value="<?php echo htmlspecialchars($buscar); ?>">
        <input type="submit" value="Buscar">
        <a href="index.php">Restablecer</a>
    </form>

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
                if (mysqli_num_rows($resultado) > 0) {
                    while ($filas = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
                <td><?php echo $filas['id'] ?></td>
                <td><?php echo $filas['nombre'] ?></td>
                <td><?php echo $filas['nocontrol'] ?></td>
                <td> 
                    <?php echo "<a href='editar.php?id=".$filas['id']."'>EDITAR</a>"; ?>
                    <?php echo "<a href='eliminar.php?id=".$filas['id']."' onclick='return confirmar()'>ELIMINAR</a>"; ?>
                </td>
            </tr>
            <?php
                    }
                } else {
                    // Mensaje cuando no hay resultados
            ?>
            <tr>
                <td colspan="4">No se encontraron resultados para la búsqueda "<?php echo htmlspecialchars($buscar); ?>"</td>
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
