<?php
// Conexión a la base de datos
include("conexion.php");

// Lógica para eliminar un registro si se recibe el ID
if (isset($_GET['id'])) {
    $id = $_GET['id']; // ID del registro a eliminar

    // Consulta SQL para eliminar el registro de la base de datos
    $sql = "DELETE FROM alumnos WHERE id='$id'";
    $resultado = mysqli_query($conexion, $sql); // Ejecuta la consulta

    // Mensaje de confirmación o error
    if ($resultado) {
        echo "<script language='JavaScript'>
                alert('El registro se eliminó correctamente');
                location.assign('index.php');
              </script>";
    } else {
        echo "<script language='JavaScript'>
                alert('El registro NO se eliminó');
                location.assign('index.php');
              </script>";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
}
?>
