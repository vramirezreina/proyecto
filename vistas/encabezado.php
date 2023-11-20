<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
                <li id="ubicacion"><a href="../PHP/index.php">Inicio</a></li>
                <li id="ubicacion1"><a href="../PHP/servicios.php">Servicios</a></li>
                <li id="ubicacion2"><a href="../Productos/productos.php">Productos</a></li>
                <li id="ubicacion3"><a href="../PHP/proyectos.php">Proyectos</a></li>
           </ul>            
        </nav>
      
        <a href="../PHP/login.php"><i class="fas fa-user" style="color: black;"></i></a>
        <a href="../PHP/login.php"><i class="fa-solid fa-cart-shopping" style="color: black";><span id="num_cart"></span></i></a>

<!---->        <a onclick="openNav()" class="menu" href="#"><button>Menu</button></a>

<!---->        <div id="mobile-menu" class="overlay">
<!---->            <a onclick="closeNav()" href="" class="close">&times;</a>
<!---->            <div class="overlay-content">
<!---->                <a href="../PHP/index.php">Inicio</a>
<!---->                <a href="/PHP/servicios.php">Servicios</a>
<!---->                <a href="../Productos/productos.php">Productos</a>
<!---->                <a href="../PHP/proyectos.php">Proyectos</a>
<!---->            </div>
<!---->        </div>

    </header>
    

    <script src="../JS/index.js"></script>