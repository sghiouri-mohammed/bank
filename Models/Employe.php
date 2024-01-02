<?php
class Employe
{
    public $idEmploye;
    public $nom;
    public $login;
    public $mdp; // Note: Storing passwords directly like this is not recommended in production; consider using a secure password hashing library.
    public $categorie;

    function __construct($nom, $login, $mdp, $categorie)
    {
        $this->nom = $nom;
        $this->login = $login;
        $this->mdp = $mdp;
        $this->categorie = $categorie;
    }
}
?>