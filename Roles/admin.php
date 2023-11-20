<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../CSS/admin.css">
    <title>Administrador</title>
</head>
<body>    
<header class="header">
        <div class="logo">
<!---->            <img src="../img/logo.png" alt="Logo de la marca">
        </div>
        <nav>
           <ul class="nav-links">
           <li><a href="../PHP/index.php">Ventas</a></li>
           <a href="../PHP/cerrar.php" style="margin-right:20px;">Salir</a>
           </ul>            
        </nav>
    </header>
  
    <h1 class="text-center" style="margin-top: 100px;">Bienvenido administrador al Modulo Productos</h1>
    <?php
        include '../PHP/conexion_be.php';
        require '../CRUD/añadir.php';
        //cadena de MySQL contiene una consulta
        $sql = "SELECT * FROM productos";
        //ejecuta  la consulta
        $resultado = $conexion->query($sql);
    ?>
    <script>
    function confirmacion(){
        let respuesta = confirm("¿Esta seguro que quiere eliminar el producto?");
        if(respuesta == true){
            return true;
        }else {
        return false;
    }
    }
</script>


    <div class="p-3 t-6 table-responsive">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Añadir
            </button>
        <!-- Formulario para añadir productos -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Nuevo Producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <label for="nom_producto" class="form-label">Nombre Producto</label>
                            <input type="text" class="form-control" name="nom_producto" required>
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" required>
                            <label for="precio" class="form-label">Precio</label>
                            <input type="text" class="form-control" name="precio" required><br>
                            <label for="imagen" >Imagen:</label>
                            <input type="file" class="form-control" name="imagen" accept="image/*" required><br>
                            <input type="submit" value="Añadir" name="btnañadir" class="form-control btn btn-success">
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div> 
        </div>
        <table class="table table-striped ">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre Producto</th>
            <th scope="col">Descripción</th>
            <th scope="col">Precio</th>
            <th scope="col">Producto</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            //while se ejecuta mientras haya filas en el resultado de la consulta. 
            //fetch_assoc() obtiene la siguiente fila como un array asociativo y la almacena en la variable $row.
                        while ($row = $resultado->fetch_assoc()) {
                            echo '<tr>';
                            echo '<th scope="col">' . (isset($row['id_producto']) ? $row['id_producto'] : '') . '</th>';
                            echo '<th scope="col">' . $row['nombre_producto'] . '</th>';
                            echo '<th scope="col">' . $row['descripcion'] . '</th>';
                            echo '<th scope="col">' . $row['precio'] . '</th>';
                            echo '<th scope="col"><img src="' . $row['img_producto'] . '" alt="" width="150"></th>';
                            echo '<th scope="col">';
                            //echo '<a href ="../CRUD/editar.php?"id_producto=' .$row['id_producto']. '"><i class="fa-solid fa-pen-to-square" style="color: #ec7c1c; font-size: 25px;"></i></a>';
                            echo '<a href="../CRUD/eliminar.php?id_producto=' . $row['id_producto'] . '&imagen=' . $row['img_producto'] . '" onclick="return confirmacion()" ><i class="fa-solid fa-trash" style="color: #2419a9; font-size: 25px;"></i></a>';
                            echo '</th>';
                            echo '</tr>';
                        }
                        ?>
            </tr>
        </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

