<?php
$servidor="mysql":dbname=".bd.";host=".SERVIDOR";

try {

    $pdo=new PDO($servidor,usuario,password,
    array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    echo "<script>alert('Conectado..)</script>";

} catch (PDOException $) {
    echo "<script>alert('Error..)</script>";
}
?>