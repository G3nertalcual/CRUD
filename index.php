<html>
<head>
    <title>Lista de alumnos</title>
    <!-- Archivo CSS específico para estilizar la página principal -->
    <link rel="stylesheet" href="css/estilos_index.css">
    <script type="text/javascript">
        // Función de confirmación para eliminar un registro
        function confirmar() {
            return confirm('¿Estás Seguro?, se eliminarán los datos');
        }
    </script>
</head>
<body>
    <?php
        // Conexión a la base de datos
        include("conexion.php");

        // Lógica para determinar si se realiza una búsqueda
        $buscar = isset($_GET['buscar']) ? $_GET['buscar'] : ''; // Verifica si hay un valor en el campo de búsqueda

        if ($buscar != '') {
            // Consulta SQL para buscar coincidencias por nombre o número de control
            $sql = "SELECT * FROM alumnos WHERE 
                    nombre LIKE '%$buscar%' OR 
                    nocontrol LIKE '%$buscar%'";
        } else {
            // Consulta SQL general para listar todos los registros
            $sql = "SELECT * FROM alumnos";
        }

        // Ejecución de la consulta en la base de datos
        $resultado = mysqli_query($conexion, $sql);
    ?>

    <!-- Título de la página -->
    <h1>Lista de Alumnos</h1>

    <!-- Formulario para realizar búsquedas -->
    <form action="index.php" method="GET">
        <input type="text" name="buscar" placeholder="Buscar por nombre o No. control" value="<?php echo htmlspecialchars($buscar); ?>">
        <input type="submit" value="Buscar">
        <!-- Enlace para limpiar la búsqueda y recargar la página -->
        <a href="index.php">Limpiar búsqueda</a>
    </form>

    <!-- Botón para agregar un nuevo alumno -->
    <div class="action-buttons">
        <a href="agregar.php">Nuevo alumno</a>
    </div>

    <!-- Tabla que muestra los datos de los alumnos -->
    <table>
        <thead>
            <tr>
                <!-- Encabezados de las columnas -->
                <th>No.</th>
                <th>Nombre</th>
                <th>No. Control</th>
                <th>Trabajo en equipo</th>
                <th>Responsabilidad</th>
                <th>Creatividad</th>
                <th>Comunicación</th>
                <th>Esfuerzo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Verifica si la consulta devuelve resultados
                if (mysqli_num_rows($resultado) > 0) {
                    // Recorre cada registro obtenido
                    while ($filas = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        // Muestra cada columna en la fila correspondiente
                        echo "<td>{$filas['id']}</td>";
                        echo "<td>{$filas['nombre']}</td>";
                        echo "<td>{$filas['nocontrol']}</td>";
                        echo "<td>{$filas['trabajo_equipo']}</td>";
                        echo "<td>{$filas['responsabilidad']}</td>";
                        echo "<td>{$filas['creatividad']}</td>";
                        echo "<td>{$filas['comunicacion']}</td>";
                        echo "<td>{$filas['esfuerzo']}</td>";
                        // Enlaces para editar o eliminar un registro
                        echo "<td>
                            <a href='editar.php?id={$filas['id']}'>Editar</a>
                            <a href='eliminar.php?id={$filas['id']}' onclick='return confirmar()'>Eliminar</a>
                          </td>";
                        echo "</tr>";
                    }
                } else {
                    // Mensaje si no hay registros en la base de datos
                    echo "<tr><td colspan='9'>No se encontraron alumnos.</td></tr>";
                }
            ?>
        </tbody>
    </table>

    <?php
        // Cierra la conexión a la base de datos
        mysqli_close($conexion);
    ?>
</body>
</html>
