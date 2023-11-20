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
<?php
session_start();
include '../vistas/encabezado2.php';
require './database.php';
$db = new Database();
$conexion = $db->conectar(); 

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrito = array();
$total = 0; 

if ($productos != null) {
    ?>
    <main>
        <div class="container" style="margin-top: 100px;">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    foreach ($productos as $clave => $cantidad) {
        $sql = $conexion->prepare("SELECT id_producto, img_producto, nombre_producto, precio FROM productos WHERE id_producto = ?");
        $sql->execute([$clave]);
        $producto = $sql->fetch(PDO::FETCH_ASSOC);
        
        $id_producto = $producto['id_producto'];
        $img = $producto['img_producto'];
        $nombre = $producto['nombre_producto'];
        $precio = $producto['precio'];
        $subtotal = $cantidad * $precio;
        $total += $subtotal;
        ?>
            <tr id="row_<?php echo $id_producto; ?>">
                <td><img src="<?php echo $img; ?>" alt="Product Image" style="width: 50px; height: 50px;"></td>
                <td><?php echo $nombre; ?></td>
                <td><?php echo number_format($precio); ?></td>
                <td>
                    <input type="number" step="1" value="<?php echo $cantidad; ?>" size="5" id="cantidad_<?php echo $id_producto; ?>" data-old-value="<?php echo $cantidad; ?>" onchange="updateSubtotal(<?php echo $id_producto; ?>, <?php echo $precio; ?>)">
                </td>
                <td>
                    <div id="subtotal_<?php echo $id_producto; ?>" name="subtotal[]"><?php echo number_format($subtotal); ?></div>
                </td>
                <td>
                <a href="#" id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $id_producto; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal" onclick="setProductId(<?php echo $id_producto; ?>)">Eliminar</a>
                </td>
            </tr>
        <?php
    }
    ?>
                    <tr>
                        <td colspan="4"></td>
                        <td colspan="3">
                            <p class="h4 justify-content-md-end" id="total">Total:<?php echo number_format($total); ?></p>
                        </td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <?php if ($productos != null) {?>
            <div class="row">
                <div class="col-md-5 offset-md-7 d-grid gap-2 justify-content-md-end">
                    <a href="../Productos/pago.php" id="realizarCompra" class="btn btn-primary">Siguiente</a>
                </div>
            </div>
            <?php }?>
        </div>
    </main>
    <?php
}
?>

<!-- Modal -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Alerta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar el producto de la lista?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-id ="<?php echo $id_producto; ?>" data-bs-dismiss="modal">Cerrar</button>
        <button id ="btn-elimina" type="button" class="btn btn-danger" onclick="elimina()" >Eliminar</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    let productIdToDelete;

    function setProductId(id) {
        productIdToDelete = id;
    }

    function elimina() {
        // Remove the product from the cart
        let productRow = document.getElementById('row_' + productIdToDelete);
        productRow.remove();

        // TODO: Update the session or any other logic to reflect the removal of the product.

        // Check if the cart is empty
        let tableBody = document.querySelector('tbody');
        if (tableBody.children.length === 1) {
            // If the table has only one row (the total row), show an empty cart message
            tableBody.innerHTML = '<tr><td colspan="6">Carrito vacío</td></tr>';
        }

        // Close the modal
        let eliminaModal = new bootstrap.Modal(document.getElementById('eliminaModal'));
        eliminaModal.hide();
    }

    let eliminaModal = document.getElementById('eliminaModal');
    eliminaModal.addEventListener('show.bs.modal', function(event) {
        let button = event.relatedTarget;
        let id_producto = button.getAttribute('data-bs-id');
        setProductId(id_producto);
    });

    // Handle modal close event
    eliminaModal.addEventListener('hide.bs.modal', function(event) {
        // If the modal is closed without clicking "Eliminar", clear the productToDelete
        productIdToDelete = null;
    });

    function updateSubtotal(id_producto, precio) {
        // Get the quantity input value
        let quantityInput = document.getElementById('cantidad_' + id_producto);
        let newQuantity = parseFloat(quantityInput.value);

        // Update the subtotal
        let subtotalElement = document.getElementById('subtotal_' + id_producto);
        let newSubtotal = newQuantity * precio;

        // Update the total
        let oldSubtotal = parseFloat(subtotalElement.textContent.replace(',', ''));
        let totalElement = document.getElementById('total');
        let newTotal = parseFloat(totalElement.textContent.replace(',', '')) - oldSubtotal + newSubtotal;

        // Display the updated subtotal and total with commas
        subtotalElement.textContent = newSubtotal.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        totalElement.textContent = newTotal.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
</body>
</html>
