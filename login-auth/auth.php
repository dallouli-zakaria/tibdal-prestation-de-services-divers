<?php 

include 'config.php';

error_reporting(0);

session_start();

$radio=$_POST['grp1'];




if (isset($_POST['submit'])) {
	
	$nomc = $_POST['nom'];
	$prenomc = $_POST['prenom'];
	$adressec = $_POST['adresse'];
	$numtelc = $_POST['numtel'];
	$emailc = $_POST['email'];
	$villec=$_POST['select2'];
	$servicep=$_POST['select1'];
	$passwordc = md5($_POST['mdp']);
	$cpasswordc = md5($_POST['cmdp']);
	$prix=$_POST['prix'];
	$img=hash('ripemd160',date("Y-m-d H:i:s"));
    $path="D:\\XA\\htdocs\\tibdal-php\\prest-images\\$img".".jpg";
    $source= "prest-images/$img".".jpg";
    move_uploaded_file($_FILES['fl']['tmp_name'],$path);

	$_SESSION['email'] = $row['email'];
	$_SESSION['nomp'] = $row['nomp'];
	$_SESSION['nomc'] = $row['nomc'];

	if($radio == "prestateur"){
	



				if ($passwordc == $cpasswordc) {
					$sql = "SELECT * FROM prestateur WHERE emailp='$emailc'";
					$result = mysqli_query($conn, $sql);
					if (!$result->num_rows > 0) {
				$sql = "INSERT INTO prestateur(nomp, prenomp, adressep, numtelp, emailp, passwordp,villep,servicep,imagename,source,prix) values
						 ('$nomc', '$prenomc','$adressec','$numtelc','$emailc','$passwordc','$villec','$servicep','$path','$source','$prix')";
				$result = mysqli_query($conn, $sql);
				if ($result) {
					echo "<script>alert('bien inscrit!')</script>";
					$username = "";
					$email = "";
					$tel = "";
					$adresse = "";
					$_POST['password'] = "";
					$_POST['cpassword'] = "";
				} else {
					echo "<script>alert('oops! Probleme, veuillez ressayez!')</script>";
				}
			} else {
				echo "<script>alert('oops! email deja existant !')</script>";
			}
			
		} else {
			echo "<script>alert('Mot de passe non identique !')</script>";
		}






		}else{




				if ($passwordc == $cpasswordc) {
					$sql = "SELECT * FROM client WHERE emailc='$emailc'";
					$result = mysqli_query($conn, $sql);
					if (!$result->num_rows > 0) {
				$sql = "INSERT INTO  client ( nomc ,  prenomc ,  adressec ,  numtelc ,  emailc ,  passwordc, villec ) 
				VALUES ('$nomc', '$prenomc','$adressec','$numtelc','$emailc','$passwordc','$villec')";
				$result = mysqli_query($conn, $sql);
				if ($result) {
					echo "<script>alert('bien inscrit!')</script>";
				} else {
					echo "<script>alert('oops! Probleme, veuillez ressayez!')</script>";
				}
			} else {
				echo "<script>alert('oops! email deja existant !')</script>";
			}
			
		} else {
			echo "<script>alert('Mot de passe non identique !')</script>";
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
<body onload="domaine_activite()">
<div class="box-form">
	<div class="left">
		<div class="overlay">
		<h1>Bonjour.</h1><br>
        <br>
		<p>inscrivez vous!</p>
		</div>
	</div>	
		<div class="right">
		<h5>Inscription</h5>
		<p>Vous avez déjà un compte? <a id="a1" href="login.php">Se Connecter !</a></p>
    <form action="" method="post" enctype="multipart/form-data">
		<div class="inputs">
			<input type="text" placeholder="nom" name="nom" required="required" autocomplete="off">
			<br>
			<input type="text" placeholder="prenom" name="prenom" required="required" autocomplete="off">
            <br>
			<br>
			<radiogroup id="group1">je suis client :
 			     <input type="radio" value="client" name="grp1" id="cli"  onclick="domaine_activite()" checked>
				 je suis prestateur de service:
     		   	 <input type="radio" value="prestateur" name="grp1" id="prest" onclick="domaine_activite()" > 
            </radiogroup>
			<br>
			<div id="idselect1">
			votre profession :
			<select name="select1" id="slc1">
				<option value="pressing">Service pressing</option>
				<option value="plombier">Plombier</option>
				<option value="menuisier">Service menuiserie</option>
				<option value="netoyyage-vitre">Netoyyage vitre</option>
				<option value="voiturier">Service voiturier</option>				
				<option value="babysitting">babysitting</option>
				<option value="cuisinier">Cuisinier a domicile</option>
				<option value="menage">Femme de menage</option>
			</select>
		    
			<div class="form-group">
			<br>
			<div class="col-sm-10">
			<div>Inserer votre image *</div>
			<input type="file" name="fl" class="form-control" id="file" >
			<input   id="prix1" type="text" name="prix"  Value="votre prix / heure" required="required" autocomplete="off" >
			<br>
			</div>
			</div>
			</div>
			<br>
			<div class="select"> Votre ville :
			<select name="select2" id="slc1">
			    <option value="Agadir">Agadir</option>
				<option value="Al Hoceima">Al Hoceima</option>
				<option value="Azilal">Azilal</option>
				<option value="Beni Mellal">Beni Mellal</option>
				<option value="Ben Slimane">Ben Slimane</option>
				<option value="Boulemane">Boulemane</option>
				<option value="Casablanca">Casablanca</option>
				<option value="Chaouen">Chaouen</option>
				<option value="El Jadida">El Jadida</option>
				<option value="El Kelaa des Sraghna">El Kelaa des Sraghna</option>
				<option value="Er Rachidia">Er Rachidia</option>
				<option value="Essaouira">Essaouira</option>
				<option value="Fes">Fes</option>
				<option value="Figuig">Figuig</option>
				<option value="Guelmim">Guelmim</option>
				<option value="Ifrane">Ifrane</option>
				<option value="Kenitra">Kenitra</option>
				<option value="Khemisset">Khemisset</option>
				<option value="Khenifra">Khenifra</option>
				<option value="Khouribga">Khouribga</option>
				<option value="Laayoune">Laayoune</option>
				<option value="Larache">Larache</option>
				<option value="Marrakech">Marrakech</option>
				<option value="Meknes">Meknes</option>
				<option value="Nador">Nador</option>
				<option value="Ouarzazate">Ouarzazate</option>
				<option value="Oujda">Oujda</option>
				<option value="Rabat-Sale">Rabat-Sale</option>
				<option value="Safi">Safi</option>
				<option value="Settat">Settat</option>
				<option value="Sidi Kacem">Sidi Kacem</option>
				<option value="Tangier">Tangier</option>
				<option value="Tan-Tan">Tan-Tan</option>
				<option value="Taounate">Taounate</option>
				<option value="Taroudannt">Taroudannt</option>
				<option value="Tata">Tata</option>
				<option value="Taza">Taza</option>
				<option value="Tetouan">Tetouan</option>
				<option value="Tiznit">Tiznit</option>	
			</select>
			</div>

			<br>
			<input type="text" placeholder="numero de telephone" name="numtel" required="required" autocomplete="off">
            <br>
            <input type="text" placeholder="adresse" name="adresse" required="required" autocomplete="off">
			<br>
			<input type="email" placeholder="email" name="email" required="required" autocomplete="off">
			<br>
			<input type="password" placeholder="mot de passe" name="mdp" id="mdp">
            <br>
			<input type="password" placeholder="confirmer mot de passe" name="cmdp">
		</div>

		<button type="submit" name="submit">s'inscrire</button>
        </form>

    <br>
    <br>
    <a id="a1" href="../../TIBDAL"><--Retour a l'acceuil</a>


	</div>
	
</div>

<script src="auth.js"></script>
</body>
</html>
