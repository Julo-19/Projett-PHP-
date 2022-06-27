<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=gestion-transfert','root','');

if(isset($_POST['envoie']))
{
    //Verifions si les deux champs ne sont pas vides.
    if(!empty ($_POST['EMAIL']) AND !empty($_POST['MDP']))
    {
        $EMAIL = htmlspecialchars($_POST['EMAIL']);
        $MDP = sha1($_POST['MDP']);

        //Reuperer tous les utilisateurs
        $recup = $bdd->prepare('SELECT * FROM users WHERE EMAIL = ? AND MDP = ?');
        $recup->execute(array($EMAIL,$MDP));

        //Verifier si l'utilisateur existe
        if($recup->rowCount() > 0)
        {
            $_SESSION['$EMAIL'] = $EMAIL;
            $_SESSION['MDP'] = $MDP;
            $_SESSION['ID'] = $recup->fetch()['ID'];

           header('Location: pageUser.php');
        }
        else
        {
            echo "Email ou Mot de passe incorrect";
        }
    }
    else
    {
        echo "Veuillez completer les champs"; 
    }
}






//header('Location: inde.php');
?>


    <?php
   require "header.php";
    {
        ?>

<div class="connexion"  style="background-color:  #1F487C;">
       
       <form action="" method="POST" style="margin-bottom: 70px;margin-top: 50px;" >
              <h5>SE CONNECTER</h5>
           
           <p>
          
                  <input type="text" name="EMAIL" placeholder="EMAIL" autocomplete="off">
           </p>


           <p>
           
                  <input type="password" name="MDP" placeholder="Mot de Passe" autocomplete="off">
           </p>


           <p class="text"> Vous n'avez pas encore de compte <a href="inscriptions.php"><span style=" color: #1F487C; font-weight:800"> crée</span></a></p>


           <div align = "center"> 
            <button type="submit" name="envoie">ENVOYER</button>
           </div>
         
           
           
          
           
       </form>
   </div>
   

        <?php
    }



    ?>

  





































<?php require "footer.php";?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</body>
</html>