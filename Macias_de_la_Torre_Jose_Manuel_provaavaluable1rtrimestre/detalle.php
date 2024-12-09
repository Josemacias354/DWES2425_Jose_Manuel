<?php

$conexion = mysqli_connect("cicloweb.cesurformacion.com", "gestor09", "DW3SP@ssw0rd", "proyecto_alumno09");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
//Recogemos el id del producto
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    //Mostramos los detalles del producto
    if ($fila = $resultado->fetch_assoc()) {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <title>Detalles del Producto</title>
            <style>
                body {
                    background-color: #00afff;
                }
            </style>
        </head>
        <body>
        <h1>Detalles del Producto</h1>
        <p><strong>Código:</strong> " . $fila['id'] . "</p>
        <p><strong>Nombre:</strong> " . $fila['nombre'] . "</p>
        <p><strong>Nombre Corto:</strong> " . $fila['nombre_corto'] . "</p>
        <p><strong>Precio:</strong> " . $fila['pvp'] . "</p>
        <p><strong>Familia:</strong> " . $fila['familia'] . "</p>
        <p><strong>Descripción:</strong> " . $fila['descripcion'] . "</p>
        <button onclick=\"window.location.href='listado.php'\">Volver</button>
        </body>
        </html>";
    } else {
        echo "Producto no encontrado.";
    }

    $stmt->close();
} else {
    echo "No se ha proporcionado un ID de producto.";
}

$conexion->close();
?>