<?php
    session_start();
    include('../Controllers/contratController.php');
    include('../Controllers/connexion.php');
    $contrat_controller = new contratController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title> Banque</title>
</head>
    <body class="">
        <?php
            include('nav.php');
        ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center">Ajouter Contrat</h3>
                            <form method="POST">
                                <div class="form-group">
                                    <label>Nom du Contrat</label>
                                    <input type="text" class="form-control" name="nom" placeholder="Enter the Contrat name ..." required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
                            </form>
                        </div>
                        <?php

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                $nom = $_POST['nom'];

                                if ($contrat_controller->ajouterContrat($nom)) {
                                    header('location: index.php');
                                } else {
                                    echo "Erreur d'ajout!";
                                }
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
