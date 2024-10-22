<?php

class Empleat
{
    private $nom;
    private $llinatges;
    private $sou;
    private $telefons = [];

    public function __construct($nom, $llinatges, $sou)
    {
        $this->nom = $nom;
        $this->llinatges = $llinatges;
        $this->sou = $sou;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getLlinatges()
    {
        return $this->llinatges;
    }

    public function setLlinatges($llinatges)
    {
        $this->llinatges = $llinatges;
    }

    public function getSou()
    {
        return $this->sou;
    }

    public function setSou($sou)
    {
        $this->sou = $sou;
    }

    public function getNomComplet(): string
    {
        return $this->nom . ' ' . $this->llinatges;
    }

    public function hadePagarImpostos(): bool
    {
        return $this->sou > 3333;
    }

    public function afegirTelefon(int $telefon): void
    {
        $this->telefons[] = $telefon;
    }

    public function llistarTelefons(): string
    {
        return implode(', ', $this->telefons);
    }

    public function buidarTelefons(): void
    {
        $this->telefons = [];
    }
}