<?php
    include('../Controllers/loginEmploye.php');
    include('../Controllers/connexion.php');
    $employe_controller = new loginEmploye();
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
                            <h3 class="card-title text-center">Se connecter</h3>
                            <form method="POST">
                                <div class="form-group">
                                    <label>Login</label>
                                    <input type="text" class="form-control" name="username" placeholder="Enter your username" required>
                                </div>
                                    <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </form>
                        </div>
                        <?php
                        // Assuming you have form input for username and password
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                $username = $_POST['username'];
                                $password = $_POST['password'];

                                if ($employe_controller->authenticateUser($username, $password)) {
                                    header('location: index.php');
                                } else {
                                    echo "Invalid login credentials!";
                                }
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
