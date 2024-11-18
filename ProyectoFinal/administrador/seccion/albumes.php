
<?php include ("../template/header.php"); ?>

<?php

        $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
        $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
        $txtArtista=(isset($_POST['txtArtista']))?$_POST['txtArtista']:"";
        $txtGenero=(isset($_POST['txtGenero']))?$_POST['txtGenero']:"";
        $txtAnio=(isset($_POST['txtAnio']))?$_POST['txtAnio']:"";
        $txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";

        $txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";

        $accion=(isset($_POST['accion']))?$_POST['accion']:"";

        include ("../config/bd.php");

        switch($accion){

            case "Agregar":

                $sentenciaSQL= $conexion->prepare("INSERT INTO albumes (nombre,artista,genero,anio,precio,imagen) VALUES (:nombre,:artista,:genero,:anio,:precio,:imagen);");
                $sentenciaSQL->bindParam(':nombre',$txtNombre);
                $sentenciaSQL->bindParam(':artista',$txtArtista);
                $sentenciaSQL->bindParam(':genero',$txtGenero);
                $sentenciaSQL->bindParam(':anio',$txtAnio);
                $sentenciaSQL->bindParam(':precio',$txtPrecio);

                $fecha= new DateTime();
                $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"ïmagen.jpg";

                $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

                if($tmpImagen!=""){

                    move_uploaded_file($tmpImagen,"../../images/".$nombreArchivo);
                }

                $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
                $sentenciaSQL->execute();

                header("Location:albumes.php");
                break;
            
            case "Modificar";
                $sentenciaSQL = $conexion->prepare("UPDATE albumes SET nombre=:nombre WHERE id=:id");
                $sentenciaSQL->bindParam(':nombre',$txtNombre);
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();

                $sentenciaSQL = $conexion->prepare("UPDATE albumes SET artista=:artista WHERE id=:id");
                $sentenciaSQL->bindParam(':artista',$txtArtista);
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();

                $sentenciaSQL = $conexion->prepare("UPDATE albumes SET genero=:genero WHERE id=:id");
                $sentenciaSQL->bindParam(':genero',$txtGenero);
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();

                $sentenciaSQL = $conexion->prepare("UPDATE albumes SET anio=:anio WHERE id=:id");
                $sentenciaSQL->bindParam(':anio',$txtAnio);
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();

                $sentenciaSQL = $conexion->prepare("UPDATE albumes SET precio=:precio WHERE id=:id");
                $sentenciaSQL->bindParam(':precio',$txtPrecio);
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
            
            if($txtImagen!=""){

                $fecha= new DateTime();
                $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"ïmagen.jpg";
                $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
                
                move_uploaded_file($tmpImagen,"../../images/".$nombreArchivo);

                $sentenciaSQL = $conexion->prepare("SELECT imagen FROM albumes WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $album=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                if(isset($album["imagen"]) &&($album["imagen"]!="imagen.jpg") ){
                    
                    if(file_exists("../../images/".$album["imagen"])){

                        unlink("../../images/".$album["imagen"]);

                    }

                }

                $sentenciaSQL = $conexion->prepare("UPDATE albumes SET imagen=:imagen WHERE id=:id");
                $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
            }

                header("Location:albumes.php");

                break;
            
            case "Cancelar":
                header("Location:albumes.php");

                break;

            case "Seleccionar":
                $sentenciaSQL = $conexion->prepare("SELECT * FROM albumes WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $album=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                $txtNombre=$album['nombre'];
                $txtArtista=$album['artista'];
                $txtGenero=$album['genero'];
                $txtAnio=$album['anio'];
                $txtPrecio=$album['precio'];
                $txtImagen=$album['imagen'];

                break;

            case "Borrar":

                $sentenciaSQL = $conexion->prepare("SELECT imagen FROM albumes WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $album=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                if(isset($album["imagen"]) &&($album["imagen"]!="imagen.jpg") ){
                    
                    if(file_exists("../../images/".$album["imagen"])){

                        unlink("../../images/".$album["imagen"]);

                    }

                }

                $sentenciaSQL = $conexion->prepare("DELETE FROM albumes WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                
                header("Location:albumes.php");

                break;
        }

        $sentenciaSQL = $conexion->prepare("SELECT * FROM albumes");
        $sentenciaSQL->execute();
        $listaAlbumes=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);



?>

<div class="col-md-5">

    <div class="card">
        
        <div class="card-header">
            
            Datos de Albumes
        
        </div>

        <div class="card-body">

        <form method="POST" enctype="multipart/form-data" >

        <div class = "form-group">
        <label for="txtID">ID:</label>
        <input type="text" required readonly class="form-control" value="<?php echo $txtID ?>" name="txtID"  id="txtID" placeholder="ID">
        </div>

        <div class = "form-group">
        <label for="txtNombre">Nombre:</label>
        <input type="text" required class="form-control" value="<?php echo $txtNombre ?>" name="txtNombre"  id="txtNombre" placeholder="Nombre">
        </div>

        <div class = "form-group">
        <label for="txtArtista">Artista:</label>
        <input type="text" required class="form-control" value="<?php echo $txtArtista ?>" name="txtArtista"  id="txtArtista" placeholder="Artista">
        </div>

        <div class = "form-group">
        <label for="txtGenero">Género:</label>
        <input type="text" required class="form-control" value="<?php echo $txtGenero ?>" name="txtGenero"  id="txtGenero" placeholder="Genero">
        </div>

        <div class = "form-group">
        <label for="txtAnio">Año:</label>
        <input type="text" required class="form-control" value="<?php echo $txtAnio ?>" name="txtAnio"  id="txtAnio" placeholder="Anio">
        </div>

        <div class = "form-group">
        <label for="txtPrecio">Precio:</label>
        <input type="text" required class="form-control" value="<?php echo $txtPrecio ?>" name="txtPrecio"  id="txtPrecio" placeholder="Precio">
        </div>

        <div class = "form-group">
        <label for="txtImagen">Imagen:</label>

        <br>

        <?php if($txtImagen!=""){ ?>

            <img class="img-thumbnail rounded" src="../../images/<?php echo $txtImagen;?>" width="50" alt="" srcset="">    

            
        <?php } ?>

        <input type="file" class="form-control" name="txtImagen"  id="txtImagen" placeholder="Imagen">
        </div>

        <div class="btn-group" role="group" aria-label="">
            <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-success">Agregar</button>
            <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
            <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
        </div>

</form>

        </div>

    </div>
    



</div>

<div class="col-md-7">

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Album</th>
            <th>Artista</th>
            <th>Género</th>
            <th>Anio</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acciónes</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach($listaAlbumes as $album) { ?>
        <tr>
            <td><?php echo $album['id']; ?></td>
            <td><?php echo $album['nombre']; ?></td>
            <td><?php echo $album['artista']; ?></td>
            <td><?php echo $album['genero']; ?></td>
            <td><?php echo $album['anio']; ?></td>
            <td><?php echo $album['precio']; ?></td>
            <td>

            <img class="img-thumbnail rounded" src="../../images/<?php echo $album['imagen']; ?>" width="50" alt="" srcset="">    
        
            </td>
            
            
            <td>
        
            <form method="post">

                <input type="hidden" name="txtID" id="txtID" value="<?php echo $album['id']; ?>"/>

                <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>

                <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>

            </form>

            </td>

        </tr>
            <?php } ?>
    </tbody>
</table>

</div>

<?php include ("../template/footer.php"); ?>

