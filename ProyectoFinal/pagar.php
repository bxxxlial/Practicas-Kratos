<?php 
include 'administrador/config/bd.php';
include 'carrito.php';
include 'template/header.php';
?> 



<?php 
if($_POST){
    
    $total=0;
    $SID=session_id();
    $Correo="ayax@123.com"

    foreach($_SESSION['Carrito'] as $indice=>$producto){

        $total=$total+($producto['Precio']*$producto['Cantidad']);

    }

        $sentencia=$conexion->prepare("INSERT INTO `tblventas` 
        (`id`, `ClaveTransaccion`, `Fecha`, `Correo`, `Total`, `Statuss`) 
        VALUES (NULL, :ClaveTransaccion, NOW(), :Correo, :Total, 'pendiente'); ");
        
        $sentencia->bindParam(":ClaveTransaccion,$SID");
        $sentencia->bindParam(":Corre,$Correo");
        $sentencia->bindParam(":Total,$total");
        $sentencia->execute();

    echo "<h3>".$total."</h3>";
}




?>

















<?php include 'template/footer.php';?> 