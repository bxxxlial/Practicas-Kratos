<?php session_start();
include("./administrador/config/bd.php");

$id = implode(array_keys($_POST));

$sentenciaSQL = $conexion->prepare("SELECT * FROM Carrito WHERE ID_sesion=:id_sesion;");
$sentenciaSQL->bindParam(':id_sesion',$_SESSION['ID']);
$sentenciaSQL->execute();
$query=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

foreach($query as $carrito){
    if($carrito['ID_Producto'] == $id){
        $sentenciaSQL = $conexion->prepare("DELETE FROM Carrito WHERE ID_Producto=:id_producto");
        $sentenciaSQL->bindParam(':id_producto',$id);
        $sentenciaSQL->execute();
        header("Location:index.php");
        break;
    }
}