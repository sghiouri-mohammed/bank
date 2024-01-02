<?php
    session_start();
    include('../Controllers/compteController.php');
    include('../Controllers/contratController.php');
    include('../Controllers/connexion.php');
    $compte_controller = new compteController();
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
<style>
    .success-message{
        color:green;
        padding:5px;
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
                            <h3 class="card-title text-center">Ouvrir compte client</h3>
                            <form method="post">

                                <div class="form-group">
                                    <label for="dateContrat">Id Client:</label>
                                    <input class="form-control" value=<?php echo $_GET["idClient"] ?> disabled>
                                </div>

                                <div class="form-group">
                                    <label for="dateContrat">Date Ouverture du compte:</label>
                                    <input type="date" class="form-control" id="dateContrat" name="dateCompte" required>
                                </div>

                                <div class="form-group">
                                    <label for="tarifMensuel">Solde:</label>
                                    <input type="text" class="form-control" id="tarifMensuel" name="solde" required>
                                </div>

                                <div class="form-group">
                                    <label for="tarifMensuel">Montant decouvert:</label>
                                    <input type="text" class="form-control" id="tarifMensuel" name="decouvert" required>
                                </div>

                                <div class="form-group">
                                    <label for="idContrat">Compte:</label>
                                    <select class="form-control" name="idCompte">
                                        <?php
                                            $comptes = $compte_controller->get_all_comptes();
                                            foreach($comptes as $compte){
                                                print('
                                                    <option value='.$compte["idCompte"].'>'.$compte["type_compte"].', Pièces à fournir : -- '.$compte["pieces_a_fournir"].'</option>
                                                ');
                                            }
                                        ?>
                                        
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <?php
                            include('../Controllers/clientController.php');
                            $client_cntrl = new clientController();
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            
                                // Retrieve form values
                                $date = $_POST['dateCompte'];
                                $solde = $_POST['solde'];
                                $montant = $_POST['decouvert'];
                                $idCompte = $_POST['idCompte'];
           
                                $result = $client_cntrl->ajouter_compte_client($date, $solde, $montant, $idCompte, $_GET["idClient"]);
                            
                                if ($result) {
                                    // Success: Redirect or show a success message
                                    //header('Location: success.php');
                                    echo " <p class='success-message'> Compte Crée avec success </p>"; 
                                } else {
                                    echo "Error inserting Compte.";
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
