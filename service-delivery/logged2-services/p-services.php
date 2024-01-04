<?php 

include '../login-auth/config.php';

error_reporting(0);

session_start();

$servicep=$_SESSION['profession'];
#echo $_SESSION['nomc'];
$villep=$_SESSION['villep'];


$sql = "SELECT * FROM prestateur where villep='$villep' and servicep='$servicep'";
$result = mysqli_query($conn, $sql);

if(isset($_POST['submit'])){
  $_SESSION['idp']=$_POST['radio'];
  header("Location: ../bilan/bilan-client.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="p-service-style.css">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
<ul class="cards">
<?php    

while($rows=$result->fetch_assoc()) 
{ 
?> 
  <li>
    <a href="" class="card">
      <img style="max-height:300px;max-width:400px;" src="../<?php echo $rows['source'];?>" class="card__image" alt="" />
      <div class="card__overlay">
        <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
          <img class="card__thumb" src="../<?php echo $rows['source'];?>" alt="" />

          <label class="container">
                <input type="radio"  name="radio" value="<?php echo $rows['idp']?>" checked="true">
                <span class="checkmark"></span>
              </label>
          <div class="card__header-text">
            <h3 class="card__title"><?php echo strtoupper($rows['nomp'])?> <?php echo strtoupper($rows['prenomp']) ;?> </h3>            
            <span class="card__status">Profession: <?php echo $_SESSION['profession'] ?></span>
          </div>
        </div>
        <p class="card__description">adresse : <?php echo $rows['adressep'];?></p>
        <p class="card__description">nombre de commande : </p>
        <p class="card__description">reputation :</p>
      </div>
    </a>
          
  </li>

  <?php }?>
</ul>
<div id="divb"><button class="button-29"><a id="a1" href="../logged1-services/s-services.php">Retour</a></button><?php echo "     ";?><button class="button-29" type="submit" name="submit">Suivant</button></div>
</form>
</body>
</html>