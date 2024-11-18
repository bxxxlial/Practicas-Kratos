<?php
include("./template/header.php");
include("./administrador/config/bd.php");



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sitio";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_POST){
    $correo=$_POST['correo'];
    $passw=$_POST['contrasenia'];
    $query = "SELECT * FROM clientes WHERE Correo = '$correo' AND Contrasenia = '$passw'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result)>0) {        
        $_SESSION["correo"] = $correo;
        header("Location:index.php");
    } else {
        $mensaje = "Error: El correo o la contraseña son incorrectos";
    }
}
?>
<div class="container">
        <div class="row">
        <div class="col-md-4">
        </div>
            <div class="col-md-4">
                <br><br>
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>

                    <?php if(isset($mensaje)) { ?>    
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje; ?>
                    </div>
                    <?php } ?>

                    <div class="card-body">
                        <form method="POST" >
                        <div class = "form-group">
                        <label>Correo electronico: </label>
                        <input type="text" class="form-control" name="correo" aria-describedby="emailHelp" placeholder="Escribe tu correo">
                        </div>
                        <div class="form-group">
                        <label>Contraseña: </label>
                        <input type="password" class="form-control" name="contrasenia" placeholder="Escribe tu contraseña">
                        <br>
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                        <div class="form-group">
                            <label>¿Usuario nuevo? <a href="nueva.php">Crea una cuenta</a></label>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>

<?php include("./template/footer.php");?>