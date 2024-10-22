<?php

use EJERCICIOS\ejercicios\Producto;

$p = new Producto("PS5");
if ($p instanceof Producto) {
    echo "Es un producto";
    echo "La clase es ".get_class($p);

    class_alias("EJERCICIOS\ejercicios\Producto", "Articulo");
    $c = new Articulo("Nintendo Switch");
    echo "Un articulo es un ".get_class($c);

    print_r(get_class_methods("EJERCICIOS\ejercicios\Producto"));
    print_r(get_class_vars("EJERCICIOS\ejercicios\Producto"));
    print_r(get_object_vars($p));

    if (method_exists($p, "mostrarResumen")) {
        $p->mostrarResumen();
    }
}