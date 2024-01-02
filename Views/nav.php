<link rel="stylesheet" href="../assets/styles/nav.css">

<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
  <a class="navbar-brand" href="index.php"> 
    <?php echo $_SESSION['user_name']; ?>
    <br/>    
  </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <?php
            if( $_SESSION['user_category'] == 0 ){
              echo "Compte Agent";
            }
            if( $_SESSION['user_category'] == 1 ){
              echo "Compte Conseiller";
            }
            if( $_SESSION['user_category'] == 2 ){
              echo "Compte Directeur";
            }
          ?>
        </a>
      </li>
      
      <li class="nav-item active item-middle">
        <a class="nav-link" href="index.php">Page d'acceuil</a>
      </li>

      <?php
        if( $_SESSION['user_category'] == 2 ){
          print('
            <li class="nav-item active item-middle mx-1">
              <a class="nav-link" href="list-agents.php">Liste des Agents</a>
            </li>
            <li class="nav-item active mx-2">
              <a class="nav-link" href="list-conseillers.php">Liste des Conseillers</a>
            </li>
            <li class="nav-item active mx-2">
              <a class="nav-link" href="list-clients.php">Liste des Clients</a>
            </li>
            <li class="nav-item active mx-2">
              <a class="nav-link" href="list-rdv.php">Liste des Rendez-Vous </a>
            </li>
          ');
        }
      ?>

      <?php
        if( $_SESSION['user_category'] == 1 ){
          print('
            <li class="nav-item active item-middle mx-3">
              <a class="nav-link" href="nouveau-client.php">Nouveau Client</a>
            </li>
            <li class="nav-item active mx-3">
              <a class="nav-link" href="list-clients.php">Mes Clients</a>
            </li>
          ');
        }
      ?>

      <?php
        if( $_SESSION['user_category'] == 0 ){
          print('
            <li class="nav-item active item-middle mx-3">
              <a class="nav-link" href="list-clients.php">Synthèse Client</a>
            </li>
            <li class="nav-item active item-middle mx-3">
              <a class="nav-link" href="list-clients.php">Effectuer Dépot</a>
            </li>
            <li class="nav-item active item-middle mx-3">
              <a class="nav-link" href="list-clients.php">Effectuer Retrait</a>
            </li>
            <li class="nav-item active item-middle mx-3">
              <a class="nav-link" href="Ajouter-Planning.php">Planifier Rendez-vous</a>
            </li>
          ');
        }
      ?>
      
      <li class="nav-item active logout " style="position:absolute; right:20px;">
        <a class="nav-link" href="logout.php">
          <button class="btn btn-danger">
            Logout
          </button>
        </a>
      </li>
    </ul>
  </div>
</nav>