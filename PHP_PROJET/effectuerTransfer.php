<?php
session_start();
require "header.php";
//require "connect.php";

//Connection avec la base 
 $bdd = new PDO('mysql:host=localhost;dbname=gestion-transfert;','root','');

 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <script defer src="fontawesome/js/all.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="style.css">
    <title>INDEX</title>
</head>
<body>

       <form action="AjouTransfert.php" method="POST" align = "center" style="background-color:  #1F487C;">
          <div class="formulaire">
                   <h3>EFFECTUER UN TRANSFERT </h3>
           
            
           <p>
                
                  <input type="text" name="MONTANT_TRANSFERT" placeholder="MONTANT" > 
           </p>


           <p>
          
                   <input type="text" name="EMMETEUR" placeholder="EMMETEUR" >
           </p>


           <p>
                 <input type="text" name="RECEPTEUR" placeholder="RECPTEUR" >
           </p>


           <p>
                  <input type="text" name="FRAIS_TRANSFERT" placeholder="FRAIS" >
           </p>


           <p>
                  <input type="text" name="CODE" placeholder="CODE DE RETRAIT" >
           </p>
           <p>
                  <input type="date" name="DATE_ENVOIE" placeholder="DATE" >
           </p>



           <p>
                <button type="submit" name="envoie">ENVOYER</button>
           </p>
         
           
           
           
           
       </form>
   </div>

  <?php

        //Les conditions a respecter sur le formulaire
if(isset($_POST['envoie']))
{
    if(!empty($_POST['MONTANT_TRANSFERT']) AND !empty($_POST['EMMETEUR']) AND !empty($_POST['EMMETEUR']) AND !empty($_POST['FRAIS_TRANSFERT']) && !empty($_POST['CODE']) && !empty($_POST['DATE_ENVOIE']) )
    {
        $MONTANT = htmlspecialchars($_POST['MONTANT_TRANSFERT']);
        $EMMETEUR = htmlspecialchars($_POST['EMMETEUR']);
        $RECEPTEUR = htmlspecialchars($_POST['RECEPTEUR']);
        $FRAIS_TRANSFERT = htmlspecialchars($_POST['FRAIS_TRANSFERT']);
        $DATE= htmlspecialchars($_POST['DATE_ENVOIE']);
        $CODE= htmlspecialchars($_POST['CODE']);
       
        
    


        
       

        // Inserer les informations dans le formulaire
        $inserer = $bdd->prepare("INSERT INTO transfert(MONTANT_TRANSFERT, EMMETEUR,  RECEPTEUR,FRAIS_TRANSFERT, CODE) VALUES ('$MONTANT','$EMMETEUR','$RECEPTEUR',' $FRAIS_TRANSFERT','$CODE','$FRAIS_TRANSFERT')");
        $inserer->execute(array($MONTANT, $EMMETEUR, $RECEPTEUR, $FRAIS_TRANSFERT, $CODE,$DATE));

        //Recupere les informations de l'utilisateur
        $recup = $bdd->prepare('SELECT * FROM transfert WHERE MONTANT_TRANSFERT = ? AND EMMETEUR = ? AND RECEPTEUR = ? AND FRAIS_TRANSFERT = ? AND  DATE_ENVOIE  = ? AND CODE = ? ');
        $recup->execute(array($MONTANT,$EMMETEUR,$RECEPTEUR, $FRAIS_TRANSFERT,$DATE,$CODE));
        if($recup->rowCount() >0)
        {
             //Declarer la sesseion
             $_SESSION['MONTANT_TRANSFERT'] = $MONTANT;
             $_SESSION['EMMETEUR'] = $EMMETEUR;
             $_SESSION['RECEPTEUR'] = $RECEPTEUR;
             $_SESSION['FRAIS_TRANSFERT'] = $FRAIS_TRANSFERT;
             $_SESSION['DATE_ENVOIE'] = $DATE;
             $_SESSION['CODE'] = $CODE;
             $_SESSION['ID_TRANSFER'] = $recup->fetch()['ID_TRANSFERT'];
           
           

             
        }
         //Afficher l'ID
         //echo $_SESSION['ID'];
         ('Location: inde.php');

      
    }
    else
    {
         ?> <div  style="color: red; text-align:center;"> <?php echo " Veuillez Renseigner touts les champs "; ?> </div>  <?php
         
    }
}






?>






<?php
    require "footer.php";
?>





   <script src="js/jquery.js"></script>
      <script src="js/bootstrap.js"></script>
</body>
</html>