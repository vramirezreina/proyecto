<?php
session_start();
require './database.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $id_producto = isset($_POST['id_producto']) ? $_POST['id_producto'] : 0;

    if ($action == 'agregar') {
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;

        if ($respuesta = agregar($id_producto, $cantidad)) {
            $datos['ok'] = true;
            $datos['sub'] = number_format($respuesta, 0);
        } else {
            $datos['ok'] = false;
        }
    } else {
        $datos['ok'] = false;
    }
} else {
    $datos['ok'] = false;
}

echo json_encode($datos);

function agregar($id_producto, $cantidad)
{
    $res = 0;

    if ($id_producto > 0 && $cantidad > 0 && is_numeric($cantidad)) {
        if (isset($_SESSION['carrito']['productos'][$id_producto])) {
            $_SESSION['carrito']['productos'][$id_producto] += $cantidad;

            $db = new Database();
            $conexion = $db->conectar();

            $sql = $conexion->prepare("SELECT precio FROM productos WHERE id_producto = ?");
            $sql->execute([$id_producto]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $precio = $row['precio'];
                $res = $cantidad * $precio;
            }

            return $res;
        }
    }

    return $res;
}
?>
