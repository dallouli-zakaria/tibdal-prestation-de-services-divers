<?php 

include 'config.php';

error_reporting(0);

session_start();

$sql = "SELECT * FROM prestateur where idp='28' ";
$result = mysqli_query($conn, $sql);
$rows=$result->fetch_assoc();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div><img src="../<?php echo $rows['source']?>" alt="" srcset=""></div>
</body>
</html>
