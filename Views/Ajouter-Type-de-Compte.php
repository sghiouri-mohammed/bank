<?php
    session_start();
    include('../Controllers/compteController.php');
    include('../Controllers/connexion.php');
    $compte_controller = new compteController();
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
                            <h3 class="card-title text-center">Ajouter Compte</h3>
                            <form method="POST">
                                <div class="form-group">
                                    <label>Type du Compte</label>
                                    <input type="text" class="form-control" name="nom" placeholder="Enter the Type" required>
                                </div>
                                    <div class="form-group">
                                    <label>Pieces à fournir</label>
                                    <input type="text" name="piece" class="form-control" placeholder="Pieces a fournir ..." required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
                            </form>
                        </div>
                        <?php

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                $type = $_POST['nom'];
                                $pieces = $_POST['piece'];

                                if ($compte_controller->ajouterCompte($type, $pieces)) {
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
