<?php 

include '../login-auth/config.php';

error_reporting(0);

session_start();

$_SESSION['connectee']="okp";
$idp=$_SESSION['idp'];



$sql="SELECT * FROM prestateur WHERE idp=$idp ";
$result = mysqli_query($conn, $sql);
$rows=$result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="prest-dashboard.css">
    <title>profile-prestateur</title>






<div><p id="pp">.</p></div>
<div class="cla1">


<svg>
<defs>
<symbol id="icon-eye" viewBox="0 0 1024 1024">
<title>Voir les demandes</title>
<path class="path1" d="M512 192c-223.318 0-416.882 130.042-512 320 95.118 189.958 288.682 320 512 320 223.312 0 416.876-130.042 512-320-95.116-189.958-288.688-320-512-320zM764.45 361.704c60.162 38.374 111.142 89.774 149.434 150.296-38.292 60.522-89.274 111.922-149.436 150.296-75.594 48.218-162.89 73.704-252.448 73.704-89.56 0-176.858-25.486-252.452-73.704-60.158-38.372-111.138-89.772-149.432-150.296 38.292-60.524 89.274-111.924 149.434-150.296 3.918-2.5 7.876-4.922 11.86-7.3-9.96 27.328-15.41 56.822-15.41 87.596 0 141.382 114.616 256 256 256 141.382 0 256-114.618 256-256 0-30.774-5.452-60.268-15.408-87.598 3.978 2.378 7.938 4.802 11.858 7.302v0zM512 416c0 53.020-42.98 96-96 96s-96-42.98-96-96 42.98-96 96-96 96 42.982 96 96z"></path>
</symbol>
<symbol id="icon-menu" viewBox="0 0 1024 1024">
<title>menu</title>
<path class="path1" d="M64 192h896v192h-896zM64 448h896v192h-896zM64 704h896v192h-896z"></path>
</symbol>
<symbol id="icon-user" viewBox="0 0 1024 1024">
<title>Demande de rectification</title>
<path class="path1" d="M576 706.612v-52.78c70.498-39.728 128-138.772 128-237.832 0-159.058 0-288-192-288s-192 128.942-192 288c0 99.060 57.502 198.104 128 237.832v52.78c-217.102 17.748-384 124.42-384 253.388h896c0-128.968-166.898-235.64-384-253.388z"></path>
</symbol>
<symbol id="icon-heart" viewBox="0 0 768 1024">
<title>Score</title>
<path class="path1" d="M384 864c399-314 384-425 384-512s-72-192-192-192-192 128-192 128-72-128-192-128-192 105-192 192-15 198 384 512z"></path>
</symbol>
<symbol id="icon-exit" viewBox="0 0 1024 1024">
<title>Se deconnecter</title>
<path class="path1" d="M768 640v-128h-320v-128h320v-128l192 192zM704 576v256h-320v192l-384-192v-832h704v320h-64v-256h-512l256 128v576h256v-192z"></path>
</symbol>
</defs>
</svg>
<meta charset="utf-8">
<title>profile-prestateur</title>
</head>

<body>
<div class="profile">
<div class="content">
<div class="back"></div>
<div class="proPage ExitPage"><a href="deconnp.php"><svg class="icon icon-exit"><use xlink:href="#icon-exit"></use></svg></a></div>
<div class="profilePic"><img id="prfp" src="../<?php echo $rows['source'];?>" alt="" srcset=""></div>
<h3><?php echo $rows['nomp']." ".$rows['prenomp'];?></h3>
<h4>SERVICE : <?php echo strtoUpper($rows['servicep']);?></h4>
<p>Bonjour je m'appelle <?php echo $rows['nomp']." ".$rows['prenomp'];?>, expérimenté  dans le service <?php echo $rows['servicep']?>, je serai apte à toutes vos demandes.  </p>
<a href="../demandes-prest/demande-prest.php"><div class="rates">
<div class="box boxview">
<div class="iconCon">
<svg class="icon icon-eye"><use xlink:href="#icon-eye"></use></svg>
</div>
<h4 class="counter"> Demande</h4>
</div></a>
<a href="prest-profile.php"><div class="box boxbuddy">
<div class="iconCon">
<svg class="icon icon-user"><use xlink:href="#icon-user"></use></svg>
</div></a>
<h4 class="counter">Profile</h4>
</div>
<a href="score-prest.php"><div class="box boxhearth">
<div class="iconCon">
<svg class="icon icon-heart"><use xlink:href="#icon-heart"></use></svg>
<div class="ball"></div>
</div></a>
<h4 class="counter h4h">Score</h4>
</div>
</div>
</div>
</div>

</body>
</html>