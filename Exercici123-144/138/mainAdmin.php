<?php
echo "Bienvenido admin";

$clientes = ["Jose", "Maria", "Juan", "Ana", "Pedro"];
$soporte = ["google", "facebook", "twitter", "instagram", "linkedin"];

echo "<h1>Clientes</h1>";
foreach ($clientes as $cliente) {
    echo "<p>$cliente</p>";
}
echo "<h1>Soporte</h1>";
foreach ($soporte as $soport) {
    echo "<p>$soport</p>";
}