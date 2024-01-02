<?php
class Client
{
    public $idClient;
    public $nom;
    public $prenom;
    public $adresse;
    public $mail;
    public $numtel;
    public $situation;
    public $idConseiller;

    function __construct($nom, $prenom, $adresse, $mail, $numtel, $situation,$idConseiller)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->mail = $mail;
        $this->numtel = $numtel;
        $this->situation = $situation;
        $this->idConseiller = $idConseiller;
    }
}
?>