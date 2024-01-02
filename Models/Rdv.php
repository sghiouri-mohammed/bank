<?php
class Rdv
{
    public $idRdv;
    public $dateRdv;

    function __construct($idRdv, $dateRdv)
    {
        $this->idRdv = $idRdv;
        $this->dateRdv = $dateRdv;
    }
}
?>