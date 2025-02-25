<?php

try {
    $host = "localhost"; // ip
    $dbname = "EmpleadosDB"; // nombre de base de datos
    $user = "root"; // nombre de usuario de la base de datos
    $password = "AAAAA9615"; // contraseña maricon

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    echo "Conexión exitosa a la base de datos";

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}