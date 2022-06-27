<?php
require "connect.php";
include "header.php";
?>


  <body>
    <h1 class="retrait">EFFECTUER UN RETRAIT</h1>
    <center>
    <form action="" method="POST">
       
            
                
  <input type="text" class="form-control" id="" aria-describedby="" name="recherche" placeholder="Entrer le code de retrait" style="width: 15%;">
                <button type="submit" class="btn btn-primary" name="submit" aria-placeholder="">ENVOYER</button>
            
        

    </form>
    </center>
    <table class="table">
  <thead>
    <tr>
    <th scope="col">CODE DE RETRAIT</th>
      <th scope="col" >DE </th>
      <th scope="col">Montant</th>
      <th scope="col">Frais</th>
      <th scope="col">Date</th>

    </tr>
  </thead>
  <tbody>

     <?php
    $con = new PDO("mysql: host=localhost; dbname=gestion-transfert",'root',);
    if (isset($_POST["submit"]))
    {
        $str = $_POST["recherche"];
        $sth = $con ->prepare("SELECT * FROM transfert WHERE CODE = '$str'");
        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth -> execute();
        if($row = $sth ->fetch())
        {
            ?>
            <tr>
            
            <td style="text-align: center;"><?php echo $row->CODE;?></td>
            <td><?php echo $row->EMMETEUR;?></td>
            <td><?php echo $row->MONTANT_TRANSFERT;?></td>
            <td><?php echo $row->FRAIS_TRANSFERT;?></td>
            <td><?php echo $row->DATE_ENVOIE;?></td>
          
            </td>
            <td>
            
            

          
            </td> 
            
        </tr>
        <?php
        }

            else
        {
            echo "code incorrect";
        }
        }
        ?>
  </tbody>
</table> 
<br> <br> <br>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


    <-- Button trigger modal -->


<!-- Modal -->

  
  </body>




  <?php
    require "footer.php";
?>
</html>