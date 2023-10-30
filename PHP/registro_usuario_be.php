<?php

include 'conexion_be.php';


//Se declaran las varibles que estan en el formulario, para hacer el envio de la informacion a la base de datos
$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$rol= $_POST['rol'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
//Encriptar contraseña
$clave = hash('sha512', $clave);

//Inserta los datos en la tabla usuarios
$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, clave, rol) 
          VALUES('$nombre_completo', '$correo', '$rol', '$usuario', '$clave')";

//Verificar que el correo no se repita en la base de datos
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");
if(mysqli_num_rows($verificar_correo) >0){
    echo '
    <script>
    alert("Este correo ya esta registrado, intennta con otro diferente");
    window.location= "./index.php";
    </script>>
    ';
    exit();
}

//Verificar que el nombre usuario no se repita en la base de datos
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'");
if(mysqli_num_rows($verificar_usuario) >0){
    echo '
    <script>
    alert("Este usuario ya esta registrado, intennta con otro diferente");
    window.location= "./index.php";
    </script>>
    ';
    exit();
}

// Se ejecuta la querry
$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo '
    <script>
    alert("Usuario almacenado exitosamente");
    window.location= "./index.php";
    </script>
    ';
}else {
    echo '
    <script>
    alert("Inténtalo de nuevo, usuario no almacenado");
    window.location= "./index.php";
    </script>
    ';
}

mysqli_close($conexion);
?>