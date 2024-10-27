<?php

require_once 'funcions.php';

// Dades inicials (exemple)
$producte1 = crearProducte("zapas", "Zapatillas de deporte", 49.99);
$producte2 = crearProducte('Pantalons', 'Pantalons vaquer', 39.99);
$producte3 = crearProducte('Camisa', 'Camisa de vestir', 29.99);
$producte4 = crearProducte('Jersei', 'Jersei de llana', 59.99);




$categoria1 = crearCategoria('Roba', 'Secció de roba');
$categoria2 = crearCategoria('Home', 'Productes per a home');
$categoria3 = crearCategoria('Dona', 'Productes per a dona');

agregarCategoriaAProducte($producte1, $categoria1);
agregarCategoriaAProducte($producte1, $categoria2);
agregarCategoriaAProducte($producte2, $categoria1);
agregarCategoriaAProducte($producte3, $categoria3);
agregarCategoriaAProducte($producte4, $categoria3);

$action = $_GET['action'] ?? '';

if ($action == 'mostrarProductes') {
    $productes = [$producte1, $producte2 , $producte3, $producte4];
    mostrarProductes($productes);
} elseif ($action == 'obtenirProductesPerCategoria') {
    $productesRoba = obtenirProductesPerCategoria($categoria3);
    mostrarProductes($productesRoba);
}

?>