<?php
session_start();
require "header.php";

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

       <form action="" method="POST" align = "center"  style="background-color:  #1F487C;">
          <div class="formulaire">
                   <h1>INSCRIPTION </h1>
           
            
           <p>
                
                  <input type="text" name="NOM" placeholder="NOM" > 
           </p>


           <p>
          
                   <input type="text" name="PRENOM" placeholder="PRENOM" >
           </p>


           <p>
                 <input type="number" name="TEL" placeholder="TEL" >
           </p>


           <p>
                  <input type="text" name="EMAIL" placeholder="EMAIL" >
           </p>


           <p>
                  <input type="password" name="MDP" placeholder="MDP" >
           </p>



           <p>
               <button type="submit" name="envoie" value="INSCRIRE" > INSCRIRE </button>
           </p>
         
           
           
           
           
       </form>
   </div>

  <?php

        //Les conditions a respecter sur le formulaire
if(isset($_POST['envoie']))
{
    if(!empty($_POST['NOM']) AND !empty($_POST['PRENOM']) AND !empty($_POST['TEL']) && !empty($_POST['EMAIL']) AND !empty($_POST['MDP']))
    {
        $NOM = htmlspecialchars($_POST['NOM']);
        $PRENOM = htmlspecialchars($_POST['PRENOM']);
        $TEL = htmlspecialchars($_POST['TEL']);
        $EMAIL = htmlspecialchars($_POST['EMAIL']);
        
    


        //Crypter le Mot de Passe
        $MDP = sha1($_POST['MDP']);

        // Inserer les informations dans le formulaire
        $inserer = $bdd->prepare("INSERT INTO users(NOM, PRENOM, TEL, EMAIL, MDP) VALUES ('$NOM','$PRENOM','$TEL','$EMAIL','$MDP')");
        $inserer->execute(array($NOM, $PRENOM, $TEL, $EMAIL, $MDP));

        //Recupere les informations de l'utilisateur
        $recup = $bdd->prepare('SELECT * FROM users WHERE NOM = ? AND PRENOM = ? AND TEL = ? AND EMAIL = ? AND MDP = ?');
        $recup->execute(array($NOM,$PRENOM,$TEL,$EMAIL,$MDP));
        if($recup->rowCount() >0)
        {
             //Declarer la sesseion
             $_SESSION['NOM'] = $NOM;
             $_SESSION['PRENOM'] = $PRENOM;
             $_SESSION['TEL'] = $NOM;
             $_SESSION['EMAIL'] = $EMAIL;
             $_SESSION['MDP'] = $MDP;
             $_SESSION['ID'] = $recup->fetch()['ID'];

             
        }
         //Afficher l'ID
         //echo $_SESSION['ID'];
         ('Location: inde.php');

      
    }
    else
    {
         ?> <h3  style="color: red; text-align:center;"> <?php echo " Veuillez Renseigner touts les champs "; ?> </h3>  <?php
         
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