<!DOCTYPE html>
<html>
<body>
    <?php
    $h = $_POST["hijos"];
    $e = $_POST["herencia"];

    if($h == 0){
        echo "El cónyuge no tiene hijos, por lo tanto solo se descontara el 5% de la comision del notario, 
        la herencia es de ".($e * .95)." y la comisión del notario es de ".($e * .05);
    }else{
        echo "El cónyuge cuenta con $h hijos, por lo tanto la herencia sera dividida de la siguiente manera:<br>El notario tendra una comision de 3%: ".($e*.03)."$.<br>El cónyuge tendra un 50% del valor restante: ".(($e*.97) * .5)."$.<br>Por ultimo, los hijos se dividiran el 50% restante equitativamente: ".((($e*.97) * .5)/$h)."$.";
    }
    ?>
</body>
</html>