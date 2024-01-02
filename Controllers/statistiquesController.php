<?php
    class statistiqueContorller{

        public function number_of_agents(){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Employe WHERE idCategorie=:val1");
            $result->execute(array(':val1'=> 0 ));
            $table=$result->fetchAll();
            $longeur=count($table);
            return $longeur;
        }

        public function number_of_conseillers(){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Employe WHERE idCategorie=:val1");
            $result->execute(array(':val1'=> 1 ));
            $table=$result->fetchAll();
            $longeur=count($table);
            return $longeur;
        }

        public function number_of_clients(){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Client");
            $result->execute();
            $table=$result->fetchAll();
            $longeur=count($table);
            return $longeur;
        }

        public function number_of_compte_client(){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Compte");
            $result->execute();
            $table=$result->fetchAll();
            $longeur=count($table);
            return $longeur;
        }

        public function number_of_contrat(){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Contrat");
            $result->execute();
            $table=$result->fetchAll();
            $longeur=count($table);
            return $longeur;
        }

        public function number_of_rdv(){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Rdv");
            $result->execute();
            $table=$result->fetchAll();
            $longeur=count($table);
            return $longeur;
        }


    }

?>