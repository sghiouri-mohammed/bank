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
                            <h3 class="card-title text-center">Vendre Contrat</h3>
                            <form method="post">

                                <div class="form-group">
                                    <label for="dateContrat">Date Contrat:</label>
                                    <input type="date" class="form-control" id="dateContrat" name="dateContrat" required>
                                </div>

                                <div class="form-group">
                                    <label for="tarifMensuel">Tarif Mensuel:</label>
                                    <input type="text" class="form-control" id="tarifMensuel" name="tarifMensuel" required>
                                </div>

                                <div class="form-group">
                                    <label for="idContrat">Contrat:</label>
                                    <select class="form-control" name="idContrat">
                                        <?php
                                            $contrats = $contrat_controller->get_all_contrats();
                                            foreach($contrats as $contrat){
                                                print('
                                                    <option value='.$contrat["idContrat"].'>'.$contrat["nomContrat"].'</option>
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
                                $date = $_POST['dateContrat'];

                                echo $date;

                                $tarifMens = $_POST['tarifMensuel'];
                                $contrat = $_POST['idContrat'];
           
                                $result = $client_cntrl->ajouter_contrat_client($date, $tarifMens, $_GET["idClient"], $contrat);
                            
                                if ($result) {
                                    // Success: Redirect or show a success message
                                    //header('Location: success.php');
                                    echo " <p class='success-message'> Contrat Vendue avec success </p>"; 
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
