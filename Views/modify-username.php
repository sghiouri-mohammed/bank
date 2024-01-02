<?php    
    include('../Controllers/connexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title> Banque</title>
</head>
    <body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center">Modifier username Employe</h3>
                            <form method="POST">
                                <div class="form-group">
                                    <label>Login</label>
                                    <input type="text" class="form-control" name="username" placeholder="Enter new login" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </form>
                        </div>
                        <?php
                            include("../Controllers/employeController.php");
                            $emp_cntr = new employeController();
                            
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                $use = $_POST['username'];
                                $agents = $emp_cntr->modify_agent_conseiller_login($_GET["idEmp"],$use);
                                if ($_GET["idCateg"] == 0){
                                    header("location:list-agents.php");

                                }elseif ($_GET["idCateg"] == 1){
                                    header("location:list-conseillers.php");
                                }
                                
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
