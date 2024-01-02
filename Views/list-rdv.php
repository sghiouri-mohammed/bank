<?php
    session_start();
    error_reporting(0);
    ini_set('display_errors', 0);  
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
            if ($_SESSION['user_category'] == 2 ){
                include("../Controllers/rdvController.php");
                $rdv_cntrl = new rdvController();

                print('
                    <section class="compte-directeur mx-5 mt-5">
                        <h3> Chercher Rendez-vous entre deux dates : </h3>
                        <br/>
                        <form method="GET">
                            <div class="row m-auto container-fluid">
                                <div class="col-md-3">
                                    <input type="date" name="date1" class="form-control" placeholder="Première date ">
                                </div>
                                and
                                <div class="col-md-3">
                                    <input type="date" name="date2" class="form-control" placeholder="Deuxième date">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-primary" value="Chercher"/>
                                </div>
                            </div>
                        </form>
                        <br/>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id Rdv</th>
                                    <th scope="col">#Id Client</th>
                                    <th scope="col">Nom Prenom Client</th>
                                    <th scope="col">List des Pieces</th>
                                    <th scope="col">#Id Employe</th>
                                    <th scope="col">Nom Employe</th>
                                    <th scope="col">Date du Rdv</th>
                                    <th scope="col">Time du Rdv</th>
                                </tr>
                            </thead>
                            <tbody>
                    ');
                        
                        if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
                            
                            $rdvs = $rdv_cntrl->get_rdv_between_two_dates($_GET["date1"],$_GET["date2"]);
                            
                            foreach ($rdvs as $rdv){
                            print('
                                <tr>
                                    <th scope="row">'.$rdv["idRdv"].'</th>
                                    <td>
                                        '.$rdv["idClient"].'
                                                                    
                                    </td>
                                    <td>
                                        '.$rdv["nomClient"].' '.$rdv["prenomClient"].'
                                                                    
                                    </td>
                                    <td>
                                        '.$rdv["listPiece"].'
                                                                    
                                    </td>
                                    <td>
                                        '.$rdv["idEmploye"].'
                                                                    
                                    </td>
                                    <td>
                                        '.$rdv["nomEmploye"].'
                                                                    
                                    </td>
                                    <td>
                                        '.$rdv["dateRdv"].'  
                                    </td>
                                    <td>
                                        '.$rdv["timeRdv"].'  
                                    </td>  
                                ');
                            }
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
