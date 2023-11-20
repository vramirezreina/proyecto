<?php
require '../vistas/encabezado.php';
require './database.php';
include '../PHP/confi.php';

$db = new Database();
$conexion = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

if ($productos != null) {
    // Prepare an array to store the details for the database insertion
    $ventasDetails = array();

    foreach ($productos as $clave => $cantidad) {
        $productoDetails = getProductDetails($conexion, $clave);
        $ventasDetails[] = array_merge($productoDetails, ['cantidad' => $cantidad, 'total' => $productoDetails['precio'] * $cantidad]);
    }

    // Perform the database insertion
    insertVentaDetails($conexion, $ventasDetails);

    // Display the purchase details with $conexion as a parameter
    displayPurchaseDetails($productos, $conexion);
}


function getProductDetails($conexion, $id_producto) {
    $sql = $conexion->prepare("SELECT id_producto, nombre_producto, precio FROM productos WHERE id_producto = ?");
    $sql->execute([$id_producto]);
    return $sql->fetch(PDO::FETCH_ASSOC);
}

function insertVentaDetails($conexion, $ventasDetails) {
    $stmt = $conexion->prepare("INSERT INTO ventas (id_producto, producto, cantidad, precio, ve_total) VALUES (?, ?, ?, ?, ?)");

    foreach ($ventasDetails as $venta) {
        $stmt->execute([$venta['id_producto'], $venta['nombre_producto'], $venta['cantidad'], $venta['precio'], $venta['total']]);
    }
}

function displayPurchaseDetails($productos, $conexion) {
    $total = 0;
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Productos</title>
        <link rel="stylesheet" href="../CSS/productos.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <main>
            <div class="container" style="margin-top:100px;">
                <h1 class="text-center" style="background-color: black; color:white">Detalles de la compra</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos as $clave => $cantidad) : ?>
                                <?php $producto = getProductDetails($conexion, $clave); ?>
                                <tr id="row_<?php echo $producto['id_producto']; ?>">
                                    <td><?php echo $producto['nombre_producto']; ?></td>
                                    <td>
                                        <div id="cantidad<?php echo $producto['id_producto']; ?>" name="cantidad"><?php echo number_format($cantidad); ?></div>
                                    </td>
                                    <td>
                                        <div id="precio_<?php echo $producto['id_producto']; ?>" name="precio[]"><?php echo number_format($producto['precio']); ?></div>
                                    </td>
                                    <td>
                                        <div id="subtotal_<?php echo $producto['id_producto']; ?>" name="subtotal[]"><?php echo number_format($producto['precio'] * $cantidad); ?></div>
                                    </td>
                                </tr>
                                <?php $total = $producto['precio'] * $cantidad; ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4">
                                    <p class="h3 text-end" id="total"><?php echo number_format($total); ?></p>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="#" id="realizarCompra" class="btn btn-primary btn-lg">Comprar</a>
                    </div>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
    </html>
    <?php
}
include '../vistas/footer.php';
?>