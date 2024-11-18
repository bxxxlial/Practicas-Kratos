<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $contador = 1;
        $letra = 97;
        while($contador < 11){
            echo "$contador";
            $contador++;
        }
        echo "<br>";
        while($letra < 123) {
            echo chr($letra)." ";
            $letra++;
        }
    ?>
</body>
</html>