<?php session_start();?>
<?php include "carrito.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Final</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">

</head>
<body?>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient">
        <ul class="nav navbar-nav mx-auto">
            <li class="nav-item">
                <a class="navbar-brand" href="index.php">Alt+Music</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="albumes.php">Albumes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="nosotros.php">Nosotros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="mostrarCarrito.php">Carrito(<?php 
                echo (empty($_SESSION['Carrito']))?0:count($_SESSION['Carrito']);
                ?>)</a>
            </li>
            <?php if(isset($_SESSION['correo'])){ ?>
                <li class="nav-item"><a class="navbar-brand" href="cuenta.php"> <br> Cuenta</a></li>
            <?php } else { ?>
                <li class="nav-item"><a class="navbar-brand" href="login.php"> <br> Iniciar sesión</a></li>
            <?php } ?>
        </ul>
    </nav>
    <br>
    <br>
        <div class="container">
        

    <div class="container">
    
        <div class="row">
