<?php

$servidor = "localhost"; // Dirección del servidor MySQL
$usuario = "root";       // Usuario MySQL (ajusta si es necesario)
$password = "AAAAA9615"; // Contraseña MySQL (ajusta si es necesario)
$baseDatos = "EmpleadosDB"; // Nombre de la base de datos


$conexion = new mysqli($servidor, $usuario, $password, $baseDatos);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
echo "Conexión exitosa a la base de datos<br>";


$sql = "SELECT * FROM Empleados";
$resultado = $conexion->query($sql);


if ($resultado->num_rows > 0) {
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Puesto</th>
        <th>Fecha de Contratación</th>
        <th>Salario</th>
        <th>Departamento</th>
    </tr>";

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
        <td>" . $fila["id"] . "</td>
        <td>" . $fila["nombre"] . "</td>
        <td>" . $fila["puesto"] . "</td>
        <td>" . $fila["fecha_contratacion"] . "</td>
        <td>" . $fila["salario"] . "</td>
        <td>" . $fila["departamento"] . "</td>
    </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron empleados.";
}
$conexion->close();
?>