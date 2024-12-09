<?php

$conexion = mysqli_connect("cicloweb.cesurformacion.com", "gestor09", "DW3SP@ssw0rd", "proyecto_alumno09");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM productos WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Producto borrado exitosamente.";
        echo "<br>";
        echo "<button onclick=\"window.location.href='listado.php'\">Volver</button>";
    } else {
        echo "Error al borrar el producto: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No se ha proporcionado un ID de producto.";
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Borrar Producto</title>
</head>
<body>
<button onclick="window.location.href='listado.php'">Volver</button>
</body>
</html>