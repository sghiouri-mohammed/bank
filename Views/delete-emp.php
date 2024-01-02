<?php
    include("../Controllers/employeController.php");
    $emp_cntr = new employeController();
    $emp_cntr-> delete_employe($_GET["idEmp"]);
    
    if ($_GET["idCateg"] == 0){
        header("location:list-agents.php");

    }elseif ($_GET["idCateg"] == 1){
        header("location:list-conseillers.php");
    }

?>