<?php
 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gestion-transfert";


     //Create Connection
    $conn  = new mysqli($servername,$username,$password,$dbname);


      //Check connection
    if($conn -> connect_error)
    {
        die("Erreur de Connection");
    }
    else
    {
        echo "";
    }

?>