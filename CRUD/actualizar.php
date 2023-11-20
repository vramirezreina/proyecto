<?php
// actualizar_producto.php

include '../PHP/conexion_be.php';

if (isset($_POST['btn_actualizar'])) {
    $id_producto = $_POST['id_producto'];
    $nom_producto = $_POST['nom_producto'];
    // Get other fields and update the product in the database
    // ...

    // Redirect back to the main page after updating
    header("Location: ../Roles/admin.php");
    exit();
} else {
    echo "Invalid request.";
}
?>
