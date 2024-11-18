<?php
include("template/header.php"); 
include("administrador/config/bd.php");
?>

<div class="jumbotron">
    <h1 class="display-3">Información de la cuenta</h1>
    <p class="lead">Correo: <?php echo $_SESSION['correo'] ?></p>
    <p class="lead"><a href="compras.php">Ver mis compras</a></p>
    <hr class="my-2">
    <p class="lead">
        <form method="POST">
        <input class="btn btn-primary btn-lg" type="submit" href="Jumbo action link" name="cerrar" role="button" value="Cerrar sesión"></input>
        </form>
        
    </p>
</div>

<?php include("template/footer.php"); 
if(isset($_REQUEST["cerrar"])){
    session_unset();
    header("Location:index.php");
}
?>