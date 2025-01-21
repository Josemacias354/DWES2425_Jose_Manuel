
<?php
$method = $_SERVER["REQUEST_METHOD"];$uri = $_SERVER["REQUEST_URI"];

$script_name = $_SERVER["SCRIPT_NAME"];
$relative_uri = substr($uri, strlen($script_name));
$parts = explode("/", trim($relative_uri, "/"));
$entryPoint = $parts[0];if ($entryPoint === "prueba") {
    switch ($method) {
        case "GET":
            echo "Has utilizado el metodo GET.";
            http_response_code(200);
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
        case "POST":
            echo "Has utilizado el metodo POST.";
            http_response_code(200);
            break;
        case "DELETE":
            echo "Has utilizado el metodo DELETE.";
            http_response_code(200);
            break;
        case "PUT":
            echo "Has utilizado el metodo PUT.";
            http_response_code(200);
            break;
        default:
            echo "Este metodo no esta permitido";
            http_response_code(400);
            break;
    }}
else {    echo "URI incorrecta";    http_response_code(404);}?>