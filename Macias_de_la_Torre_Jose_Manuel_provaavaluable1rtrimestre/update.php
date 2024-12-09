<?php
$conexion = mysqli_connect("cicloweb.cesurformacion.com", "gestor09", "DW3SP@ssw0rd", "proyecto_alumno09");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $nombre_corto = $_POST['nombre_corto'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $familia = $_POST['familia'];

    $sql = "UPDATE productos SET nombre = ?, nombre_corto = ?, descripcion = ?, pvp = ?, familia = ? WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssisi", $nombre, $nombre_corto, $descripcion, $precio, $familia, $id);

    if ($stmt->execute()) {
        echo "Producto actualizado exitosamente.";
    } else {
        echo "Error al actualizar el producto: " . $stmt->error;
    }

    $stmt->close();
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($producto = $resultado->fetch_assoc()) {
        $sql_familias = "SELECT cod, nombre FROM familias";
        $resultado_familias = $conexion->query($sql_familias);
    } else {
        echo "Producto no encontrado.";
        exit();
    }

    $stmt->close();
} else {
    echo "No se ha proporcionado un ID de producto.";
    exit();
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Producto</title>
    <style>
        body {
            align-content: center;
            align-items: center;
            background-color: #00afff;
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
    </style>
</head>
<body>
<h1>Actualizar Producto</h1>
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>" required>
    <br>
    <label for="nombre_corto">Nombre Corto:</label>
    <input type="text" name="nombre_corto" id="nombre_corto" value="<?php echo $producto['nombre_corto']; ?>" required>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required><?php echo $producto['descripcion']; ?></textarea>
    <br>
    <label for="precio">Precio:</label>
    <input type="number" name="precio" id="precio" step="0.01" value="<?php echo $producto['pvp']; ?>" required>
    <br>
    <label for="familia">Familia:</label>
    <select name="familia" id="familia" required>
        <?php
        while ($fila = $resultado_familias->fetch_assoc()) {
            $selected = $fila['cod'] == $producto['familia'] ? 'selected' : '';
            echo "<option value='" . $fila['cod'] . "' $selected>" . $fila['nombre'] . "</option>";
        }
        ?>
    </select>
    <br>
    <input type="submit" value="Actualizar Producto">
</form>
<button type="button" class="btn" onclick="history.go(-1);">Volver</button>
</body>
</html>