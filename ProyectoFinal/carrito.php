<?php

$mensaje="";

if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case 'Agregar':

            if(is_numeric($_POST['id'])){
                $ID= $_POST['id'];
                $mensaje.="ID Correcto: ".$ID."<br>";
            }else{
                $mensaje.="XD, ID Incorrecto ".$ID;
            }

            if(is_numeric($_POST['Precio'])){
                $Precio= $_POST['Precio'];
                $mensaje.="Precio Correcto: ".$Precio."<br>";
            }else{ $mensaje.="XD, Precio Incorrecto <br>"; break;} 

            if(is_string($_POST['Nombre'])){
                $Nombre= $_POST['Nombre'];
                $mensaje.="Nombre Correcto: ".$Nombre."<br>";
            }else{ $mensaje.="XD, Título Incorrecto <br>"; break;}

            if(is_string($_POST['Artista'])){
                $Artista= $_POST['Artista'];
                $mensaje.="Artista Correcta: ".$Artista."<br>";
            }else{ $mensaje.="XD, Artista Incorrecto <br>"; break;}

            if(is_string($_POST['Genero'])){
                $Genero= $_POST['Genero'];
                $mensaje.="Genero Correcta: ".$Genero."<br>";
            }else{ $mensaje.="XD, Genero Incorrecto <br>"; break;}

            if(is_string($_POST['Anio'])){
                $Anio= $_POST['Anio'];
                $mensaje.="Anio Correcta: ".$Anio."<br>";
            }else{ $mensaje.="XD, Anio Incorrecto <br>"; break;}

            if(is_numeric($_POST['Cantidad'])){
                $Cantidad= $_POST['Cantidad'];
                $mensaje.="Cantidad Correcta: ".$Cantidad."<br>";
            }else{ $mensaje.="XD, Cantidad Incorrecta <br>"; break;}


            if(!isset($_SESSION['Carrito'])){
                $producto=array(
                    'id'=>$ID,
                    'Precio'=>$Precio,
                    'Nombre'=>$Nombre,
                    'Artista'=>$Artista, 
                    'Genero'=>$Genero,
                    'Anio'=>$Anio,
                    'Cantidad'=>$Cantidad
                );
                $_SESSION['Carrito'][0]=$producto;
                $mensaje= "¡Producto agregado al Carrito!";
            
            }else{

                //Utilizar la función array_column para almacenar todos los ID's del Carrito de compras
                $idProductos=array_column($_SESSION['Carrito'],"id");
                if(in_array($ID,$idProductos)){
                    echo "<script>alert('El producto ya está en el Carrito');</script>";
                    $mensaje= "";
                }else{

                $NumeroProductos=count($_SESSION['Carrito']);
                $producto=array(
                    'id'=>$ID,
                    'Precio'=>$Precio,
                    'Nombre'=>$Nombre,
                    'Artista'=>$Artista, 
                    'Genero'=>$Genero,
                    'Anio'=>$Anio,
                    'Cantidad'=>$Cantidad
                );

                $_SESSION['Carrito'][$NumeroProductos]=$producto;
                $mensaje= "¡Producto agregado al Carrito!";
            }
        }


            $mensaje= print_r($_SESSION,true);

        break;

        case "Eliminar":
            if(is_numeric($_POST['id'])){
                $ID=$_POST['id'];
                
            foreach($_SESSION['Carrito'] as $indice=>$producto){
                if($producto['id']==$ID){
                    unset($_SESSION['Carrito'][$indice]);
                    $_SESSION['Carrito']=array_values($_SESSION['Carrito']);
                }

            }

            }else{
                $mensaje.="XD, ID Incorrecto ".$ID;
            }
        break;
    }

}


?>





