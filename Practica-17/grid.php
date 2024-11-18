<?php
session_start();
    if (isset($_REQUEST["submit"])) {
        $_SESSION["login"] = $_POST["username"];
        $_SESSION["pass"] = $_POST["password"];
    }

    $cont = 1;
    if(isset($_SESSION["login"])){
        $cont = $_SESSION["cont"];
        $_SESSION["cont"] = $cont + 1;
    } else {
        $_SESSION["cont"] = 1;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grid</title>
    <style>
        * {
            box-sizing: border-box;
        }

        html {
            font-size: 62.5%;
        }

        h1 {
            color: white;
            font-size: 4rem;
            margin: 0;
        }

        img {
            width: 10rem;
            height: 10rem;
        }

        .container {
            display: grid;
            grid-template-areas:
                'header header'
                'aside article'
                'footer footer';
            padding: 2rem;
            row-gap: 2rem;
            column-gap: 2rem;
            grid-template-columns: 30% 68%;
            grid-template-rows: 15rem 40rem 15rem;
            background-color: rgb(255, 180, 196)
        }

        .container div {
            display: grid; 
            justify-content: center;
            align-content: center;
        }

        .header {
            grid-area: header;
            display: flex;
            flex-direction: column;
            font-size: 2rem;
            background-color: <?php echo $_SESSION["color"]?>
        }
        .header1{
            width: 80%;
        }
        .header2{
            width: 20%;
        }

        .aside {
            grid-area: aside;
            font-size: 2rem;
            background-color: <?php echo $_SESSION["color"]?>
        }

        .article {
            grid-area: article;
            grid-template-areas:
                'articulo'
                'imagen';
            padding: 2rem;
            background-color: <?php echo $_SESSION["color"]?>
        }

        #articulo {
            align-content: flex-end;
        }

        .articulo {
            grid-area: articulo;
        }

        .imagen {
            grid-area: imagen;
            display: grid;
            grid-auto-flow: column;
            justify-content: space-evenly;
        }

        .footer {
            grid-area: footer;
            background-color: <?php echo $_SESSION["color"]?>
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header1">
               <h1>Header</h1> 
            </div>
            <div class="header2">
                <?php if (isset($_SESSION["login"])) { ?>
                    <?php echo "Hola " . $_SESSION["login"] . "!"; ?>
                    <form action="./grid.php" method="POST">
                        <input type="submit" name="cerrar" value="Cerrar sesión">
                    </form>
                <?php } else { ?>
                    <p><a href="./login.php">INGRESAR</a></p>
                <?php } ?>
            </div>
        </div>
        <div class="aside">
            <form action="./color.php" method="POST">
                <label>¿De qué color quieres que sea la pagina?</label><br>
                <input type="color" name="color">
                <input type="submit" value="Procesar" name="col">
            </form>
        </div>
        <div class="article" id="articulo">
            <div class="articulo">
                <h1>Article</h1>
            </div>
            <div class="imagen">
                <img src="./rias1.webp">
                <img src="./rias2.webp">
                <img src="./rias3.webp">
            </div>
        </div>
        <div class="footer">
            <h1>Contador de visitas al sitio</h1><br>
            <h1><?php echo "Generales: ".$_COOKIE["counter"].", En esta sesión: ".$_SESSION["cont"]; ?></h1>
        </div>
    </div>
    <?php
    $counter = 0;
    if(!isset($_COOKIE["counter"])){
        $counter = 1;
        setcookie("counter", $counter, time()+60*60*24,"/");
    } else {
        echo $_COOKIE["counter"];
        $counter = $_COOKIE["counter"] + 1 ;
        setcookie("counter", $counter, time()+60*60*24,"/");
    }

    if(isset($_REQUEST["cerrar"])){
        session_unset();
        header("Location:login.php");
    }
    ?>
</html>