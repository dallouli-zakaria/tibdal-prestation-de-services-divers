<?php 

include '../login-auth/config.php';

error_reporting(0);

session_start();

$idp2=$_SESSION['idp2'];
$idac=$_SESSION['idaccepted'];
$idc=$_SESSION['idc'];




$sql = "SELECT * FROM prestateur where idp='$idp2'";
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();

if(isset($_POST['submit'])){

 $message=$_POST['message'];   
$rate=$_POST['rate'];
    switch ($rate) {

        case '1':
            $rating="1";
            
            break;
        case '2':
            $rating="2";

            break;
        case '3':
            
            $rating="3";
            
            break;
        case '4':
            $rating="4";
            
            break;
        case '5':
            
            $rating="5";
            
            break;

        }

        $sql="INSERT INTO evaluation(message,nombre,idprest,idclient,idcommande) VALUES ('$message','$rating','$idp2','$idc','$idac')"   ;
        $result = mysqli_query($conn, $sql); 
    





      

        header("Location:../demandes-client/demande-client-accepte.php");



}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="evaluation.css">
    <title>Document</title>
</head>
<body>

<div class="all-c">
<div class="container">
  <div class="grid-7 element-animation">
    <!--card-1-->
    <div class="card color-card">
    <ul>
        <li><a href="../demandes-client/demande-client-accepte.php"><i class="fas fa-arrow-left i-l w"></i></a></li>
      </ul>
  <form action="" method="post">        
      <img src="../<?php echo $row['source'];?>" alt="profile-pic" class="profile">
      <h1 class="title">Laissez nous votre avis sur <?php echo $row['nomp']." ".$row['prenomp'];?> !</h1>
      <p>
        <textarea name="message" id="" cols="30" rows="10" placeholder="votre message ici !"></textarea>
      </p>
      <br><br><br>
      
      <span>
            <section id="rate" class="rating" name="rating">
                
                <input type="radio" id="star_5" name="rate" value="5" />
                <label for="star_5" title="Five">&#9733;</label>
                
                <input type="radio" id="star_4" name="rate" value="4" />
                <label for="star_4" title="Four">&#9733;</label>
                
                <input type="radio" id="star_3" name="rate" value="3" />
                <label for="star_3" title="Three">&#9733;</label>
                
                <input type="radio" id="star_2" name="rate" value="2" />
                <label for="star_2" title="Two">&#9733;</label>
                
                <input type="radio" id="star_1" name="rate" value="1" />
                <label for="star_1" title="One">&#9733;</label>
             </section>
        </span>

        



      
    
      <hr>
      <button class="btn color-a top" type="submit" name="submit">Envoyer</button>
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
<script src="evaluation.js"></script>




</body>
</html>