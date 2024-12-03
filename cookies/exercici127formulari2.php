<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['Nombre_y_Apellidos'] = $_POST['Nombre_y_Apellidos'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['url'] = $_POST['url'];
    $_SESSION['sexo'] = $_POST['sexo'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulari 2</title>
</head>
<body>
<h1>Formulari 2</h1>
<p><strong>Nombre y Apellidos:</strong> <?php echo htmlspecialchars($_SESSION['Nombre_y_Apellidos']); ?></p>
<p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
<p><strong>URL:</strong> <?php echo htmlspecialchars($_SESSION['url']); ?></p>
<p><strong>Sexo:</strong> <?php echo htmlspecialchars($_SESSION['sexo']); ?></p>
</body>
</html>