<?php
include 'conexion_be.php';
session_start();

$_SESSION['usuario']= $_POST['usuario'];
$rol = $_POST['idRol'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE idRol='$rol' AND usuario='$usuario' AND clave='$clave'"); 

if (mysqli_num_rows($validar_login) > 0) {
    // Dependiendo del rol, redirigir a páginas diferentes
    if ($rol == 'ADMIN') {
        header("location: ../Roles/admin.php");
        exit();
    } else {
        header("location: ../Productos/productos_user.php");
        exit();
    }
} else {
    echo '
    <script>
        alert("El usuario no existe, por favor verifique los datos ingresados");
        window.location= "../PHP/login.php";
    </script>
    ';
    exit();
}

?>
