<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Marco de asteriscos</h1><br>
    <h1>filas y columnas a ingresar</h1><br>
    <form action="./p14.4.php" method="POST">
        <input type="text" name="filas" sta>
        <input type="text" name="columnas">
        <input type="submit" value="Generar">
    </form><br>
    <?php
        $filas = ($_POST["filas"]);
        $columnas = ($_POST["columnas"]);
        for($i=1; $i <= $filas; $i++){
            for($o=1; $o <= $columnas; $o++){
                if($i == 1 || $i == $filas){
                    echo "*";
                }
                else if($o == 1 || $o == $columnas){
                    echo "*";
                } else {
                    // echo "&nbsp";
                    // el codigo de arriba deberia funcionar, pero deja menos espacios que los representados por los asteriscos.
                    echo "_";
                }
            }
            echo "<br>";
        }
    ?>
</body>
</html>