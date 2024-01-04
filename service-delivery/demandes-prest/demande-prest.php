<?php 

include '../login-auth/config.php';

error_reporting(0);



session_start();
$_SESSION['connectee']="okp";
$idp=$_SESSION['idp'];

echo $idp;
echo $_SESSION['idc2'];

$sql = "SELECT * FROM pending where idprest='$idp' order by idpending desc ";
$result = mysqli_query($conn, $sql);


if(isset($_POST['submit'])){
    $idpen=$_POST['idpen'];
    $sql = "DELETE FROM pending where idpending='$idpen' and idprest='$idp' ";
    $result = mysqli_query($conn, $sql);

    header("Location:demande-prest.php");
}else if(isset($_POST['submit2'])){

    $idpen=$_POST['idpen'];
    $idc=$_POST['idc'];
    $dated=$_POST['dated'];
    $datef=$_POST['datef'];
    $prix=$_POST['prix'];
    $heure=$_POST['heure'];
    $totalttc=$_POST['totalttc'];
    

    $sql = "INSERT INTO accepted( dated,datef,heure,prix,totalttc,idclient,idprest) VALUES('$dated','$datef','$heure','$prix','$totalttc','$idc','$idp')";
    $result = mysqli_query($conn, $sql);


    $sql2 = "DELETE FROM pending where idpending='$idpen' and idprest='$idp' ";
    $result2 = mysqli_query($conn, $sql2);





    header("Location:demande-prest.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="demande-prest.css">
    <title>TIBDAL</title>
</head>
<body>
<a href="deconn.php">Deconnecter</a>
    <!-- flip-card-container -->
    <?php while($rows=$result->fetch_assoc()) 
{$idc=$rows['idclient'];
   
  $sql2 = "SELECT * FROM client where id='$idc'";
  $result2 = mysqli_query($conn, $sql2);
  $rows2=$result2->fetch_assoc();





  $idpending=$rows['idpending'];
  $nomc=$rows2['nomc'];
  $prenomc=$rows2['prenomc'];
  $dated=$rows['dated'];
  $datef=$rows['datef'];
  $prix=$rows['prix'];
  $heure=$rows['heure'];
  $totalttc=$rows['totalttc'];

?>

    <form action="" method="post">
<div class="flip-card-container" style="--hue: 220">
  <div class="flip-card">

    <div class="card-front">
      <figure>
        <div class="img-bg"></div>
       
        <figcaption>Commande n : <?php echo $idpending?></figcaption>
        <input type="text"  value="<?php echo $idpending?>" name="idpen" hidden>
      </figure>

      <ul>

      <input type="text"  value="<?php echo $idc?>" name="idc" hidden>
      <input type="text"  value="<?php echo $nomc?>" name="nomc" hidden>
      <input type="text"  value="<?php echo $prenomc?>" name="prenomc" hidden>
      <input type="text"  value="<?php echo $dated?>" name="dated" hidden>
      <input type="text"  value="<?php echo $datef?>" name="datef" hidden>
      <input type="text"  value="<?php echo $prix?>" name="prix" hidden>
      <input type="text"  value="<?php echo $heure?>" name="heure" hidden>
      <input type="text"  value="<?php echo $totalttc?>" name="totalttc" hidden>

        <li>Nom client : <?php echo strtoupper($nomc)." ".strtoupper($prenomc);?></li>
        <li>Du  <strong><?php echo $dated;?> au <?php echo $datef;?></strong></li>
        <li>Nombre d'heure par jour :<strong><?php echo $heure;?>H</strong></li>
        <li>Total ttc : <strong><?php echo $totalttc;?> MAD</strong></li>
        
      </ul>
    </div>

    <div class="card-back">
      <figure>
        <div class="img-bg"></div>
       
      </figure>

      <button type="submit" name="submit">Refuser</button>
      <button type="submit" name="submit2">Accepter</button>

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

<!-- /flip-card-container -->




</body>
</html>