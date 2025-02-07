<?php
try {
    // Create a new SOAP client
    $client = new SoapClient("http://localhost:8080/ws/user?wsdl");

    $parametros = array("userId" => 1);

    // Call the getUser operation
    $respuesta = $client->getUser($parametros);

    // Print the response
    echo "Name: " . $respuesta->nombre . "\n";
    echo "Email: " . $respuesta->email . "\n";
} catch (SoapFault $e) {
    // Handle any errors
    echo "Error: " . $e->getMessage();
}
