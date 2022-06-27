<?php
session_start();
require "header.php";
echo "Bienvenue  ". $_SESSION['PRENOM']. $_SESSION['PRENOM']; 

?>

<body>
    <p>
    Vous pouvez utiliser nos différentes services. <a href="effectuerTransfer.php">ENVOYER ARGENT</a> et <a href="retrait.php">RETRAIT</a>
    </p>
   
</body>

<?php
    require "footer.php";
?>