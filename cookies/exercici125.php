<?php
// duracion de la cookie en segundos de 24 horas
$duracion_cookie = 24 * 60 * 60;

if (isset($_POST['color_fondo'])) {
    $bgcolor = $_POST['color_fondo'];
    setcookie("color_fondo", $bgcolor, time() + $duracion_cookie);
} else {
    $bgcolor = isset($_COOKIE['color_fondo']) ? $_COOKIE['color_fondo'] : '#FFFFFF';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvi de Color de Fons</title>
</head>
<body style="background-color: <?php echo htmlspecialchars($bgcolor); ?>;">

<h1>Selecciona el color del Fondo</h1>
<form action="exercici125.php" method="POST">
    <label for="color_fondo">Tria un color:</label>
    <select name="color_fondo" id="color_fondo">
        <option value="#FFFFFF" <?php if ($bgcolor == '#FFFFFF') echo 'selected'; ?>>Blanco</option>
        <option value="#FF0000" <?php if ($bgcolor == '#FF0000') echo 'selected'; ?>>Rojo</option>
        <option value="#00FF00" <?php if ($bgcolor == '#00FF00') echo 'selected'; ?>>Verde</option>
        <option value="#0000FF" <?php if ($bgcolor == '#0000FF') echo 'selected'; ?>>Azul</option>
        <option value="#FFFF00" <?php if ($bgcolor == '#FFFF00') echo 'selected'; ?>>Amarillo</option>
        <option value="#000000" <?php if ($bgcolor == '#000000') echo 'selected'; ?>>Negro</option>
    </select>
    <button type="submit">Cambia el Color</button>
</form>

</body>
</html>