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

        <?php
            if ($_SESSION['user_category'] == 2){
                include("../Controllers/clientController.php");
                $client_cntrl = new clientController();
                $clients = $client_cntrl->get_all_clients();

                print('
                    <section class="compte-directeur mx-5 mt-5">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id Client</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Adresse</th>
                                    <th scope="col">Mail</th>
                                    <th scope="col">Num Tel</th>
                                    <th scope="col">Situation</th>
                                    <th scope="col">#Id Conseiller</th>
                                </tr>
                            </thead>
                            <tbody>
                    ');
                    foreach ($clients as $client){
                        print('
                            <tr>
                                <th scope="row">'.$client["idClient"].'</th>
                                <td>
                                    '.$client["nom"].'
                                                                 
                                </td>
                                <td>
                                    '.$client["prenom"].'
                                                                 
                                </td>
                                <td>
                                    '.$client["adresse"].'
                                                                 
                                </td>
                                <td>
                                    '.$client["mail"].'
                                                                 
                                </td>
                                <td>
                                    '.$client["numtel"].'
                                                                 
                                </td>
                                <td>
                                    '.$client["situation"].'  
                                </td>

                                <td>
                                    '.$client["idEmploye"].' 
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

        <?php
            if ($_SESSION['user_category'] == 1){
                include("../Controllers/clientController.php");
                $client_cntrl = new clientController();
                $clients = $client_cntrl->get_clients_of_conseiller($_SESSION["user_id"]);

                print('
                    <section class="compte-directeur mx-5 mt-5">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id Client</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Adresse</th>
                                    <th scope="col">Mail</th>
                                    <th scope="col">Num Tel</th>
                                    <th scope="col">Situation</th>
                                    <th scope="col">Compte / Contrat</th>
                                </tr>
                            </thead>
                            <tbody>
                    ');
                    foreach ($clients as $client){
                        print('
                            <tr>
                                <th scope="row">'.$client["idClient"].'</th>
                                <td>
                                    '.$client["nom"].'
                                                                 
                                </td>
                                <td>
                                    '.$client["prenom"].'
                                                                 
                                </td>
                                <td>
                                    '.$client["adresse"].'
                                                                 
                                </td>
                                <td>
                                    '.$client["mail"].'
                                                                 
                                </td>
                                <td>
                                    '.$client["numtel"].'
                                                                 
                                </td>
                                <td>
                                    '.$client["situation"].'  
                                </td>
                                <td>
                                    <a href="vendre-contrat.php?idEmp='.$client['idEmploye'].'&idClient='.$client["idClient"].'">
                                        New Contrat
                                    </a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="ouvrir-compte-client.php?idEmp='.$client['idEmploye'].'&idClient='.$client["idClient"].'">
                                        New Compte
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

        <?php
            if ($_SESSION['user_category'] == 0){
                include("../Controllers/clientController.php");
                $client_cntrl = new clientController();
                $clients = $client_cntrl->get_all_clients();

                print('
                    <section class="compte-directeur mx-5 mt-5">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id Client</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Adresse</th>
                                    <th scope="col">Mail</th>
                                    <th scope="col">Num Tel</th>
                                    <th scope="col">Situation</th>
                                    <th scope="col">Synthèses Client</th>
                                    <th scope="col">Dépôt / Retrait </th>
                                </tr>
                            </thead>
                            <tbody>
                    ');
                    foreach ($clients as $client){
                        print('
                            <tr>
                                <th scope="row">'.$client["idClient"].'</th>
                                <td>
                                    '.$client["nom"].'
                                                                 
                                </td>
                                <td>
                                    '.$client["prenom"].'
                                                                 
                                </td>
                                <td>
                                    '.$client["adresse"].'
                                                                 
                                </td>
                                <td>
                                    '.$client["mail"].'
                                                                 
                                </td>
                                <td>
                                    '.$client["numtel"].'
                                                                 
                                </td>
                                <td>
                                    '.$client["situation"].'  
                                </td>
                                <td>
                                    <a href="synthese-client.php?idEmploye='.$client['idEmploye'].'&idClient='.$client["idClient"].'">
                                        Synthèse Client
                                    </a>
                                </td>
                                <td>
                                    <a href="depot.php?idClient='.$client["idClient"].'">
                                        Dépôt
                                    </a>
                                    /
                                    <a href="retrait.php?idClient='.$client["idClient"].'">
                                        Retrait
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
