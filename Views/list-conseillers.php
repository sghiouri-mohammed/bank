<?php
    session_start();
    if (isset($_SESSION['user_name'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title> Banque</title>
</head>
    <body>
        <?php
            include('nav.php');
        ?>

        <!-- Sesction Compte interface Directeur -->
        <?php
            if ($_SESSION['user_category'] == 2){
                include("../Controllers/employeController.php");
                $emp_cntr = new employeController();
                $agents = $emp_cntr->get_all_employers_par_categorie(1);

                print('
                    <section class="compte-directeur mx-5 mt-5">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id Agent</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Login</th>
                                    <th scope="col">mdp</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                    ');
                    foreach ($agents as $agent){
                        print('
                            <tr>
                                <th scope="row">'.$agent["idEmploye"].'</th>
                                <td>
                                    '.$agent["nom"].'
                                                                 
                                </td>
                                <td>
                                    '.$agent["username"].'
                                    <a href="modify-username.php?idEmp='.$agent['idEmploye'].'&idCateg='.$agent["idCategorie"].'">
                                        <img width="20" height="20" src="https://img.icons8.com/external-sbts2018-outline-color-sbts2018/58/external-modify-basic-ui-elements-2.5-sbts2018-outline-color-sbts2018.png" alt="external-modify-basic-ui-elements-2.5-sbts2018-outline-color-sbts2018"/>
                                    </a>   
                                </td>

                                <td>
                                    ******
                                    <a href="modify-password.php?idEmp='.$agent['idEmploye'].'&idCateg='.$agent["idCategorie"].'">
                                        <img width="20" height="20" src="https://img.icons8.com/external-sbts2018-outline-color-sbts2018/58/external-modify-basic-ui-elements-2.5-sbts2018-outline-color-sbts2018.png" alt="external-modify-basic-ui-elements-2.5-sbts2018-outline-color-sbts2018"/>
                                    </a>   
                                </td>
                                <td>
                                    <a href="delete-emp.php?idEmp='.$agent['idEmploye'].'&idCateg='.$agent["idCategorie"].'">
                                        <img width="30" height="30" src="https://img.icons8.com/fluency/48/filled-trash.png" alt="filled-trash"/></tr>
                                    </a>
                                </td>

                        ');
                    }
                
                    print('        
                            </tbody>
                        </table>
  
                    </section>   
                ');

               
            }
        ?>

    </body>
</html>

<?php 

}else{
    echo '<h1 style="padding:10px;"> Veuillez vous connectez pour acceder à la plateforme </h1>';

    print('
        <a href="login.php">
            <h1> Se connecter </h1>
        </a>
    ');
} 

?>
