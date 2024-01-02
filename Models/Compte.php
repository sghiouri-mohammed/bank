<?php

class Compte
{
    public $idCompte;
    public $type_compte;
    public $pieces_a_fournir;

    // Constructor
    public function __construct($idCompte, $type_compte, $pieces_a_fournir)
    {
        $this->idCompte = $idCompte;
        $this->type_compte = $type_compte;
        $this->pieces_a_fournir = $pieces_a_fournir;
    }
}