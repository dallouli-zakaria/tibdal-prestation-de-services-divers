<?php 

include 'config.php';

error_reporting(0);

session_start();


echo $_SESSION['connectee'];
if($_SESSION['connectee']=="ok"){


	header("Location:../logged1-services/s-services.php");
}else if($_SESSION['connectee']=="okp"){

	header("Location:../demandes-prest/demande-prest.php");
}else{



$radio=$_POST['rd1'];
$_SESSION['idp'] = $row['idp'];
$_SESSION['idc'] = $row['id'];

if (isset($_POST['submit'])) {
	if($radio == "prestateur"){

		$emailp = $_POST['email'];	
	    $passwordp = md5($_POST['password']);

	$sql = "SELECT * FROM prestateur WHERE emailp='$emailp' AND passwordp='$passwordp'";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['idp'] = $row['idp'];
		$_SESSION['nomp'] = $row['nomp'];
		$_SESSION['prenomp'] = $row['prenomp'];
		$_SESSION['adressep'] = $row['adressep'];
		$_SESSION['numtelp'] = $row['numtelp'];
		$_SESSION['emailp'] = $row['emailp'];
		$_SESSION['nbrprestp'] = $row['nbrprestp'];

		header("Location: ../demandes-prest/demande-prest.php");
		
	} else {
		echo "<script>alert('oops! email ou bien mot de passe incorrect !')</script>";
	}
}
else if($radio == "client"){
	$emailp = $_POST['email'];	
	$passwordp = md5($_POST['password']);

$sql = "SELECT * FROM client WHERE emailc='$emailp' AND passwordc='$passwordp'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
	$row = mysqli_fetch_assoc($result);
	$_SESSION['idc'] = $row['id'];
	$_SESSION['nomc'] = $row['nomc'];
	$_SESSION['prenomc'] = $row['prenomc'];
	$_SESSION['adressec'] = $row['adressec'];
	$_SESSION['numtelc'] = $row['numtelc'];
	$_SESSION['emailc'] = $row['emailc'];
	$_SESSION['nbrprestc'] = $row['nbrprestc'];

	header("Location: ../logged1-services/s-services.php");
	
	

	
} else {
	echo "<script>alert('oops! email ou bien mot de passe incorrect !')</script>";
}
}
}
	


?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>TIBDAL</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style.css">

</head>
<body>
<div class="box-form">
	<div class="left">
		<div class="overlay">
		<h1>Bonjour.</h1>
		<p>Connectez vous!</p>
    <p>oubien inscrivez vous !</p>
		</div>
	</div>
	
	
		<div class="right">
		<h5>Connexion</h5>
		<p>Vous n'avez pas de compte? <a id="a1" href="auth.php">Creer un compte</a> sans aucun soucis</p>
		<form action="" method="post">
		<div class="inputs">
			<div>je suis prestateur<input type="radio" name="rd1" id="rd1" value="prestateur" ></div>
			<div>je suis client<input type="radio"  name="rd1" id="rd1" value="client" checked></div>
			<input type="email" placeholder="Email" name="email" autocomplete="off">
			<br>
			<input type="password" placeholder="Mot de passe" name="password">
		</div>
    <br>
    <br>
    <a id="a1" href="../../wp-projects"><--Retour a l'acceuil</a>
	
	<button type="submit" name="submit">Connexion</button>
	</form>
	</a>

	</div>
	
</div>

  
</body>
</html>
<?php }?>