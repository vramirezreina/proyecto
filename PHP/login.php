<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/index.css">
    <title>Inicio</title>
    
</head>
<body>
<?php
   include '../vistas/encabezado.php';
   ?>    
    <main>

<div class="contenedor__todo">
    <div class="caja__trasera">
        <div class="caja__trasera-login">
            <h3>¿Ya tienes una cuenta?</h3>
            <p>Inicia sesión para entrar en la página</p>
            <button id="btn__iniciar-sesion">Iniciar Sesión</button>
        </div>
        <div class="caja__trasera-register">
            <h3>¿Aún no tienes una cuenta?</h3>
            <p>Regístrate para que puedas iniciar sesión</p>
            <button id="btn__registrarse">Regístrarse</button>
        </div>
    </div>

    <!--Formulario de Login y registro-->
    <div class="contenedor__login-register">
        <!--Login-->
        <form action="login_usuario_be.php" method="POST" class="formulario__login">
            <h2>Iniciar Sesión</h2>
            <div class="ub1"></div>
            <div class="form-floating">
                <select class="form-select" name="idRol" aria-label="Floating label select example">
                    <option selected >Tipo Usuario</option>
                    <?php  
                        include './conexion_be.php';
                        
                        $sql = "SELECT rol FROM rol";
                        $resultado = $conexion->query($sql);
                        if ($resultado) {
                            while ($fila = $resultado->fetch_assoc()) {
                                echo '<option value="' . $fila["rol"] . '">' . $fila["rol"] . '</option>';
                            }
                            $resultado->free(); // Liberar el conjunto de resultados
                        } else {
                            echo "Error: " . $sql . "<br>" . $conexion->error;
                        }
                    
                        // Cerrar la conexión
                        $conexion->close();
                        ?>
                </select>
            </div>
            <input type="text" placeholder="Usuario" name="usuario" required >
            <input type="password" placeholder="Contraseña" name="clave" id="txtpassword" required>

            <button>Entrar</button>
        </form>

        <!--Register-->
        <form action="registro_usuario_be.php" method="POST" class="formulario__register">
            <h2>Regístrarse</h2>
            <input type="text" placeholder="Nombre completo" name="nombre_completo" required>
            <input type="text" placeholder="Correo Electronico" name="correo" required>
            <div class="form-floating"><br>
                <select class="form-select" name="idRol" required>
                    <option selected>Tipo Usuario</option>
                    <?php
                    include './conexion_be.php';

                    $sql = "SELECT rol, rol FROM rol WHERE rol != 'ADMIN'";
                    $resultado = $conexion->query($sql);

                    if ($resultado) {
                        while ($fila = $resultado->fetch_assoc()) {
                            echo '<option value="' . $fila["rol"] . '">' . $fila["rol"] . '</option>';
                        }

                        // Liberar el conjunto de resultados
                        $resultado->free();
                    } else {
                        echo "Error: " . $sql . "<br>" . $conexion->error;
                    }

                    // Cerrar la conexión
                    $conexion->close();
                    ?>

                </select>
            </div>
            <input type="text" placeholder="Usuario" name="usuario" required>
            <input type="password" placeholder="Contraseña" name="clave" required>
            <button>Regístrarse</button>
        </form>
    </div>
</div>

</main>


    <script>
        
        function openNav(){
        document.getElementById("mobile-menu").style.width = "100%";
        }

        function closeNav(){
        document.getElementById("mobile-menu").style.width = "0%";
        }

    </script>
    <script src= "../JS/login.js"></script>
</body>
</html>
