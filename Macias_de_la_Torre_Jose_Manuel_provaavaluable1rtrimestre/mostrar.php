<?php
session_start();

$mensaje = "";

// Manejar la lógica de borrado de preferencias
if (isset($_POST['borrar'])) {
    if (isset($_SESSION['perfil_publico']) || isset($_SESSION['zona_horaria'])) {
        unset($_SESSION['perfil_publico']);
        unset($_SESSION['zona_horaria']);
        $mensaje = "Preferencias Borradas.";
    } else {
        $mensaje = "Debes fijar primero las preferencias.";
    }
}

// Mostrar las preferencias si están establecidas
if (isset($_SESSION['perfil_publico']) && isset($_SESSION['zona_horaria'])) {
    $perfil_publico = $_SESSION['perfil_publico'];
    $zona_horaria = $_SESSION['zona_horaria'];
    echo "<p>Perfil Público: $perfil_publico</p>";
    echo "<p>Zona Horaria: $zona_horaria</p>";
} else {
    echo "<p>No hay preferencias establecidas.</p>";
}

if ($mensaje) {
    echo "<p>$mensaje</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Preferencias</title>
    <style>
        body {
            background-color: #00afff;
        }
    </style>
</head>
<body>
<form method="POST" action="mostrar.php">
    <button type="submit" name="borrar">Borrar</button>
    <button type="button" onclick="window.location.href='preferencias.php'">Establecer</button>
</form>
</body>
</html>
