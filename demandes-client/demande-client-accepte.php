<?php 

include '../login-auth/config.php';

error_reporting(0);

session_start();

$idp=$_SESSION['idp'];
$idc=$_SESSION['idc'];





$sql = "SELECT * FROM accepted where idclient='$idc' order by idaccepted desc ";
$result = mysqli_query($conn, $sql);




if(isset($_POST['submit'])){

  $_SESSION['idp2']=$_POST['idp2'];
  $_SESSION['idaccepted']=$_POST['idaccepted'];

  header("Location:../evaluation/evaluation.php");
}

if(isset($_POST['submit2'])){

  $_SESSION['idp2']=$_POST['idp2'];
  $_SESSION['idaccepted']=$_POST['idaccepted'];
  
 /* $idpp=$_POST['idaccepted'];
  $dated=$_POST['dated'];
  $datef=$_POST['datef'];
  $prix=$_POST['prix'];
  $heure=$_POST['heure'];
  $totalttc=$_POST['totalttc'];
  $idclient=$_POST['idclient'];
  $idprest=$_POST['idprest'];


  $sql4="INSERT INTO  acceptedfinal ( dated ,  datef ,  heure ,  prix ,  totalttc ,  idclient ,  idprest ) VALUES ('$dated','$datef','$heure','$prix','$totalttc','$idclient','$idprest')";
  $result4 = mysqli_query($conn, $sql4);


 // $idpp=$_POST['idaccepted'];
  $sql3 = "DELETE FROM accepted where idaccepted='$idpp' ";
  $result3 = mysqli_query($conn, $sql3);*/


  header("Location:../bilan2/bilan2.php");

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



    <!-- /flip-card-container -->



<?php while($row=$result->fetch_assoc()) 
{$idp2=$row['idprest'];
  $sql2 = "SELECT * FROM prestateur where idp='$idp2'";
  $result2 = mysqli_query($conn, $sql2);
  $row2=$result2->fetch_assoc();



  

  $dated=$row2['dated'];
  $datef=$row2['datef'];
  $heure=$row2['heure'];
  $totalttc=$rows2['totalttc'];


  $idcommande=$row['idaccepted'];

  $sql3 = "SELECT * FROM evaluation where idcommande='$idcommande'  ";
  $result3 = mysqli_query($conn, $sql3);
  $row3=$result3->fetch_assoc();
  
?>
<form action="" method="POST">
<div class="flip-card-container" style="--hue: 220">
  <div class="flip-card">

    <div class="card-front">
      <figure>
        
        <div class="img-bg"></div><span></span>
       
        <figcaption>Commande n : <?php echo $row['idaccepted'];?></figcaption>
        
      </figure>

      <ul>


      <input type="text"  value="<?php echo $row['idaccepted'];?>" name="idaccepted" hidden>
      <input type="text"  value="<?php echo $row['dated'];?>" name="dated" hidden>
      <input type="text"  value="<?php echo $row['datef'];?>" name="datef" hidden>
      <input type="text"  value="<?php echo $row['heure'];?>" name="heure" hidden>
      <input type="text"  value="<?php echo $row['prix'];?>" name="prix" hidden>
      <input type="text"  value="<?php echo $row['totalttc'];?>" name="totalttc" hidden>
      <input type="text"  value="<?php echo $row['idclient'];?>" name="idclient" hidden>
      <input type="text"  value="<?php echo $row['idprest'];?>" name="idprest" hidden>

      <input type="text" value="<?php echo ($row2['idp']);?>" name="idp2" hidden>

        <li>Nom prestateur : <strong><?php echo strtoupper($row2['nomp'])." ".strtoupper($row2['prenomp']);?></strong></li>
        <li>Service : <strong><?php echo strtoupper($row2['servicep']);?></strong></li>
        <li>Date : du  <strong><?php echo $row['dated'];?> au <?php echo $row['datef'];?></strong></li>
        <li>Nombre d'heure par jour :<strong><?php echo $row['heure'];?>H</strong></li>
        <li>Total ttc : <strong><?php echo $row['totalttc'];?> MAD</strong></li>
        <li > <strong> ACCEPTÉE </strong></li>
        
      </ul>
    </div>

    <div class="card-back">
      <figure>
        <div class="img-bg"></div>
       
      </figure>

      <?php if(!$row3['id']){?>
      <button type="submit" name="submit" >Evaluer</button><?php }else{echo "";}?>
      <button type="submit" name="submit2">Imprimer le reçu</button>

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

<div id="divb">
<a href="../logged1-services/s-services.php" id="a1"><button class="button-29">Retour</button></a>
<a href="demande-client.php" id="a1"><button class="button-29">Demandes en attente</button></a>
</div>
</body>
</html>