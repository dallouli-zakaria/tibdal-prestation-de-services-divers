<?php 

include '../login-auth/config.php';

error_reporting(0);

session_start();

$idp=$_SESSION['idp'];


$sql = "SELECT * FROM prestateur where idp='$idp'";
$result = mysqli_query($conn, $sql);
$rows=$result->fetch_assoc();

$sql3 = "SELECT   * FROM evaluation where id='' order by id desc";
$result3 = mysqli_query($conn, $sql3);
$r=1;
while($rows3=$result3->fetch_assoc()) {
  
  $f=$rows;
  $r++;
  
  
}
//$rows3=$result3->fetch_assoc();


$sql2 = "SELECT  * FROM evaluation where idprest='$idp' order by id desc";
$result2 = mysqli_query($conn, $sql2);
$rows2=$result2->fetch_assoc();





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="score-prest.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <li><a href="prest-dashboard.php"><i class="fas fa-arrow-left i-l w"></i></a></li>
      </ul>
  <form action="" method="post">        
      <img src="../<?php echo $rows['source'];?>" alt="profile-pic" class="profile">
      <h1 class="title"><?php echo  strtoupper($rows['nomp'])?> <?php echo strtoupper($rows['prenomp']);?></h1>
      <p>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"> </span>
        </p>
        <span style="color:white; font-size:20px;">Avis client </span>

        <div>
        <section class="carousel" aria-label="Gallery">
  <ol class="carousel__viewport">      
       
    <li id="carousel__slide1"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper">
        <a href="#carousel__slide4"
           class="carousel__prev">Go to last slide</a>
        <a href="#carousel__slide2"
           class="carousel__next">Go to next slide</a>
      </div>
      <p id="crs-txt"><br><br><?php echo $rows2['message'];?></p>
    </li>
     
    <li id="carousel__slide2"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper"> <br><br><p id="crs-txt">Travaille parfait! vraiment bravo.</p></div>
      <a href="#carousel__slide1"
         class="carousel__prev">Go to previous slide</a>
      <a href="#carousel__slide3"
         class="carousel__next">Go to next slide</a>
    </li>
    <li id="carousel__slide3"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper" ><br><br><p id="crs-txt">Service impeccable, merci Tibdal!</p></div>
      <a href="#carousel__slide2"
         class="carousel__prev">Go to previous slide</a>
      <a href="#carousel__slide4"
         class="carousel__next">Go to next slide</a>
    </li>
    <li id="carousel__slide4"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper" ><br><br><p id="crs-txt"> Meilleur service disponible, qualite prix, c'est vraiment magnifique.</p></div>
      <a href="#carousel__slide3"
         class="carousel__prev">Go to previous slide</a>
      <a href="#carousel__slide1"
         class="carousel__next">Go to first slide</a>
    </li>
  
  </ol>
  <aside class="carousel__navigation">
    <ol class="carousel__navigation-list">
      <li class="carousel__navigation-item">
        <a href="#carousel__slide1"
           class="carousel__navigation-button">Go to slide 1</a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide2"
           class="carousel__navigation-button">Go to slide 2</a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide3"
           class="carousel__navigation-button">Go to slide 3</a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide4"
           class="carousel__navigation-button">Go to slide 4</a>
      </li>
    </ol>
  </aside>
  
</section>
</div>
   
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

            <?php
            $sql3 = "SELECT  count(*) as count FROM acceptedfinal where idprest='$idp' ";
            $result3 = mysqli_query($conn, $sql3);
            $rows3=$result3->fetch_assoc();
            $count=0;
            $count = $rows3['count'];
            ?>

            <h2 class="title"><?php echo $count;?></h2>
            <p class="followers">Nombre de prestation</p>
          </div>


          <?php 
                      $sql3 = "SELECT  count(*) as count2 FROM evaluation where idprest='$idp' ";
                      $result3 = mysqli_query($conn, $sql3);
                      $rows3=$result3->fetch_assoc();
                      $count2 = $rows3['count2'];

                      $sql4 = "SELECT * FROM evaluation where idprest='$idp' ";
                      $result4 = mysqli_query($conn, $sql4);
                      $i=0;
                      $total=0;
                      $score=0;
                      while($rows4=$result4->fetch_assoc()){

                        
                        
                        $score=$score+$rows4['nombre'];
                        $i=$i+1;

                      }
                      if($score!=0){
                        $total=$score/$i;
                      }
                      
                      


          ?>
          <div class="grid-2">
            <button class="color-d circule"><i class="">SCR</i></button>
            <h2 class="title"><?php echo number_format( $total, 1 ) ;?> PTS</h2>
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

