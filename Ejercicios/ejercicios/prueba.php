<?php
$tu = new stdClass(); // Example initialization
$tu->nom = "Jose Manuel";
$tu->primerLlinatge = "Macias";
$tu->segonLlinatge = null; // or some value

if (is_null($tu->segonLlinatge)) {
    $codi_nom = prueba . phpsubstr($tu->nom, 0, 1) . $tu->primerLlinatge;
} else {
    $codi_nom = prueba . phpsubstr($tu->nom, 0, 1) . $tu->primerLlinatge . substr($tu->segonLlinatge, 0, 1);
}
?>