
    <!-- flip-card-container -->
    <?php while($rows=$result->fetch_assoc()) 
{$idp2=$rows['idprest'];
  $sql2 = "SELECT * FROM prestateur where idp='$idp2'";
  $result2 = mysqli_query($conn, $sql2);
  $rows2=$result2->fetch_assoc();



?>
<div class="flip-card-container" style="--hue: 220">
  <div class="flip-card">

    <div class="card-front">
      <figure>
        
        <div class="img-bg"></div><span></span>
       
        <figcaption>Commande n : <?php echo $rows['idpending'];?></figcaption>
        
      </figure>

      <ul>


        <li>Nom prestateur : <strong><?php echo strtoupper($rows2['nomp'])." ".strtoupper($rows2['prenomp']);?></strong></li>
        <li>Service : <strong><?php echo strtoupper($rows2['servicep']);?></strong></li>
        <li>Date : du  <strong><?php echo $rows['dated'];?> au <?php echo $rows['datef'];?></strong></li>
        <li>Nombre d'heure par jour :<strong><?php echo $rows['heure'];?>H</strong></li>
        <li>Total ttc : <strong><?php echo $rows['totalttc'];?> MAD</strong></li>
        <li > <strong> EN ATTENTE </strong></li>
        
      </ul>
    </div>

    <div class="card-back">
      <figure>
        <div class="img-bg"></div>
       
      </figure>

      <button>Supprimer</button>
      <button>Consulter</button>

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
<?php }?>
