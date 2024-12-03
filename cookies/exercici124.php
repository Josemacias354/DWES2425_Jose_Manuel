<?php
// Comprobante si hay la cookie
if (isset($_COOKIE['background_color'])) {
    $backgroundColor = $_COOKIE['background_color'];
} else {
    // Si no hi ha cookie, el color de fons per defecte serà blanc.
    $backgroundColor = '#FFFFFF';
}
// Comprovem si l'usuari ha seleccionat un color nou mitjançant el formulari.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pillamos el color seleccionado.
    $selectedColor = $_POST['color'];
    // Cambiamos el color de fondo.
    $backgroundColor = $selectedColor;
    //Cookie que guarda el color de fons durante 24h
    setcookie('background_color', $selectedColor, time() + 86400);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambia el color del fondo</title>
</head>
<body style="background-color: <?= htmlspecialchars($backgroundColor) ?>;">
<h1>Selecciona el color del fondo</h1>
<form method="post" action="exercici124.php">
    <label for="color">Elige:</label>
    <select name="color" id="color">
        <option value="#FFFFFF" <?= $backgroundColor == '#FFFFFF' ? 'selected' : '' ?>>Blanco</option>
        <option value="#FF0000" <?= $backgroundColor == '#FF0000' ? 'selected' : '' ?>>Rojo</option>
        <option value="#00FF00" <?= $backgroundColor == '#00FF00' ? 'selected' : '' ?>>Verde</option>
        <option value="#0000FF" <?= $backgroundColor == '#0000FF' ? 'selected' : '' ?>>Azul</option>
        <option value="#FFFF00" <?= $backgroundColor == '#FFFF00' ? 'selected' : '' ?>>Amarillo</option>
        <option value="#FFA500" <?= $backgroundColor == '#FFA500' ? 'selected' : '' ?>>Naranja</option>
        <option value="#FFC0CB" <?= $backgroundColor == '#FFC0CB' ? 'selected' : '' ?>>Rosa</option>
    </select>
    <button type="submit">Cambia el color del fondo</button>
</form>
</body>
</html>
