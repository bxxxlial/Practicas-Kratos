<?php session_start();
    if(isset($_SESSION["login"])){
        header("Location:grid.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
        }
        form {
            margin: 50px;
            border: 1px solid;
        }
    </style>
</head>
<body align="center">
    <form action="./grid.php" method="post">
        <h1>Usuario</h1>
        <input type="text" name="username" required><br>
        <h1>Contraseña</h1>
        <input type="text" name="password" required><br><br>
        <input type="submit" name="submit" value="Entrar">
    </form>
    <form action="./grid.php" method="post">
        <h1>¿Deseas entrar como invitado?</h1>
        <input type="submit" name="invitado" value="invitado">
    </form>
</body>
</html>