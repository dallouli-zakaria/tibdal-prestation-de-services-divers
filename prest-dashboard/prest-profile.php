<?php 

include '../login-auth/config.php';

error_reporting(0);

session_start();

$_SESSION['connectee']="okp";
$idp=$_SESSION['idp'];




$sql="SELECT * FROM prestateur WHERE idp=$idp ";
$result = mysqli_query($conn, $sql);
$rows=$result->fetch_assoc();




if (isset($_POST['submit'])) {
	
	$nomc = $_POST['nom'];
	$prenomc = $_POST['prenom'];
	$adressec = $_POST['adresse'];
	$numtelc = $_POST['numtel'];
	$emailc = $_POST['email'];
	$passwordc = $_POST['mdp'];
	$cpasswordc = $_POST['cmdp'];
	$prix=$_POST['prix'];



    if($passwordc==$cpasswordc){
				$sql = "INSERT INTO rectification(nomp, prenomp, adressep, numtelp, emailp, passwordp,prix) values
						 ('$nomc', '$prenomc','$adressec','$numtelc','$emailc','$passwordc','$prix')";
				$result = mysqli_query($conn, $sql);
				if ($result) {
					echo "<script>alert('bien Envoye!')</script>";
					$username = "";
					$email = "";
					$tel = "";
					$adresse = "";
					$_POST['password'] = "";
					$_POST['cpassword'] = "";
				} else {
					echo "<script>alert('oops! Probleme, veuillez ressayez!')</script>";
				}
            
        }else{
            echo "<script>alert('oops! Mot de passe non identique!')</script>";
        }
    

}
			
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="prest-profile.css">
    <title>demande-rectification-des-informations</title>
</head>
<body>
  
<div class="modal">
    <div class="modal__container">
      <div class="modal__featured">
        <a href="prest-dashboard.php"><button type="button" class="button--transparent button--close">
          <svg class="nc-icon glyph" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
            <g><path fill="#ffffff" d="M1.293,15.293L11,5.586L12.414,7l-8,8H31v2H4.414l8,8L11,26.414l-9.707-9.707 C0.902,16.316,0.902,15.684,1.293,15.293z"></path> </g></svg>
          <span class="visuallyhidden">Retour</span>
        </button></a>
        <div class="modal__circle"></div>
        <img src="" class="modal__product" />
      </div>
      <div class="modal__content">
        <h2>Demande de Rectification</h2>
        <h2>des Informations au admins</h2>

        <form method="post" action="">
          <ul class="form-list">
            <li class="form-list__row">
              <label>Nom</label>
              <input type="text" name="nom" required="" value="<?php echo $rows['nomp'];?>"/>
            </li>
            <li class="form-list__row">
            <label>Prenom</label>
              <input type="text" name="prenom" required="" value="<?php echo $rows['prenomp'];?>"/>
            </li>
            <li class="form-list__row">
            <label>Adresse</label>
              <input type="text" name="adresse" required="" value="<?php echo $rows['adressep'];?>"/>
            </li>
            <li class="form-list__row">
              <label>Numero de telephone</label>
              <input type="text" name="numtel" required="" value="<?php echo $rows['numtelp'];?>"/>
            </li>
            <li class="form-list__row">
              <label>Prix par Heure</label>
              <input type="number" name="prix" required="" value="<?php echo $rows['prix'];?>"/>
            </li>
            <li class="form-list__row">
            <label>Email</label>
              <input type="email" name="email" required="" value="<?php echo $rows['emailp'];;?>"/>
            </li>
            <li class="form-list__row">
            <label>Mot de passe</label>
              <input type="password" name="mdp" required="" />
            </li>
            <li class="form-list__row">
            <label>confirmer mot de passe</label>
              <input type="password" name="cmdp" required="" />
            </li>

              <button type="submit" class="button" name="submit">Envoyer Demande</button>
            </li>
          </ul>
        </form>
      </div> 
    </div> 
  </div> 
</body>
<script src="prest-profile.js"></script>
</html>