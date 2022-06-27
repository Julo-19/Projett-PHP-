<?php
require 'header.php';
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
    <link rel="stylesheet" href="style.cs">
    <title>INDEX</title>
</head>
<div class="container">
    <nav class="navbar navbar-light"  style="background-color:  #1F487C;">
    <span class="offset-md-5 navbar-brand mb-0 h1"><h1 style="color: #FFFF; ">COUPON</h1> </span> <a href="effectuerTransfer.php" >
    </nav>
  <div class="row">
    <div class="col-sm navbar-light bg-light">
    	<h3 style="color: #1F487C; font-weight:300;margin-top:30px;text-align:center"> Liste des transferts effectués</h3> <br>
    </div>
<?php
include ('connect.php');
$ID_TRANSFERT =$_GET['ID_TRANSFERT']; 
//$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
$req=mysqli_query($conn,"SELECT * FROM transfert WHERE ID_TRANSFERT = '".$ID_TRANSFERT ."' ORDER BY ID_TRANSFERT ");
?>
<table class="table table-striped table-bordered table-condensed">
<thead>
<tr>
<th class="header">DATE</th>
<th>EMMETEUR</th>
<th>RECEPTEUR</th>
<th>MONTANT</th>
<th>FRAIS</th>
</tr>
</thead>
<tbody>
<?php
foreach($req as $row){
	

?>
<tr>
<td> <?php echo $row['DATE_ENVOIE'];?></td>
<td> <?php echo $row['EMMETEUR'];?></td>
<td> <?php echo $row['RECEPTEUR'];?></td>
<td> <?php echo $row['MONTANT_TRANSFERT'];?> FCFA</td>
<td> <?php echo $row['FRAIS_TRANSFERT'];?></td>
</tr>
<?php }?>
</tbody>

</table>
<h6 style="color:  #1F487C; font-weight:200"> EFFECTUER UN TRANSFERT </h6></a>
</div>



<?php
    require "footer.php";
?>
</body>