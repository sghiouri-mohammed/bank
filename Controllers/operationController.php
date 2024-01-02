<?php

    class operationController{

        function effectuer_operation_retrait($montant, $typeOp, $idClient, $idCompte){
            include('connexion.php');

            $result = $conn->prepare(
                "INSERT INTO `Operation`(`montant`, `typeOp`, `idClient`, `idCompte`) 
                VALUES (?, ?, ?, ?)"
            );

            $result->execute(array($montant, $typeOp, $idClient, $idCompte));
            return true;
        }


        function effectuer_operation_depot($montant, $typeOp, $idClient, $idCompte){
            include('connexion.php');

            $result = $conn->prepare(
                "INSERT INTO `Operation`(`montant`, `typeOp`, `idClient`, `idCompte`) 
                VALUES (?, ?, ?, ?)"
            );

            $result->execute(array($montant, $typeOp, $idClient, $idCompte));
            return true;
        }
    }

?>