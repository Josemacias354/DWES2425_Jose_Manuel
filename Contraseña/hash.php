<?php
//hacer el has a la contraseña del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];

}
$hash = hash( "sha256", $password);
echo "La contraseña hasheada es $hash  <br>";

