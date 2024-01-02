<?php
    class rdvController{

        public function ajoutre_rdv($motif, $nomClient, $prenomClient, $idClient, $listPiece, $nomEmplye, $idEmploye, $dateRdv, $timeRdv){
            include('connexion.php');
            $result = $conn->prepare("INSERT INTO Rdv (motifRdv, nomClient, prenomClient, idClient, listPiece, nomEmploye, idEmploye, dateRdv, timeRdv)
            VALUES (?,?,?,?,?,?,?,?,?)");
            $result->execute(array($motif, $nomClient, $prenomClient, $idClient, $listPiece, $nomEmplye, $idEmploye, $dateRdv, $timeRdv));
            return true;
        }

        public function get_all_rdvs(){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Rdv");
            $result->execute();
            $table=$result->fetchAll();
            return $table;
        }

        public function get_rdv_between_two_dates($date1, $date2){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Rdv WHERE dateRdv BETWEEN ? AND ?");
            $result->execute(array($date1, $date2));
            $table=$result->fetchAll();
            return $table;
        }
    }


?>