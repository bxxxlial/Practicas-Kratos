<?php session_start();
include("./administrador/config/bd.php");
include("./template/cabecera.php");
include("./administrador/config/bd.php");

$sentenciaSQL = $conexion->prepare("DELETE FROM Carrito WHERE ID_sesion=:id_sesion");
$sentenciaSQL->bindParam(':ID_sesion',$_SESSION['ID']);
$sentenciaSQL->execute();
?>

<div class="jumbotron">
    <h1 class="display-3">¡Compra realizada!</h1>
    <p class="lead">Podra consultar los detalles de su pedido en la sección de <a href="compras.php">compras</a> que se encuentra en el apartado de <a href="cuenta.php">cuenta.</a></p>
    <hr class="my-2">
    <p class="lead">
    </p>
</div>

<?php include("template/pie.php"); ?>