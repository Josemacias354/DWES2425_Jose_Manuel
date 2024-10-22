<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incrustar php en htmlentities</title>
</head>
<body>
<?php

echo "Ingresa el radio de un cono: ";
fscanf(STDIN, "%d", $radio);

echo "Ingresa la altura de un cono: ";
fscanf(STDIN , "%d", $altura);

$volumen = 3.1416 * $radio * $radio * $altura / 3;

echo "El area del cono es: $volumen";?>

</body>
</html>