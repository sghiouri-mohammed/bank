
<?php
session_start();




class loginEmploye{
    

    // Function to authenticate user
    public function authenticateUser($username, $pwd) {

        include('connexion.php');

        $result = $conn->prepare("SELECT * FROM Employe WHERE username=:val1 AND mdp=:val2");
        $result->execute(array(':val1' => $username, ':val2' => $pwd));
        $table=$result->fetchAll();

        $longeur=count($table);

        if ( $longeur > 0 ) {
            foreach ($table as $row){
                $_SESSION['user_id'] = $row['idEmploye'];
                $_SESSION['user_name'] = $row['nom'];
                $_SESSION['user_category'] = $row['idCategorie'];
            }
        
            return true;
        } else {
            return false;
        }

    }


}


?>
