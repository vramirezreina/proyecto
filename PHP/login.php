<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>Inicio</title>
    <link rel="stylesheet" href="../CSS/index.css">
</head>
<body>
<header class="header">
        <div class="logo">
<!---->            <img src="../img/logo.png" alt="Logo de la marca">
        </div>
        <nav>
           <ul class="nav-links">
                <li><a href="../PHP/index.php">Inicio</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Proyectos</a></li>
           </ul>            
        </nav>
      
        <a href="../PHP/login.php"><i class="fas fa-user"></i></a>
        <i class="fa-solid fa-cart-shopping"></i>
        <a class="btn" href="#"><button>Contacto</button></a>
        

<!---->        <a onclick="openNav()" class="menu" href="#"><button>Menu</button></a>

<!---->        <div id="mobile-menu" class="overlay">
<!---->            <a onclick="closeNav()" href="" class="close">&times;</a>
<!---->            <div class="overlay-content">
<!---->                <a href="../PHP/index.php">Inicio</a>
<!---->                <a href="#">Servicios</a>
<!---->                <a href="#">Productos</a>
<!---->                <a href="#">Proyectos</a>
                       <a href="#">Contacto</a>
<!---->            </div>
<!---->        </div>

    </header>
    
   
    <a href="https://wa.link/54c9fc" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
       
    </a>
    
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
                <select name="rol">
                <option value="0" style="display:none;"><label>Seleccionar Rol</label></option>
                <option value="Usuario">Usuario</option>
                <option value="Admin">Administrador</option>
                </select>
            <input type="text" placeholder="Correo Electronico" name="correo">
            <input type="password" placeholder="Contraseña" name="clave" id="txtpassword">

            <button>Entrar</button>
        </form>

        <!--Register-->
        <form action="registro_usuario_be.php" method="POST" class="formulario__register">
            <h2>Regístrarse</h2>
            <input type="text" placeholder="Nombre completo" name="nombre_completo">
            <input type="text" placeholder="Correo Electronico" name="correo">
            <div class="ub1"></div>
                <select name="rol">
                <option value="0" style="display:none;"><label>Seleccionar Rol</label></option>
                <option value="Usuario">Usuario</option>
                <option value="Admin">Administrador</option>
                </select>
            <input type="text" placeholder="Usuario" name="usuario">
            <input type="password" placeholder="Contraseña" name="clave">
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
    <script src= "../JS/script_login.js"></script>

</body>
</html>