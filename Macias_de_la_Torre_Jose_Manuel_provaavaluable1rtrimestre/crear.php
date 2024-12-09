<?php
$conexion = mysqli_connect("cicloweb.cesurformacion.com", "gestor09", "DW3SP@ssw0rd", "proyecto_alumno09");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
// Comprobar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $nombre_corto = $_POST['nombre_corto'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $familia = $_POST['familia'];
// Insertar el producto en la base de datos
    $sql = "INSERT INTO productos (nombre, nombre_corto, descripcion, pvp, familia) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssds", $nombre, $nombre_corto, $descripcion, $precio, $familia);
// Comprobar si se ha insertado correctamente
    if ($stmt->execute()) {
        echo "Producto creado exitosamente.";
    } else {
        echo "Error al crear el producto: " . $stmt->error;
    }

    $stmt->close();
}

$sql = "SELECT cod, nombre FROM familias";
$resultado = $conexion->query($sql);
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Crear Producto</title>
        <style>
            body {
                align-content: center;
                align-items: center;
            }
            form {
                display: flex;
                flex-direction: column;
                width: 500px;
                align-content: center;
            }
            label {
                margin-top: 10px;
            }
            input, textarea, select {
                margin-top: 5px;
            }
        </style>
    </head>
    <body>
    <h1>Crear Producto</h1>
    <form action="crear.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="nombre_corto">Nombre Corto:</label>
        <input type="text" name="nombre_corto" id="nombre_corto" required>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" required>
        <br>
        <label for="familia">Familia:</label>
        <select name="familia" id="familia" required>
            // Elementos de la lista desplegable
            <?php
            while ($fila = $resultado->fetch_assoc()) {
                echo "<option value='" . $fila['cod'] . "'>" . $fila['nombre'] . "</option>";
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Crear Producto">
    </form>
    <button type="button" class="btn" onclick="history.go(-1);">Volver</button>
    </body>
    </html>

<?php
$conexion->close();
?>