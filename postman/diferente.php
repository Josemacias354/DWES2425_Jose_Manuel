<?php

header("Content-Type: application/json");
$nombre = $_SERVER['PHP_SELF'];
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$parts = explode("/", $uri);
$entryPoint = end($parts);

echo $nombre;
if($entryPoint === 'prueba'){ {
    switch ($method) {
        case 'GET':http_response_code(200);
            echo json_encode(["message" => "GET bien"]);
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
            break;
        case 'POST':
            http_response_code(200);
            echo json_encode(["message" => "POST bien"]);
            break;
        case 'DELETE':http_response_code(200);
            echo json_encode(["message" => "DELETE bien"]);
            break;
        default:http_response_code(405);
            echo json_encode(["message" => "Método no permitido"]);
            break;
    }}}

