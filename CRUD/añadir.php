<?php
include '../PHP/conexion_be.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnañadir'])) {
    $nom_producto = isset($_POST['nom_producto']) ? $_POST['nom_producto'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $precio = isset($_POST['precio']) ? $_POST['precio'] : '';

    // Validar y procesar la información del formulario
    if (!empty($nom_producto) && !empty($descripcion) && !empty($precio)) {

        // Verificar si se subió una imagen
        if (isset($_FILES["imagen"])) {
            $imagen = $_FILES["imagen"]["tmp_name"];
            $nombreImagen = $_FILES["imagen"]["name"];
            $tipoImagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
            $directorio = "../CRUD/Productos/";

            // Verificar el formato de la imagen
            if ($tipoImagen == "jpg" || $tipoImagen == "jpeg" || $tipoImagen == "png") {

                // Insertar un registro en la tabla productos
                $registro = $conexion->query("INSERT INTO productos (nombre_producto, descripcion, precio, img_producto) VALUES ('$nom_producto', '$descripcion', '$precio', '')");
                $idRegistro = $conexion->insert_id;
                $ruta = $directorio . $idRegistro . "." . $tipoImagen;

                // Actualizar la ruta de la imagen en la base de datos
                $actualizarImagen = $conexion->query("UPDATE productos SET img_producto = '$ruta' WHERE id_producto = $idRegistro");

                // Almacenar la imagen
                if (move_uploaded_file($imagen, $ruta)) {
                    echo "<div class='alert alert-info'>Producto añadido exitosamente</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error al guardar la imagen</div>";
                }
            } else {
                echo "<div class='alert alert-info'>No se acepta ese formato de imagen</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Debe seleccionar una imagen</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Todos los campos son obligatorios</div>";
    }?>
    <script>
    history.replaceState(null, null, location.pathname)
    </script>

<?php
}
?>
