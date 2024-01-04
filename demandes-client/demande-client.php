<?php 

include '../login-auth/config.php';

error_reporting(0);

session_start();

$idp=$_SESSION['idp'];
$idc=$_SESSION['idc'];



$sql = "SELECT * FROM pending where idclient='$idc' order by idpending desc";
$result = mysqli_query($conn, $sql);


if(isset($_POST['submit'])){




  $idpp=$_POST['idpending'];
  $sql3 = "DELETE FROM pending where idpending='$idpp' ";
  $result3 = mysqli_query($conn, $sql3);

  header("Location:demande-client.php");
  

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="demande-client.css">
    <title>TIBDAL</title>
</head>
<body>



    <!-- flip-card-container -->
    <?php 
    
    
    while($rows=$result->fetch_assoc()) 
    
{
  
  

  
  $idp2=$rows['idprest'];
  $sql2 = "SELECT * FROM prestateur where idp='$idp2'";
  $result2 = mysqli_query($conn, $sql2);
  $rows2=$result2->fetch_assoc();

  


?>


<form action="" method="post">
<div class="flip-card-container" style="--hue: 220">
  <div class="flip-card">

    <div class="card-front">
      <figure>
        
        <div class="img-bg"></div><span></span>
       

        
        <figcaption>Commande n : <?php echo $rows['idpending'];?></figcaption>
        
      </figure>

      <ul>


      
      <input type="text"  value="<?php echo $rows['idpending'];?>" name="idpending" hidden>


        <li>Nom prestateur : <strong><?php echo strtoupper($rows2['nomp'])." ".strtoupper($rows2['prenomp']);?></strong></li>
        <li>Service : <strong><?php echo strtoupper($rows2['servicep']);?></strong></li>
        <li>Du <strong><?php echo $rows['dated'];?> Au <?php echo $rows['datef'];?></strong></li>
        <li>Nombre d'heure par jour :<strong><?php echo $rows['heure'];?>H</strong></li>
        <li>Total ttc : <strong><?php echo $rows['totalttc'];?> MAD</strong></li>
        <li > <strong> EN ATTENTE </strong></li>
        
      </ul>
    </div>

    <div class="card-back">
      <figure>
        <div class="img-bg"></div>
       
      </figure>

      <button type="submit" name="submit">Supprimer</button>
      

      <div class="design-container">
        <span class="design design--1"></span>
        <span class="design design--2"></span>
        <span class="design design--3"></span>
        <span class="design design--4"></span>
        <span class="design design--5"></span>
        <span class="design design--6"></span>
        <span class="design design--7"></span>
        <span class="design design--8"></span>
      </div>
    </div>

  </div>
</div>
</form>
<?php }?>








<div id="divb"><a id="a1" href="../logged1-services/s-services.php"><button class="button-29">Retour</button></a> <a id="a1" href="demande-client-accepte.php"><button class="button-29">Demandes accepteé</button></a></div>


</body>
</html>