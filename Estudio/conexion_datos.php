<?php
$conexion = mysqli_connect("localhost", "root", "AAAAA9615", "EmpleadosDB");

if(mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

echo "<h1>Bienvenid@ a MySQL !!</h1>";


$sql = "SELECT * FROM Empleados";
$resultado = $conexion->query($sql);

/*
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
*/

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

$conexion->close();