<?php


$host = "localhost"; // ip
$dbname = "EmpleadosDB"; // nombre de base de datos
$user = "root"; // nombre de usuario de la base de datos
$password = "AAAAA9615"; // contraseña

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
echo "Conexión exitosa";
