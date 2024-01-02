<?php
    class employeController{

        public function get_all_employers(){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Employe");
            $result->execute();
            $table=$result->fetchAll();
            return $table;
        }

        public function get_all_employers_par_categorie($categ){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Employe WHERE idCategorie=:val1");
            $result->execute(array(':val1'=>$categ));
            $table=$result->fetchAll();
            return $table;
        }


        public function get_employe($id){
            include('connexion.php');
            $result = $conn->prepare("SELECT * FROM Employe WHERE idEmploye=:val1");
            $result->execute(array(':val1'=>$id));
            $table=$result->fetchAll();
            return $table;
        }

        public function delete_employe($id){
            include('connexion.php');
            $result = $conn->prepare("DELETE FROM Employe WHERE idEmploye=:val1");
            $result->execute(array(':val1'=>$id));
        }

        public function modify_agent_conseiller_login($id,$login){
            include('connexion.php');
            $result = $conn->prepare("UPDATE Employe SET username=:val1  WHERE idEmploye=:val2");
            $result->execute(array(':val1'=>$login, ':val2'=>$id ));
        }

        public function modify_agent_conseiller_password($id,$pwd){
            include('connexion.php');
            $result = $conn->prepare("UPDATE Employe SET mdp=:val1  WHERE idEmploye=:val2");
            $result->execute(array(':val1'=>$pwd, ':val2'=>$id ));
        }



        
    }

?>