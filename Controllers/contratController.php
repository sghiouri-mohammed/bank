<?php
    class contratController{
        
        public function ajouterContrat($nom){
            include('connexion.php');
            $result = $conn->prepare("INSERT INTO `Contrat`(`nomContrat`) VALUES (?)");
            $result->execute(array($nom));
            return true;
        }

        public function deleteContrat($id){
            include('connexion.php');
            $result = $conn->prepare("DELETE FROM Contrat WHERE idContrat=:val1");
            $result->execute(array(':val1'=>$id));
        }

        public function updateContrat($id, $nom){
            include('connexion.php');
            $result = $conn->prepare("UPDATE Contrat SET nomContrat=:val1 WHERE idCompte=:val3");
            $result->execute(array(':val1'=>$nom, ':val3'=>$id ));
        }

        public function get_all_contrats(){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Contrat");
            $result->execute();
            $table=$result->fetchAll();
            return $table;
        }

        public function get_contrat_client($id){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM ContratClient WHERE idClient = :val");
            $result->execute(array(":val" => $id));
            $table=$result->fetchAll();
            return $table;
        }

        public function get_contrat($id){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Contrat WHERE idContrat = :val");
            $result->execute(array(":val" => $id));
            $table=$result->fetchAll();
            return $table;
        }


    }
?>
