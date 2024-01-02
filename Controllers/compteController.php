<?php
    class compteController{
        
        public function ajouterCompte($type, $pieces){
            include('connexion.php');
            $result = $conn->prepare("INSERT INTO `Compte`(`type_compte`, `pieces_a_fournir`) VALUES (?,?)");
            $result->execute(array($type, $pieces));
            return true;
        }

        public function deleteCompte($id){
            include('connexion.php');
            $result = $conn->prepare("DELETE FROM Compte WHERE idCompte=:val1");
            $result->execute(array(':val1'=>$id));
        }

        public function updateCompte($id, $type, $pieces){
            include('connexion.php');
            $result = $conn->prepare("UPDATE Compte SET type_compte=:val1, pieces_a_fournir=:val2  WHERE idCompte=:val3");
            $result->execute(array(':val1'=>$type, ':val2'=>$pieces, ':val3'=>$id ));
        }

        public function get_all_comptes(){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Compte");
            $result->execute();
            $table=$result->fetchAll();
            return $table;
        }

        public function get_compte_of_client($id){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Compteclient WHERE idClient = :val1");
            $result->execute(array(':val1'=> $id));
            $table=$result->fetchAll();
            return $table;
        }

        public function get_one_compte_of_client($id){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Compteclient WHERE idCompte = :val1");
            $result->execute(array(':val1'=> $id));
            $table=$result->fetchAll();
            return $table;
        }

        public function get_compte($id){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Compte WHERE idCompte = :val1");
            $result->execute(array(':val1'=> $id));
            $table=$result->fetchAll();
            return $table;
        }

        public function update_solde_compte($idcompte, $nouveau_solde){
            include('connexion.php');
            $result = $conn->prepare("UPDATE CompteClient SET solde=:val1  WHERE idCompte=:val2");
            $result->execute(array(':val1'=>$nouveau_solde, ':val2'=>$idcompte));
        }



        

    }
?>
