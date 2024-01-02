<?php
    session_start();
    include('../Controllers/compteController.php');
    include('../Controllers/operationController.php');
    include('../Controllers/connexion.php');
    $compte_controller = new compteController();
    $operation_controller = new operationController();

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
    
    <body class="bg-light">
        <?php
            include('nav.php');
        ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center">Effectuer Retrait</h3>
                            <form method="POST">
                                <div class="form-group">
                                    <label>Id Client</label>
                                    <input class="form-control" value=<?php echo $_GET["idClient"]; ?> disabled>
                                </div>
                                <div class="form-group">
                                    <label>Id Compte Client</label>
                                    <select class="form-control" name="idCompte">
                                        <option selected>Selectionner le Id du compte pour l'opération</option>
                                        <?php
                                            $comptes = $compte_controller->get_compte_of_client($_GET["idClient"]);
                                            
                                            foreach($comptes as $compte){
                                                print('
                                                    <option value='.$compte["idCompte"].'> Id: '.$compte["idCompte"].' -- Solde: '.$compte["solde"].' €</option>
                                                ');
                                            }
                                        ?> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Montant de Retrait</label>
                                    <input type="text" name="montant" class="form-control" placeholder="Enter your password" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Retrait</button>
                            </form>
                        </div>
                        <?php
                        // Assuming you have form input for username and password
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                $idCompte = $_POST["idCompte"];
                                $montant = $_POST["montant"];

                                $compte_client = $compte_controller->get_one_compte_of_client($idCompte);
                                foreach ( $compte_client as $row ){
                                    $solde = $row["solde"];
                                }

                                if ($montant > $solde){
                                    echo " <p class='success-message'> Retrait Impossible !! <br> Solde Insuffisant !! </p>";
                                }else{
                                    $montant = $solde - $montant;
                                    if ($operation_controller->effectuer_operation_retrait($montant, 'Retrait', $_GET["idClient"], $idCompte)){
                                        $compte_controller->update_solde_compte($idCompte, $montant);
                                        echo " <p class='success-message'> Retrait avec success </p>"; 
                                    }
                                }
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
