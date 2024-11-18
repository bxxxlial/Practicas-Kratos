<?php session_start();
include("./administrador/config/bd.php");

$cant=$_POST["cantidad"];

$try = implode(array_keys($_POST));
$id = substr($try, 0, 1);

$sentenciaSQL = $conexion->prepare("SELECT * FROM Carrito WHERE ID_sesion=:id_sesion;");
$sentenciaSQL->bindParam(':id_sesion',$_SESSION['ID']);
$sentenciaSQL->execute();
$query=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

if($query!=NULL){
    foreach($query as $carrito){
        if($carrito['ID_Producto'] == $id){
            echo "cale";
            $sentenciaSQL = $conexion->prepare("UPDATE Carrito SET Cantidad=:cantidad WHERE ID_Producto=:id_producto");
            $sentenciaSQL->bindParam(':id_producto',$id);
            $sentenciaSQL->bindParam(':cantidad',$cant);
            $sentenciaSQL->execute();

        } else {
            $sentenciaSQL = $conexion->prepare("INSERT INTO Carrito (ID_sesion, ID_Producto, Cantidad) VALUES (:id_sesion,:id_producto,:cantidad)");
            $sentenciaSQL->bindParam(':id_sesion',$_SESSION['ID']);
            $sentenciaSQL->bindParam(':id_producto',$id);
            $sentenciaSQL->bindParam(':cantidad',$cant);
            $sentenciaSQL->execute();
        }
    }
} else {
    echo "cale 2";
    $sentenciaSQL = $conexion->prepare("INSERT INTO Carrito (ID_sesion, ID_Producto, Cantidad) VALUES (:id_sesion,:id_producto,:cantidad)");
    $sentenciaSQL->bindParam(':id_sesion',$_SESSION['ID']);
    $sentenciaSQL->bindParam(':id_producto',$id);
    $sentenciaSQL->bindParam(':cantidad',$cant);
    $sentenciaSQL->execute();
    var_dump($query);
}

header("Location:index.php");
?>