<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);

if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}

$dbname = "CREATE DATABASE sitio;";

if ($conn->query($dbname) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

mysqli_select_db($conn,"sitio");

$sql = "CREATE TABLE IF NOT EXISTS albumes (
        id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        artista VARCHAR(255) NOT NULL,
        genero VARCHAR(255) NOT NULL,
        año VARCHAR(255) NOT NULL,
        duracion VARCHAR(255) NOT NULL,
        imagen VARCHAR(1000) NOT NULL,
        )";

if (mysqli_query($conn, $sql)) {
    echo "Table albumes created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Clientes (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    correo VARCHAR(500) NOT NULL,
    contrasenia VARCHAR(60) NOT NULL
    )";

if (mysqli_query($conn, $sql)) {
    echo "Table Clientes created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Carrito(
    ID_sesion VARCHAR(255) NOT NULL,
    ID_albumes int UNSIGNED UNIQUE NOT NULL,
    Cantidad int NOT NULL,
    constraint foreign key(ID_albumes) references albumes(ID)
    ON UPDATE CASCADE ON DELETE CASCADE
    )";

if (mysqli_query($conn, $sql)) {
echo "Table Carrito created successfully";
} else {
echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS tblVentas(
    id VARCHAR(255) NOT NULL,
    ClaveTransaccion int UNSIGNED UNIQUE NOT NULL,
    Fecha int NOT NULL,
    Correo VARCHAR(250) NOT NULL,
    Total DECIMAL(60,2) NOT NULL,
    statuss VARCHAR(200) NOT NULL,
    constraint foreign key(ID_albumes) references albumes(ID)
    ON UPDATE CASCADE ON DELETE CASCADE
    )";

if (mysqli_query($conn, $sql)) {
echo "Table Carrito created successfully";
} else {
echo "Error creating table: " . mysqli_error($conn);
}

header("Location:inicio.php");
