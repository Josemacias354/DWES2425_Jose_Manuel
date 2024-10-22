<?php

require_once "exercici114EmpleatConstructor.php";

// Test constructor
$empleat = new Empleat("Sergio", "Gomez", 19, 30);
assert($empleat->getNom() === "Sergio");
assert($empleat->getLlinatges() === "Gomez");
assert($empleat->getSou() === 30);

// Test setters and getters
$empleat->setSou(30);
assert($empleat->getSou() === 30);

// Test getNomComplet
assert($empleat->getNomComplet() === "Sergio Gomez");

// Test hadePagarImpostos
assert($empleat->hadePagarImpostos() === false);
$empleat->setSou(4000);
assert($empleat->hadePagarImpostos() === true);

// Test afegirTelefon, llistarTelefons, and buidarTelefons
$empleat->afegirTelefon(666666666);
assert($empleat->llistarTelefons() === "666666666");
$empleat->buidarTelefons();
assert($empleat->llistarTelefons() === "");