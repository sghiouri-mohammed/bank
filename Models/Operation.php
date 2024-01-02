<?php
class Operation
{
    public $idOperation;
    public $montant;
    public $typeOp;
    public $idClient;
    public $idCompte;

    function __construct($montant, $typeOp, $idClient, $idCompte)
    {
        $this->montant = $montant;
        $this->typeOp = $typeOp;
        $this->idClient = $idClient;
        $this->idCompte = $idCompte;
    }
}
?>