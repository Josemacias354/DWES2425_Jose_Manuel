<?php
$conexion = new mysqli("localhost", "root", "AAAAA9615", "EmpleadosDB");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
echo "Conexión exitosa a la base de datos<br>";


$sql = "SELECT * FROM Empleados";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo "
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
