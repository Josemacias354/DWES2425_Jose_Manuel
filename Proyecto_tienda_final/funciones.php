<?php

class Producte {
    private $nom;
    private $descripcio;
    private $preu;
    private $categories = []; // Cambiado a array

    public function __construct($nom, $descripcio, $preu) {
        $this->nom = $nom;
        $this->descripcio = $descripcio;
        $this->preu = $preu;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescripcio() {
        return $this->descripcio;
    }

    public function getPreu() {
        return $this->preu;
    }

    public function agregarCategoria(Categoria $categoria) {
        $this->categories[] = $categoria; // Agrega la categoría
    }

    public function getCategories() {
        return $this->categories; // Devuelve todas las categorías
    }
}

class Categoria {
    private $nom;
    private $descripcio;
    private $productes = []; // Propiedad inicializada correctamente

    public function __construct($nom, $descripcio) {
        $this->nom = $nom;
        $this->descripcio = $descripcio;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescripcio() {
        return $this->descripcio;
    }

    public function afegirProducte(Producte $producte) {
        $this->productes[] = $producte;
    }

    public function getProductes() {
        return $this->productes;
    }
}

function crearProducte($nom, $descripcio, $preu) {
    return new Producte($nom, $descripcio, $preu);
}

function crearCategoria($nom, $descripcio) {
    return new Categoria($nom, $descripcio);
}

function agregarCategoriaAProducte(Producte $producte, Categoria $categoria) {
    $producte->agregarCategoria($categoria); // Agrega la categoría al producto
}

function mostrarProductes($productes) {
    foreach ($productes as $producte) {
        echo "<div class='product-item'>";
        echo "<p><strong>Nom:</strong> " . htmlspecialchars($producte->getNom()) . "</p>";
        echo "<p><strong>Descripció:</strong> " . htmlspecialchars($producte->getDescripcio()) . "</p>";
        echo "<p><strong>Preu:</strong> " . htmlspecialchars($producte->getPreu()) . " €</p>";
        echo "</div>";
    }
}