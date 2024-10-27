<?php

class Producte
{
    private $nom;
    private $descripcio;
    private $preu;
    private $categories = [];

    public function __construct($nom, $descripcio, $preu)
    {
        $this->nom = $nom;
        $this->descripcio = $descripcio;
        $this->preu = $preu;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getDescripcio()
    {
        return $this->descripcio;
    }

    public function getPreu()
    {
        return $this->preu;
    }

    public function afegirCategoria(Categoria $categoria)
    {
        $this->categories[] = $categoria;
    }

    public function getCategories()
    {
        return $this->categories;
    }
}

class Categoria
{
    private $nom;
    private $descripcio;
    private $productes = [];

    public function __construct($nom, $descripcio)
    {
        $this->nom = $nom;
        $this->descripcio = $descripcio;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getDescripcio()
    {
        return $this->descripcio;
    }

    public function afegirProducte(Producte $producte)
    {
        $this->productes[] = $producte;
    }

    public function getProductes()
    {
        return $this->productes;
    }
}

function crearProducte($nom, $descripcio, $preu)
{
    return new Producte($nom, $descripcio, $preu);
}

function crearCategoria($nom, $descripcio)
{
    return new Categoria($nom, $descripcio);
}

function agregarCategoriaAProducte(Producte $producte, Categoria $categoria)
{
    $producte->afegirCategoria($categoria);
    $categoria->afegirProducte($producte);
}

function mostrarProductes(array $productes)
{
    foreach ($productes as $producte) {
        echo "Nom: " . $producte->getNom() . "<br>";
        echo "Descripció: " . $producte->getDescripcio() . "<br>";
        echo "Preu: " . $producte->getPreu() . "<br><br>";
    }
}

function obtenirProductesPerCategoria(Categoria $categoria)
{
    return $categoria->getProductes();
}