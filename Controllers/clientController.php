<?php
    class clientController{

        public function ajouter_client($nom, $prenom, $adresse, $mail, $numtel, $situation, $conseiller){
            include('connexion.php');
            $result = $conn->prepare(
                "INSERT INTO `Client`(`nom`, `prenom`, `adresse`, `mail`, `numtel`, `situation`, `idEmploye`) 
                VALUES (?, ?, ?, ?, ?, ?, ?)"
            );
            $result->execute(array($nom, $prenom, $adresse, $mail, $numtel, $situation, $conseiller));
            return true;
        }
        
        public function get_all_clients(){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Client");
            $result->execute();
            $table=$result->fetchAll();
            return $table;
        }

        public function get_client($id){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Client WHERE idClient=:val1");
            $result->execute(array(':val1'=>$id));
            $table=$result->fetchAll();
            return $table;
        }

        public function delete_client($id){
            include('connexion.php');
            $result = $conn->prepare("DELETE FROM Client WHERE idClient=:val1");
            $result->execute(array(':val1'=>$id));
        }

        public function update_client($id,$nom, $prenom, $adresse, $mail, $numtel, $situation){

            include('connexion.php');
            $result = $conn->prepare("UPDATE Client SET nom=:val1, prenom=:val2, adresse=:val3, mail=:val4, numtel=:val5, situation=:val6 WHERE idClient=:val7");
            $result->execute(array(
                ':val1' => $nom,
                ':val2' => $prenom,
                ':val3' => $adresse,
                ':val4' => $mail,
                ':val5' => $numtel,
                ':val6' => $situation,
                ':val7' => $id
            ));
            return true;
        }

        public function get_clients_of_conseiller($idconseiller){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Client WHERE idEmploye=:val1");
            $result->execute(array(':val1'=>$idconseiller));
            $table=$result->fetchAll();
            return $table;
        }

        public function ajouter_contrat_client($date, $tarifMens, $idClient, $idContrat){
            include('connexion.php');
            $result = $conn->prepare(
                "INSERT INTO `ContratClient`( `dateContrat`, `tarifMensuel`, `idClient`, `idContrat`) 
                VALUES (?,?,?,?)
            ");
            $result->execute(array($date, $tarifMens, $idClient, $idContrat));
            return true;
        }

        public function ajouter_compte_client($date, $solde, $montant, $idCompte, $idClient){
            include('connexion.php');
            $result = $conn->prepare(
                "INSERT INTO `CompteClient`( `dateOuverture`, `solde`, `montantDecouvert`, `idCompte`, `idclient`) 
                VALUES (?,?,?,?,?)
            ");
            $result->execute(array($date, $solde, $montant, $idCompte, $idClient));
            return true;
        }
  
    }

?>