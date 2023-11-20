<?php
include '../PHP/conexion_be.php';

if (isset($_GET['id_producto']) && isset($_GET['imagen'])) {
    $id_producto = $_GET['id_producto'];
    $imagen = $_GET['imagen'];

    // Eliminar la imagen
    if (unlink($imagen)) {
        echo "<div class='alert alert-success'>El producto se elimino correctamente</div>";
    } else {
        echo "<div class='alert alert-success'>Error al eliminar la imagen</div>";
    }

    // Eliminar el registro en la base de datos
    $sql = "DELETE FROM productos WHERE id_producto = $id_producto";

    if ($conexion->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Producto eliminado correctamente</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();

} else {
    exit();
}
?>
