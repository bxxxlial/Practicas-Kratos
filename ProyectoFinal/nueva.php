<?php session_start();
include("./administrador/config/bd.php");
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

    $query = "SELECT * FROM clientes WHERE Correo = '$correo'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count==0) {
        $_SESSION["correo"] = $correo;
        $sql = "INSERT INTO clientes (Correo, Contrasenia) VALUES ('$correo','$passw')";
        if (mysqli_query($conn, $sql)) {
            header("Location:index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        $mensaje = "Error: Este correo ya ha sido registrado";
    }
} ?>
<div class="container">
        <div class="row">
        <div class="col-md-4">
        </div>
            <div class="col-md-4">
                <br><br>
                <div class="card">
                    <div class="card-header">
                        Registro
                    </div>
                    <?php if(isset($mensaje)) { ?>    
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje; ?>
                    </div>
                    <?php } ?>

                    <div class="card-body">
                        <form method="POST">
                        <div class = "form-group">
                        <label>Correo electronico: </label>
                        <input type="text" class="form-control" name="correo" aria-describedby="emailHelp" placeholder="Escribe tu correo">
                        </div>
                        <div class="form-group">
                        <label>Contraseña: </label>
                        <input type="password" class="form-control" name="contrasenia" placeholder="Escribe tu contraseña">
                        <br>
                        <input type="submit" class="btn btn-primary" value="Registrarse"></input>
                        </form>
                    </div>
                </div>
                <p><a href="login.php" style="margin-left: 10px;">Volver al inicio de sesión</a></p>
            </div>
        </div>
      </div>
</div>

<?php include("./template/footer.php");?>