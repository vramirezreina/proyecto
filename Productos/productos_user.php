<?php
    session_start();
    include '../PHP/conexion_be.php';
    //cadena de MySQL contiene una consulta
    $sql = "SELECT * FROM productos";

    echo ini_get('session.save_path');
    print_r($_SESSION);
    if (isset($_SESSION['usuario'])) {
        // Access the 'usuario' key
        $usuario = $_SESSION['usuario'];
    } else {
        echo "Usuario no definido en la sesión.";
    }
    //ejecuta la consulta
    $resultado = $conexion->query($sql);
    ?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos</title>
    <link rel="stylesheet" href="../CSS/productos_user.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<header class="header">
        <div class="logo">
<!---->            <img src="../img/logo.png" alt="Logo de la marca">
        </div>
        <a href=""><i class="fas fa-user" style="color: black;"></i></a>
        <a href="../Productos/checkout.php"><i class="fa-solid fa-cart-shopping" style="color: black";><span id="num_cart"></span></i></a>
        <a href="" class="btn btn-success me-2"><?php echo $_SESSION['usuario']?></a>
        <a href="../PHP/cerrar.php" class="btn btn-secondary">Cerrar Sesion</a>

    </header>

    <div class="container py-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 py-5">
            <?php
            while ($row = $resultado->fetch_assoc()) {
                echo '<div class="col">';
                echo '<div class="card" style="width: 18rem;">';
                echo '<img src="' . (isset($row['img_producto']) ? $row['img_producto'] : '') . '"  style="height: 300px; with: 500px;"  class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['nombre_producto'] . '</h5>';
                echo '<p class="card-text">' . $row['descripcion'] . '</p>';
                echo '</div>';
                echo '<div class="d-flex justify-content-between align-items-center mb-3">';
                echo '<h3 class="fs-6 p-3"> $' . number_format( $row['precio']) . '</h3>';
                echo '<button type="button" class="btn btn-primary m-3" Onclick="addproductos (' . $row['id_producto'] . ')">Añadir</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <script>
        function addproductos(id_producto){
            let url = 'carrito.php';
            let formData = new FormData();
            formData.append('id_producto', id_producto);

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if(data.ok){
                    let elemento = document.getElementById("num_cart");
                    elemento.innerHTML = data.numero;
                }
            });
        }
    </script>
</body>
</html>
