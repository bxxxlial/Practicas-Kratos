<?php include ("template/header.php");
      include("administrador/config/bd.php");
      include("carrito.php");?>
<?php

$sentenciaSQL = $conexion->prepare("SELECT * FROM albumes");
$sentenciaSQL->execute();
$listaAlbumes=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($listaAlbumes as $album) { ?>

<div class="col-3">
<div class="card">  
<img class="card-img-top" height="315px" width="315px" src="./images/<?php echo $album['imagen']; ?>" alt="">  

<div class="card-body">

    <h5 class="card-title"><?php echo $album['nombre']; ?></h5>
    <h6 class="card-title"><?php echo $album['precio']; ?></h6>
    
    <form action="" method="post">

    <input type="hidden" name="id" id="id" value="<?php echo $album['id'];?>">
    <input type="hidden" name="Precio" id="Precio" value="<?php echo $album['precio'];?>">
    <input type="hidden" name="Nombre" id="Nombre" value="<?php echo $album['nombre'];?>">
    <input type="hidden" name="Artista" id=Artista" value="<?php echo $album['artista'];?>">
    <input type="hidden" name="Genero" id="Genero" value="<?php echo $album['genero'];?>">
    <input type="hidden" name="Anio" id="Anio" value="<?php echo $album['anio'];?>">
    <input type="hidden" name="Cantidad" id="Cantidad" value="<?php echo 1;?>"> 
    
    <button class="btn btn-primary" 
        name="btnAccion" 
        value="Agregar" 
        type="submit"
        action=""
        >
        Agregar al carrito
        </button>
        
    </form>
    

</div>
</div>
<br><br>    
</div>
<?php }?>




<?php include ("template/footer.php"); ?>