<?php
// Establecemos el nombre de la cookie y su duración (1 año)
$cookie_name = "visitas";
$cookie_value = 1;
$cookie_expiration = time() + (86400 * 365);

if(isset($_COOKIE[$cookie_name])) {
    $cookie_value = $_COOKIE[$cookie_name] + 1;
}

if(isset($_POST['reset'])) {
    $cookie_value = 1; }
setcookie($cookie_name, $cookie_value, $cookie_expiration);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Exercici 123: Comptador de Visites</title>
</head>
<body>
<h1>Comptador de Visites</h1>
<?php

if(!isset($_COOKIE[$cookie_name])) {
    echo "<p>És la teva primera visita!</p>";
} else {
    echo "<p>Aquesta és la teva visita número: " . $cookie_value . "</p>";
}
?>

<form method="post">
    <input type="submit" name="reset" value="Reinicialitza el comptador">
</form>
</body>
</html>


// https://www.xn--codiartes-y1a.cat/tasques_alumnes_cesur/jmacias/cookies/exercici123comptadorVisites.php