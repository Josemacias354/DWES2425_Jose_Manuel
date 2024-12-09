<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['idioma'] = $_POST['idioma'];
    $_SESSION['perfil_publico'] = $_POST['perfil_publico'];
    $_SESSION['zona_horaria'] = $_POST['zona_horaria'];
    $mensaje = "Preferencias de usuario guardadas.";
}

$idioma = isset($_SESSION['idioma']) ? $_SESSION['idioma'] : '';
$perfil_publico = isset($_SESSION['perfil_publico']) ? $_SESSION['perfil_publico'] : '';
$zona_horaria = isset($_SESSION['zona_horaria']) ? $_SESSION['zona_horaria'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Preferencias</title>
    <style>
        body {
            background-color: #00afff;
        }

    </style>
</head>
<body>
<h1>Preferencias del Usuario</h1>
<?php if (isset($mensaje)) echo "<p>$mensaje</p>"; ?>
<form action="preferencias.php" method="POST">
    <label for="idioma">Idioma:</label>
    <select name="idioma" id="idioma" required>
        <option value="ingles" <?php if ($idioma == 'ingles') echo 'selected'; ?>>Inglés</option>
        <option value="espanol" <?php if ($idioma == 'espanol') echo 'selected'; ?>>Español</option>
    </select>
    <br>
    <label for="perfil_publico">Perfil Público:</label>
    <select name="perfil_publico" id="perfil_publico" required>
        <option value="si" <?php if ($perfil_publico == 'si') echo 'selected'; ?>>Sí</option>
        <option value="no" <?php if ($perfil_publico == 'no') echo 'selected'; ?>>No</option>
    </select>
    <br>
    <label for="zona_horaria">Zona Horaria:</label>
    <select name="zona_horaria" id="zona_horaria" required>
        <option value="GMT-2" <?php if ($zona_horaria == 'GMT-2') echo 'selected'; ?>>GMT-2</option>
        <option value="GMT-1" <?php if ($zona_horaria == 'GMT-1') echo 'selected'; ?>>GMT-1</option>
        <option value="GMT" <?php if ($zona_horaria == 'GMT') echo 'selected'; ?>>GMT</option>
        <option value="GMT+1" <?php if ($zona_horaria == 'GMT+1') echo 'selected'; ?>>GMT+1</option>
        <option value="GMT+2" <?php if ($zona_horaria == 'GMT+2') echo 'selected'; ?>>GMT+2</option>
    </select>
    <br>
    <input type="submit" value="Establecer preferencias">
</form>
<a href="mostrar.php">Mostrar preferencias</a>
</body>
</html>
