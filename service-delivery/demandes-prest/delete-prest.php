<?php

    $idpending=$_SESSION['idpending'];
    $sql = "DELETE FROM pending where idpending='$idpen' ";
    $result = mysqli_query($conn, $sql);


    header("Location:demande-prest.php");




?>