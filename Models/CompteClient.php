<?php
class CompteClient
{
    public $idCompteClient;
    public $dateOuverture;
    public $solde;
    public $montantDecouvert;
    public $idClient;
    public $idCompte;

    function __construct($dateOuverture, $solde, $montantDecouvert, $idClient, $idCompte)
    {
        $this->dateOuverture = $dateOuverture;
        $this->solde = $solde;
        $this->montantDecouvert = $montantDecouvert;
        $this->idClient = $idClient;
        $this->idCompte = $idCompte;

    }
}
?>