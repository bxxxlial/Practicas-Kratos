<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 16</title>
</head>
<body>
    <h1>Calculadora</h1><br>
    <h1>Numeros a ingresar</h1><br>
    <form action="./Practica16.php" method="POST">
        <input type="number" min="2" max="10" name="cantidad">
        <input type="submit" value="Generar">
    </form><br>
    <form action="./Practica16.php" method="post">
        <?php if(isset($_POST["cantidad"])){ ?>
            <?php for($i=1; $i <= $_POST["cantidad"]; $i++){ ?>
            <input type="text" name="cant[]"><br>
            <?php } ?>
            <hr>
            <input type="radio" name="op" value="S" checked>Suma<br>
            <input type="radio" name="op" value="R">Resta<br>
            <input type="radio" name="op" value="M">Multiplicación<br>
            <hr>
            <input type="submit" value="Procesar"><br><br>
        <?php } ?>
    </form>
    <?php
        $array = ($_POST["cant"]);
        $op =$_POST["op"];
        if(isset($array)){
            switch ($op) {
                case 'S':
                  echo "La suma de ";
                  echo $array[0];
                  for($i = 0; $i < count($array); $i++){
                    echo "+".$array[$i];
                  }
                  echo " da como resultado: ".array_sum($array);// Función que suma los elementos de un arreglo
                  break;
        
                case 'R':
                  $c = count($array)-1;// Variable que cuenta la longitud de un arreglo
                  sort($array);// Función que ordena el arreglo de mayor a menor
                  $r = $array[$c];// Variable que guarda el resultado
                  for ($i = $c-1; $i >= 0; $i--) {
                    $r -= $array[$i];
                  } 
                  echo "La resta de ";
                  echo $array[0];
                  for($i = 0; $i < count($array); $i++){
                    echo "-".$array[$i];
                  }
                  echo " da como resultado: $r";
                  break;
        
                case 'M':
                    echo "La multiplicación de ";
                    echo $array[0];
                    for($i = 0; $i < count($array); $i++){
                      echo "*".$array[$i];
                    }
                  echo " da como resultado: ".(array_product($array));// Función que devuelve el producto de un arreglo
                  break;
            }
        }
    ?>
</body>
</html>