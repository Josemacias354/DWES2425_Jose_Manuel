<?php


// Conexión a la base de datos
$conexion = mysqli_connect("cicloweb.cesurformacion.com", "gestor09", "DW3SP@ssw0rd", "proyecto_alumno09");

// Verificar si la conexión fue exitosa
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

echo "<h1>Gestion de productos</h1>";

// Consulta para obtener todos los productos
$sql = "SELECT * FROM productos";
$resultado = $conexion->query($sql);

echo "<table border='1'>
    <tr>
        <th>Detalles</th>
        <th>Cod</th>
        <th>Nombre</th>
        <th>Actualizar</th>
        <th>Borrar</th>
    </tr>";

// Mostrar  resultados de la consulta
while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>
        <td><button onclick=\"window.location.href='detalle.php?id=" . $fila["id"] . "'\">Detalles</button></td>
        <td>" . $fila["id"] . "</td>
        <td>" . $fila["nombre"] . "</td>
        <td><button style='background-color: yellow; color: black;' onclick=\"window.location.href='update.php?id=" . $fila["id"] . "'\">Actualizar</button></td>
        <td><button style='background-color: red; color: white;' onclick=\"window.location.href='borrar.php?id=" . $fila["id"] . "'\">Borrar</button></td>
    </tr>";
}
echo "</table>";

// Cerrar la conexión a la base de datos
$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<style>
    body {
        align-content: center;
        align-items: center;
        background-color: #00afff;
</style>
<head>
    <meta charset="UTF-8">
    <title>Redirection Button</title>
</head>
<body>

<button onclick="window.location.href='crear.php'">Crear</button>
</body>
</html>