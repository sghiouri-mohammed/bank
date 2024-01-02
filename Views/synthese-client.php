<?php
        session_start();
        include('../Controllers/clientController.php');
        include('../Controllers/employeController.php');
        include('../Controllers/compteController.php');
        include('../Controllers/contratController.php');
        $client_cntrl = new clientController();
        $employe_cntrl = new employeController();
        $compte_cntrl = new compteController();
        $contrat_cntrl = new contratController();
        $client = $client_cntrl->get_client($_GET["idClient"]);
        foreach ($client as $col){
            $nomclient = $col['nom'];
            $prenomclient = $col['prenom'];
            $adresseclient = $col['adresse'];
            $mail = $col['mail'];
            $num = $col['numtel'];
            $situation = $col['situation'];
        }

        $employe = $employe_cntrl->get_employe($_GET['idEmploye']);
        foreach ($employe as $col1){
            $nomEmp = $col1['nom'];
        }
 

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Synthèse Client</title>
</head>
<body>
    <?php
        include('nav.php');
    ?>
    <section style="background-color: #eee;">
        <div class="container py-5">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                        <img src="data:image/png;base64,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" alt="avatar"
                            class="rounded-circle img-fluid my-2" style="width: 150px;">
                            <p class="text-muted mb-1">Nom Prénom</p>
                            <h5 class="my-3">
                                <?php echo $nomclient, "&nbsp;",  $prenomclient ?> 
                                <?php
                                    print('
                                        <a href="modifier-client.php?idClient='.$_GET["idClient"].'&nom='.$nomclient.'&prenom='.$prenomclient.'&adresse='.$adresseclient.'&mail='.$mail.'&numtel='.$num.'&situation='.$situation.'"> 
                                            <img width="24" height="24" src="https://img.icons8.com/external-others-amoghdesign/24/external-modify-multimedia-flat-30px-others-amoghdesign.png" alt="external-modify-multimedia-flat-30px-others-amoghdesign"/>
                                        </a>
                                    ');
                                ?>
                                
                            </h5> 
                            <p class="text-muted mb-4"><?php echo $situation ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $nomclient, "&nbsp;",  $prenomclient ?></p>
                                </div>
                            </div>
                                <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $mail ?></p>
                                </div>
                            </div>
                                <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $num ?></p>
                                </div>
                            </div>
                                <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Adresse</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $adresseclient ?></p>
                                </div>
                            </div>
                                <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Situation</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $situation ?></p>
                                </div>
                            </div>
                                <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Ses Comptes</p>
                                </div>
                                
                                <div class="col-sm-3">
                                    <p class="text-muted mb-0">Date ouverture</p>
                                </div>
                                <div class="col-sm-3">
                                    <p class="text-muted mb-0">Montant decouvert</p>
                                </div>
                                <div class="col-sm-3">
                                    <p class="text-muted mb-0">Solde</p>
                                </div>
                            </div>

                            <br>

                            <?php 
                                $compte_client = $compte_cntrl->get_compte_of_client($_GET["idClient"]);

                                foreach ($compte_client as $col2){
                                    $dateOuverture = $col2['dateOuverture'];
                                    $solde = $col2['solde'];
                                    $montantDecouvert = $col2['montantDecouvert'];
                                    $idCompte = $col2['idCompte'];

                                    print('
                                        <div class="row">
                                            <div class="col-sm-3">
                                                ');
                                                $compte_info = $compte_cntrl->get_compte($col2['idCompte']);
                                                foreach ($compte_info as $col3){
                                                    $pieces_a_fournir = $col3['pieces_a_fournir'];
                                                    print('<p class="mb-0">'.$col3['type_compte'].' </p>');
                                                }
                                    print('
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <p class="text-muted mb-0">'.$col2['dateOuverture'].'</p>
                                            </div>

                                            <div class="col-sm-3">
                                                <p class="text-muted mb-0">'.$col2['montantDecouvert'].' €</p>
                                            </div>

                                            <div class="col-sm-3">
                                                <p class="text-muted mb-0">'.$col2['solde'].' €</p>
                                            </div>
                                        </div>
                                        <br/>
                                    ');
                                }
                                    
                            ?>
                            
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Ses Contrats</p>
                                </div>
                                
                                <div class="col-sm-3">
                                    <p class="text-muted mb-0">Date du Contrat</p>
                                </div>
                                <div class="col-sm-3">
                                    <p class="text-muted mb-0">Tarif Mensuel</p>
                                </div>
                            </div>

                            <br>


                            <?php 
                                $contrat_client = $contrat_cntrl->get_contrat_client($_GET["idClient"]);

                                foreach ($contrat_client as $col4){
                                    $dateContrat = $col4['dateContrat'];
                                    $tarifMensuel = $col4['tarifMensuel'];

                                    print('
                                        <div class="row">
                                            <div class="col-sm-3">
                                                ');
                                                $contrat = $contrat_cntrl->get_contrat($col4['idContrat']);
                                                foreach ($contrat as $col5){
                                                    print('<p class="mb-0">'.$col5["nomContrat"].'</p>');
                                                }

                                                
                                    print('
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <p class="text-muted mb-0">'.$col4['dateContrat'].'</p>
                                            </div>

                                            <div class="col-sm-3">
                                                <p class="text-muted mb-0">'.$col4['tarifMensuel'].'€</p>
                                            </div>
                                        </div>
                                        <br/>
                                    ');
                                }      
                            ?>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Conseiller</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $nomEmp ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

</body>
</html>