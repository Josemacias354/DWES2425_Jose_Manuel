<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulari 1</title>
</head>
<body>
<h1>Formulari 1</h1>
<form action="exercici127formulari2.php" method="post">
    <label for="Nombre_y_Apellidos">Nombre y Apellidos</label>
    <input type="text" id="Nombre_y_Apellidos" name="Nombre_y_Apellidos" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="url">URL:</label>
    <input type="url" id="url" name="url" required><br><br>

    <label for="sexo">Sexo:</label>
    <select id="sexo" name="sexo" required>
        <option value="hombre">Home</option>
        <option value="mujer">Dona</option>
        <option value="otro">Otros</option>
    </select><br><br>

    <button type="submit">Enviar</button>
</form>
</body>
</html>



<?php
