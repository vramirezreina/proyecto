<?php
session_start();

$datos = array();

if (isset($_POST['id_producto'])) {
    $id_producto = $_POST['id_producto']; // Corregir el índice 'id'
    
    if (isset($_SESSION['carrito']['productos'][$id_producto])) {
        $_SESSION['carrito']['productos'][$id_producto] += 1;
    } else {
        $_SESSION['carrito']['productos'][$id_producto] = 1;
    }

    $datos['numero'] = count($_SESSION['carrito']['productos']);
    $datos['ok'] = true;
} else {
    $datos['ok'] = false;
}

echo json_encode($datos);
?>
