<?php

    class Contrat{
        public $idContrat;
        public $nomContrat;

        // Constructor
        public function __construct($idContrat, $idClient)
        {
            $this->idContrat = $idContrat;
            $this->nomContrat = $nomContrat;
        }
    }

?>
