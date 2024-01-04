<?php 

include '../login-auth/config.php';

error_reporting(0);

session_start();
$_SESSION['connectee']="ok";
//$_SESSION['conn']="1";
$radio=$_POST['radio'];
$nomc=$_SESSION['nomc'];



if (isset($_POST['submit'])) {
$_SESSION['villep']=$_POST['select1'];
switch ($radio) {

    case 'pressing':
        
        $_SESSION['profession']="pressing";
        break;
    case 'plombier':
        $_SESSION['profession']="plombier";
        break;
    case 'menuisier':
        $_SESSION['profession']="menuisier";
        break;
    case 'vitre':
          $_SESSION['profession']="netoyyage-vitre";
          break;
    case 'voiturier':
          $_SESSION['profession']="voiturier";
          break;
    case 'babysitting':
          
          $_SESSION['profession']="babysitting";
          break;
    case 'cuisinier':

            $_SESSION['profession']="cuisinier";
            break;
    case 'menage':
           
            $_SESSION['profession']="menage";
            break;

}
header("Location: ../logged2-services/p-services.php");

}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="s-style.css">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <div id="divi1">
      <h1>BONJOUR <?php echo strtoupper($nomc); ?></h1>
      <div id="divb2">  <button class="button-24" role="button"><a id="a1" href="deconn.php">Se deconnecter</a></button></div>
    


    <div id="divi2">
        <h2>Choisissez votre ville</h2>
          <select name="select1" id="slc1">
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
          <div>
          <h2>Choisissez votre service</h2>
          </div>

        </div>
    </div>


    <div class="cards-list">
    
        <div class="card 1">
        
          <div class="card_image"> <img src="../images/pressing.jpg" /> </div>
          
          <div class="card_title title-white">
          <label class="container">
                <input type="radio" checked="checked" name="radio" value="pressing">
                <span class="checkmark"></span>
              </label>
            <p>Service pressing</p>

          </div>
        </div>
        
        
          <div class="card 2">
          <div class="card_image">
            <img src="../images/plombier.jpg" />
            
            </div>
          <div class="card_title title-white">
          <label class="container">
                <input type="radio"  name="radio" value="plombier">
                <span class="checkmark"></span>
              </label>
            <p>Plombier</p>
          </div>
        </div>
        

        <div class="card 3">
          <div class="card_image">
            <img src="../images/menuiserie.jpg" />
          </div>
          <div class="card_title title-black ">
          <label class="container">
                <input type="radio"  name="radio" value="menuisier">
                <span class="checkmark"></span>
              </label>
            <p>Service menuiserie</p>
          </div>
        </div>
          
          <div class="card 4">
          <div class="card_image">
            <img src="../images/netoyyage-vitre.jpg" />
            </div>
          <div class="card_title title-black">
          <label class="container">
                <input type="radio"  name="radio" value="vitre">
                <span class="checkmark"></span>
              </label>
            <p>Netoyyage vitre</p>
          </div>
          </div>
        
        </div>
        
        <div class="cards-list">
  
            <div class="card 1">
              <div class="card_image"> <img src="../images/service-voiturier.jpg" /> </div>
              <div class="card_title title-white">
              <label class="container">
                <input type="radio"  name="radio" value="voiturier">
                <span class="checkmark"></span>
              </label>
                <p>Service voiturier</p>
              </div>
            </div>
            
              <div class="card 2">
              <div class="card_image">
                <img src="../images/babysitting.jpg" />
                </div>
              <div class="card_title title-white">
              <label class="container">
                <input type="radio"  name="radio" value="babysitting">
                <span class="checkmark"></span>
              </label>
                <p>babysitting</p>
              </div>
            </div>
            
            <div class="card 3">
              <div class="card_image">
                <img src="../images/cuisinier.jpg" />
              </div>
              <div class="card_title title-black">
              <label class="container">
                <input type="radio"  name="radio" value="cuisinier">
                <span class="checkmark"></span>
              </label>
                <p>Cuisinier a domicile</p>
              </div>
            </div>
              
              <div class="card 4">
              <div class="card_image">
                <img src="../images/femme-menage.jpg" />
                </div>
              <div class="card_title title-black">
              <label class="container">
                <input type="radio"  name="radio" value="menage">
                <span class="checkmark"></span>
              </label>
                <p>Femme de menage</p>
              </div>
              </div>
            
            </div>
            <div id="divb"><button class="button-29"><a id="a1" href="../demandes-client/demande-client.php">Mes Demandes</a></button><?php echo "     ";?><button class="button-29" type="submit" name="submit">Suivant</button></div>
            </form>
</body>
</html>