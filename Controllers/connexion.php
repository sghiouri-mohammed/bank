<?php 
    $servername='localhost';
    $dbname='bank';
    $user='root';
    $password='';

    try 
    {
        $conn=new PDO("mysql:host=$servername;dbname=$dbname",$user,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);   
    } 
    catch (PDOException $error)
    {
        
    }
?>