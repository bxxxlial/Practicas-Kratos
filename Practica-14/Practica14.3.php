<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Mayor y menor</h1><br>
    <h1>Numeros a ingresar</h1><br>
    <form action="./p14.3.php" method="POST">
        <input type="text" name="cantidad">
        <input type="submit" value="Generar">
    </form><br>
    <form action="./p14.3.php" method="post">
        <?php if(isset($_POST["cantidad"])){ ?>
            <?php for($i=1; $i <= $_POST["cantidad"]; $i++){ ?>
            <input type="text" name="cant[]"><br>
            <?php } ?>
        <?php } ?>
        <input type="submit" value="Procesar"><br><br>
    </form>
    <?php
        $array = ($_POST["cant"]);
        if(isset($array)){
            echo "El numero menor es ".min($array)."<br>";
            echo "El numero mayor es ".max($array)."<br>";
        }
    ?>
</body>
</html>