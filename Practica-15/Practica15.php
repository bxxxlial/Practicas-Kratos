<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 15</title>
</head>
<body>
    <form action="./Practica15.php" method="POST">
        <label>Primer numero</label>
        <input type="text" name="no1"><br><br>
        <label>Segundo numero</label>
        <input type="text" name="no2">

        <hr>
  		<input type="radio" name="op" value="S" checked>Suma<br>
  		<input type="radio" name="op" value="R">Resta<br>
  		<input type="radio" name="op" value="M">Multiplicación<br>
        <input type="radio" name="op" value="D">División<br>
        <input type="radio" name="op" value="T">Todas las anteriores<br>
	    <hr>
        <input type="submit" value="Procesar">
    </form>
    
    <?php
        $op =$_POST["op"];
        $no1 =$_POST["no1"];
        $no2 =$_POST["no2"];
          
        switch ($op) {
          case 'S':
            echo "Suma: ".($no1+$no2);
            break;
  
          case 'R':
            if($no1 < $no2){
                echo "Resta: ".($no2-$no1);
            } else {
                echo "Resta: ".($no1-$no2);
            }
            break;
  
          case 'M':
            echo "Multiplicación: ".($no1*$no2);
            break;
  
          case 'D':
            echo "División: ".($no1/$no2);
            break;

          case 'T':
            echo "Suma: ".($no1+$no2)."<br>";
            if($no1 < $no2){
                echo "Resta: ".($no2-$no1)."<br>";
            } else {
                echo "Resta: ".($no1-$no2)."<br>";
            }
            echo "Multiplicación: ".($no1*$no2)."<br>";
            echo "División: ".($no1/$no2)."<br>";
            break;
        }
    ?>
</body>
</html>