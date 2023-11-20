<?php
    session_start();
?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos</title>
    <link rel="stylesheet" href="../CSS/encabezado.css">
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

