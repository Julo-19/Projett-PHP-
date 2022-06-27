<?php
   require ("connect.php");
   require ("header.php");
  
   $MONTANT = $_POST['MONTANT_TRANSFERT'];
   $EMMETEUR = $_POST['EMMETEUR'];
   $RECEPTEUR = $_POST['RECEPTEUR'];
   $FRAIS_TRANSFERT = $_POST['FRAIS_TRANSFERT'];
   $DATE = $_POST['DATE_ENVOIE'];
   $CODE = $_POST['CODE'];

    $sql = "INSERT INTO transfert (MONTANT_TRANSFERT, EMMETEUR , RECEPTEUR, FRAIS_TRANSFERT, DATE_ENVOIE, CODE)
    value('$MONTANT','$EMMETEUR','$RECEPTEUR',' $FRAIS_TRANSFERT',' $DATE ','$CODE')";

    if(mysqli_query($conn, $sql))
    {
        echo "Transfert reussi! <br>";
    }
    else
    {
        echo "ERREUR !" .mysqli_error($conn) ;
    }
?>

<a href="effectuerTransfer.php" style="font-weight:800">Effectuer à nouveau un transfert</a>

  <?php  require "footer.php";?>
?>