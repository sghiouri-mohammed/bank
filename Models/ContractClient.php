<?php

    class ContratClient
    {
        public $idContratClient;
        public $dateContrat;
        public $tarifMensuel;
        public $idClient;
        public $idContrat;

        function __construct($dateContrat, $tarifMensuel, $idClient,$idContrat )
        {
            $this->dateContrat = $dateContrat;
            $this->tarifMensuel = $tarifMensuel;
            $this->idClient = $idClient;
            $this->idContrat = $idContrat;
        }
    }

?>
