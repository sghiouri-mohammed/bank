<?php

    session_start();
    include('../Controllers/connexion.php');

    include('../Controllers/rdvController.php');
    include('../Controllers/clientController.php');
    include('../Controllers/employeController.php');
    
    $rdv_controller = new rdvController();
    $client_controller = new clientController();
    $employe_controller = new employeController();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title> Banque</title>
</head>
<style>
    .success-message{
        color:green;
        padding:3px;
    }
</style>

    <body>

        <?php
            include('nav.php');
        ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center">Plannifier Rendez-Vous Client avec Conseiller</h3>
                            <form method="post">
                                <div class="form-group">
                                    <label for="motifRdv">Motif du Rdv</label>
                                    <input type="text" class="form-control" id="motifRdv" name="motifRdv" required>
                                </div>
                                <div class="form-group">
                                    <label for="nomEmploye">Choisir Client</label>
                                    <select class="form-control" name="idClient">
                                        <option>Selectionner le Client</option>
                                        <?php
                                            
                                            $clients = $client_controller->get_all_clients();
                                            
                                            foreach($clients as $client){
                                                print('
                                                    <option value='.$client["idClient"].'> Id: '.$client["idClient"].' -- Nom Client: '.$client["nom"].''.$client["prenom"].' </option>
                                                ');
                                            }
                                        ?> 
                                    </select>                                
                                </div>
                                <div class="form-group">
                                    <label for="listPiece">Liste des Pièces à Apporter</label>
                                    <input type="text" class="form-control" name="listpiece" id="">
                                </div>
                                <div class="form-group">
                                    <label for="dateRdv">Date du Rdv</label>
                                    <input type="date" class="form-control" id="dateRdv" name="dateRdv" required>
                                </div>
                                <div class="form-group">
                                    <label for="timeRdv">Heure du Rdv</label>
                                    <input type="time" class="form-control" id="timeRdv" name="timeRdv" required>
                                </div>
                                <div class="form-group">
                                    <label for="nomEmploye">Choisir Employé</label>
                                    <select class="form-control" name="idEmploye">
                                        <option>Selectionner le conseiller</option>
                                        <?php
                                            
                                            $employes = $employe_controller->get_all_employers();
                                            
                                            foreach($employes as $employe){
                                                print('
                                                    <option value='.$employe["idEmploye"].'> Id: '.$employe["idEmploye"].' -- Nom Conseiller: '.$employe["nom"].'</option>
                                                ');
                                            }
                                        ?> 
                                    </select>                                
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary"></input> 
                                </div>
                            </form>
                            <?php
                            // Assuming you have form input for username and password
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                    $motifRdv = $_POST["motifRdv"];
                                    
                                    $idClient = $_POST["idClient"];

                                    $list_client = $client_controller->get_client($idClient);

                                    foreach ($list_client as $row){
                                        $nomClient = $row["nom"];
                                        $prenomClient = $row["prenom"];
                                    }
                                    
                                    $listPiece = $_POST["listpiece"];
                                    $idEmploye = $_POST["idEmploye"];

                                    $list_employe = $employe_controller->get_employe($idEmploye);

                                    foreach ($list_employe as $row){
                                        $nomEmploye = $row["nom"];
                                    }
                                    

                                    $dateRdv = $_POST["dateRdv"];
                                    $timeRdv = $_POST["timeRdv"];

                                    if ($rdv_controller->ajoutre_rdv($motifRdv, $nomClient, $prenomClient, $idClient, $listPiece, $nomEmploye, $idEmploye, $dateRdv, $timeRdv)) {
                                        echo " <p class='success-message'> Plannification avec success </p>"; 
                                    } else {
                                        echo " <p> Erreur !! Veuillez ressayer </p>";
                                    }
                                } 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br><br><br><br><br>

        <?php
            include('footer.php');
        ?>
    </body>
</html>