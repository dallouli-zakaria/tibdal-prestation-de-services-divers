
<?php
session_start();
error_reporting(0);
include('../login-auth/config.php');
if(strlen($_SESSION['alogin'])=="")
    {
    header("Location: admin.php");
    }
    else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Demandes en effectuées</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
          <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

        </style>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
   <?php include('includes/topbar.php');?>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
<?php include('includes/leftbar.php');?>

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">les demandes effectuées</h2>

                                </div>

                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Accueil</a></li>
                                        <li> Demandes</li>
            							<li class="active">Demandes effectuées</li>
            						</ul>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">



                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Liste des  Demandes effectuées</h5>
                                                </div>
                                            </div>
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Bien fait! </strong><?php echo htmlentities($msg); ?>
 </div><?php }
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Erreur! </strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                            <div class="panel-body p-20">
                                            <!-- `nomp`, `prenomp`, `adressep`, `numtelp`, `emailp`, `passwordp`, `nbrprestp`, `score`, `villep`, `dateincp`, `servicep`, `imagename`, `source`, `prix` -->
                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                           
                                                            <th>Nom client </th>
                                                            
                                                            <th>Nom prestateur</th>
                                                            <th>Date debut</th>
                                                            <th>Date fin</th>
                                                            
                                                            <th>Prix/H</th>
                                                            <th>Nbr d'heures</th>
                                                            <th>Total ttc</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                        <th>#</th>
                                                           
                                                        <th>Nom client </th>
                                                            
                                                            <th>Nom prestateur</th>
                                                            <th>Date debut</th>
                                                            <th>Date fin</th>
                                                            
                                                            <th>Prix/H</th>
                                                            <th>Nbr d'heures</th>
                                                            <th>Total ttc</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
<?php $sql = "SELECT * from accepted";
$results=mysqli_query($conn,$sql);
$cnt=1;
if($results->num_rows > 0)
{
while($rows=$results->fetch_assoc())
{   $idclient=$rows['idclient'];
    $idprestateur=$rows['idprest'];?>

<tr>
 <td><?php echo htmlentities($cnt);?></td>
                                                            
                                                            <td><?php $sql2 = "SELECT * from client where id='$idclient'";
                                                                      $results2=mysqli_query($conn,$sql2);
                                                                      $rows2=$results2->fetch_assoc();
                                                                      echo $rows2['nomc']." ".$rows2['prenomc'];?></td>
                                                            <td><?php $sql3 = "SELECT * from prestateur where idp='$idprestateur'";
                                                                      $results3=mysqli_query($conn,$sql3);
                                                                      $rows3=$results3->fetch_assoc();
                                                                      echo $rows3['nomp']." ".$rows3['prenomp'];?></td>
                                                            <td><?php echo $rows['dated'];?></td>
                                                            <td><?php echo $rows['datef'];?></td>
                                                            <td><?php echo $rows['prix'];?></td>
                                                            <td><?php echo $rows['heure'];?></td>
                                                            <td><?php echo $rows['totalttc'];?></td>
                                                        
                                      
                                                            
                                                            
<td>

<a href="delete-demandes.php?demandeid=<?php echo $rows['idaccepted'];?>"><i class="fa fa-minus" title="supprimer"></i> </a>

</td>
</tr>
<?php $cnt=$cnt+1;}} ?>


                                                    </tbody>
                                                </table>


                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->


                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->



                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>
    </body>
</html>
<?php } ?>
