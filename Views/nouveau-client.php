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
<style>
    .success-message{
        color:green;
        padding:3px;
    }
</style>
    <body class="">
        <?php
            include('nav.php');
        ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center">Nouveau Client</h3>
                            <form method="post">
                                <div class="form-group">
                                    <label for="nom">Nom:</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>

                                <div class="form-group">
                                    <label for="prenom">Prenom:</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                                </div>

                                <div class="form-group">
                                    <label for="adresse">Adresse:</label>
                                    <input type="text" class="form-control" id="adresse" name="adresse" required>
                                </div>

                                <div class="form-group">
                                    <label for="mail">Mail:</label>
                                    <input type="email" class="form-control" id="mail" name="mail" required>
                                </div>

                                <div class="form-group">
                                    <label for="numtel">Numéro de Téléphone:</label>
                                    <input type="tel" class="form-control" id="numtel" name="numtel" required>
                                </div>

                                <div class="form-group">
                                    <label for="situation">Situation:</label>
                                    <input type="text" class="form-control" id="situation" name="situation" required>
                                </div>

                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                        <?php
                            include('../Controllers/clientController.php');
                            $client_cntrl = new clientController();
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            
                                // Retrieve form values
                                $nom = $_POST['nom'];
                                $prenom = $_POST['prenom'];
                                $adresse = $_POST['adresse'];
                                $mail = $_POST['mail'];
                                $numtel = $_POST['numtel'];
                                $situation = $_POST['situation'];
                                $conseiller = $_SESSION['user_id']; 
                                                        
                                $result = $client_cntrl->ajouter_client($nom, $prenom, $adresse, $mail, $numtel, $situation, $conseiller);
                            
                                if ($result) {
                                    // Success: Redirect or show a success message
                                    //header('Location: success.php');
                                    echo " <p class='success-message'> Client Ajouté avec success </p>"; 
                                } else {
                                    echo "Error inserting client.";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <br/><br/><br/><br/><br/><br/>
        <?php
            include('footer.php');
        ?>
    </body>
</html>
