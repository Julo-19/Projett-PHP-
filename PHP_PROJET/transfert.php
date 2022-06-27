<?php
//include_once 'navbar.php';
require "connect.php";
require "header.php";


?>
<!DOCTYPE html>
<html lang="en">
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
<div class="container">
    <nav class="navbar navbar-light" style="background-color:  #1F487C;">
    <span class="offset-md-5 navbar-brand mb-0 h1"><h1 style="color: #FFFF; font-weight:600">HISTORIQUES</h1> </span> <a href="AjouTransfert.php" ><h4> AJOUTER UN TRANSFERT </h4></a>
    </nav>
  <div class="row">
    <div class="col-sm navbar-light bg-light">
      <h3 style="margin-top: 20px; color:#1F487C;text-align:center">Les derniers transferts effectués</h3></br>
    </div>
<?php
//include ('connect.php');
 
//$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
$sql=mysqli_query($conn,"SELECT * FROM transfert ORDER BY ID_TRANSFERT");
?>
<table class="table table-striped table-bordered table-condensed">
<thead>
<tr>
<th class="header">DATE</th>
<th>EMETTEUR</th>
<th>RECEPTEUR</th>
<th>MONTANT</th>
<th>FRAIS</th>
<th>CODE DE RETRAIT</th>

</tr>
</thead>
<tbody>
<?php
foreach($sql as $row){
	

?>
<tr>
<td> <?php echo $row['DATE_ENVOIE'];?></td>
<td> <?php echo $row['EMMETEUR'];?></td>
<td> <?php echo $row['RECEPTEUR'];?></td>
<td> <?php echo $row['MONTANT_TRANSFERT'];?></td>
<td> <?php echo $row['FRAIS_TRANSFERT'];?></td>
<td> <?php echo $row['CODE'];?></td>
<td> <a href = "transaction.php ?ID_TRANSFERT=<?php echo $row['ID_TRANSFERT']?>&PRENOM=<?php echo $row['EMMETEUR']?>" class="btn btn-success" style="background-color:  #1F487C;"><span class="glyphicon-eye-open"  ><i class="fad fa-eye"></i></span></td>
</tr>
<?php 
}?>
</tbody>

</table>
</div>




<?php
require "footer.php"; 
?>









</body>