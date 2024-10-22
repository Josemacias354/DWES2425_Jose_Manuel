<?php

use EJERCICIOS\PuebaPOO\Persona;

require_once 'Persona.php';

$persona1 = new Persona('FerNanDo', 'Perez', 30);

//$persona1->nombre = 'Juan';
/*->setNombre('FerNanDo');
$persona1->apellido = 'Perez';
$persona1->edad = 30;*/
//var_dump($persona1);

$persona2 = new Persona('pedro', 'Lopez', 25);

//$persona2->nombre = 'Karla';
/*$persona2->setNombre('Karla');
$persona2->apellido = 'Gomez';
$persona2->edad = 20;
*/

echo "El nombre de la persona 1 es:". $persona1->getNombre() ;
echo "<br>";
echo "El nombre de la persona 1 es:". $persona2->getNombre() ;
echo "<br>";
var_dump($persona1);