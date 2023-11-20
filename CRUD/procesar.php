<?php
include '../PHP/conexion_be.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $id_producto = $_POST['id_departamento'];
    $nuevo_departamento = $_POST['departamento'];
    $nuevo_dane = $_POST['dane_departamento'];

    // Actualizar la información en la base de datos
    $sql = "UPDATE departamentos SET departamento = '$nuevo_departamento', dane_departamento = '$nuevo_dane' WHERE id_departamento = $id_departamento";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir a la página principal después de la edición
        header("Location: index.php");
        exit;
    } else {
        echo "Error al actualizar el departamento: " . $conexion->error;
    }
} else {
    echo "Acceso no permitido.";
}
?>
