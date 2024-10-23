<?php

require_once 'funcions.php';

// Dades inicials (exemple)
$producte1 = crearProducte("zapas", "Zapatillas de deporte", 49.99);
$producte2 = crearProducte('Pantalons', 'Pantalons vaquer', 39.99);

$categoria1 = crearCategoria('Roba', 'Secció de roba');
$categoria2 = crearCategoria('Home', 'Productes per a home');

agregarCategoriaAProducte($producte1, $categoria1);
agregarCategoriaAProducte($producte1, $categoria2);
agregarCategoriaAProducte($producte2, $categoria1);

// Mostrar productes de la categoria "Roba"
$productesRoba = obtenirProductesPerCategoria($categoria1);
mostrarProductes($productesRoba);

