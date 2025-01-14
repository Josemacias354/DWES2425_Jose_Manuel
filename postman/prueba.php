<?php
header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode(["message" => "Hola Món"]);
        break;
    case 'POST':
        $postData = json_decode(file_get_contents('php://input'), true);
        // Process the POST data here
        echo json_encode(["message" => "Petición POST", "data" => $postData]);
        break;
    default:
        http_response_code(405);
        echo json_encode(["message" => "Método no permitido"]);
        break;
}
?>