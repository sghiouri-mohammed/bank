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

        <!-- Sesction Compte interface Agent -->
        <?php
            if ($_SESSION['user_category'] == 0){
        ?>

            <section class="compte-agent">

            </section>

        <?php        
            }
        ?>

        <!-- Sesction Compte interface Conseiller -->
        <?php
            
            if ($_SESSION['user_category'] == 1){
        ?>

            <section class="section2 compte-conseiller mx-5 mt-5">
                <h1> Gestion de Mes clients  </h1>
                <div class="row my-5">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ajouter un nouveau client</h5>
                                <p class="card-text">  </p>
                                <a href="nouveau-client.php" class="btn btn-success">Ajouter</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ouvrir compte Client</h5>
                                <p class="card-text">  </p>
                                <a href="list-clients.php" class="btn btn-success">Ajouter</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Resilier un contrat</h5>
                                <p class="card-text">  </p>
                                <a href="Ajouter-Planning.php" class="btn btn-success">Ajouter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php        
            }
        ?>

        <!-- Sesction Compte interface Directeur -->
        <?php
            include('../Controllers/statistiquesController.php');
            $stats = new statistiqueContorller();
            if ($_SESSION['user_category'] == 2){
        ?>

            <section class="section1 compte-directeur mx-5 mt-5">
                <h1> Statistiques sur la banque </h1>
                <div class="row mt-5">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nombre d'Agents Actifs</h5>
                                <h1 class="card-text"><?php echo $stats->number_of_agents() ?></p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nombre de Conseillers Actifs</h5>
                                <h1 class="card-text"><?php echo $stats->number_of_conseillers() ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nombre de Clients Actifs</h5>
                                <h1 class="card-text"><?php echo $stats->number_of_clients() ?></p>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nombre de Contrats Clients</h5>
                                <h1 class="card-text"><?php echo $stats->number_of_contrat() ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nombre de Comptes Clients</h5>
                                <h1 class="card-text"><?php echo $stats->number_of_compte_client() ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nombre de Rendez-vous Aujourd'hui</h5>
                                <h1 class="card-text"><?php echo $stats->number_of_rdv() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section2 compte-directeur mx-5 mt-5">
                <h1> Gestion de la Banque  </h1>
                <div class="row my-5">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ajouter une Contrat</h5>
                                <p class="card-text">  </p>
                                <a href="ajouter-contrat.php" class="btn btn-success">Ajouter</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ajouter un type de Compte</h5>
                                <p class="card-text">  </p>
                                <a href="Ajouter-Type-de-Compte.php" class="btn btn-success">Ajouter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php        
            }
        ?>

        <br/><br/><br/><br/><br/><br/><br/>

        <?php
            include('footer.php');
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
