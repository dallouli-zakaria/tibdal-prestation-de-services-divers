<?php 

include '../login-auth/config.php';

error_reporting(0);

session_start();

$idp=$_SESSION['idp'];
$idc=$_SESSION['idc'];

$sql = "SELECT * FROM prestateur where idp='$idp'";
$result = mysqli_query($conn, $sql);
$rows=$result->fetch_assoc();

$prix=$rows['prix'];



echo $idc." p".$idp;


if(isset($_POST['submit'])){


  $prix=$_POST['prix'];
  $dated=$_POST['dated'];
  $datef=$_POST['datef'];
  $heure=$_POST['heure'];
  $total=$_POST['total'];



  $sql = "INSERT INTO pending(dated, datef,prix ,heure, totalttc, idclient, idprest) VALUES ('$dated','$datef','$prix','$heure','$total','$idc','$idp')";
  $result = mysqli_query($conn, $sql);
  
  header("Location: ../bilan2/feed/index.html");



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bilan-client.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
</style>
    <title>Document</title>
</head>
<body>
<div class="all-c">
<div class="container">
  <div class="grid-7 element-animation">
    <!--card-1-->
    <div class="card color-card">
      <ul>
        <li><a href="../logged2-services/p-services.php"><i class="fas fa-arrow-left i-l w"></i></a></li>
      </ul>
  <form action="" method="post">        
      <img src="../<?php echo $rows['source'];?>" alt="profile-pic" class="profile">
      <h1 class="title"><?php echo  strtoupper($rows['nomp'])?> <?php echo strtoupper($rows['prenomp']);?></h1>
      <p>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"> </span><span id="prx">  PRIX : </span>
          <span value="<?php echo $prix;?>" id="prix" ><?php echo $prix;?></span><span id="prx"> DH/H</span>
          <input type="text" name="prix" value="<?php echo $prix;?>" hidden>
        </p>

    
      <p class="job-title">DATE DEBUT : <input type="date" id="datedebut" onchange=diffdate(); name="dated"> </p>
      <p class="job-title">DATE FIN : <input type="date" id="datefin" onchange=diffdate();  name="datef"></p>
      <p class="job-title">HEURE / JOURS : <input type="number"  onchange=diffdate(); id="total" min="1" max="8" name="heure" required></p>
      <p class="job-title">TOTAL TTC : <input type="text" id="co" name="total" readonly>DH</p>


      
      <button class="btn color-a top" type="submit" name="submit">Valider</button>
    
      <hr>
      <div class="container">
        <div class="content">
          <div class="grid-2">
            <button class="color-b circule"> <i class="">EXP</i></button>
            <h2 class="title">5</h2>
            <p class="followers">Annee d'experience</p>
          </div>
          <div class="grid-2">
            <button class="color-c circule"><i class="">NP</i></button>
            <h2 class="title"><?php echo $rows['nbrprestp'];?></h2>
            <p class="followers">Nombre de prestation</p>
          </div>
          <div class="grid-2">
            <button class="color-d circule"><i class="">SCR</i></button>
            <h2 class="title"><?php echo $rows['score'];?> PTS</h2>
            <p class="followers">Score</p>
          </div>
          </form>        
        </div>
      </div>
    </div>
  </div>
</div>


  <!--card-2-->

 

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
<script src="bilan.js"></script>



</body>
</html>

