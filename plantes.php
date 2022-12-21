<?php include_once './racine.php'; 
 
 session_start(); 
include("db.php");
 ?> 
<!doctype html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<meta name="description" content="example-inner-join-with-multiple-tables php mysql examples | w3resource">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="description" content="">
   <meta name="author" content="Dashboard">
   <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
   
 
   
 
   <!-- Bootstrap core CSS -->
   <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <!--external css-->
   <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
   <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
   <!-- Custom styles for this template -->
   <link href="style.css" rel="stylesheet">
   <link href="css/style-responsive.css" rel="stylesheet">
   <script src="lib/chart-master/Chart.js"></script>
   <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/Chart.min.js"></script>
  <style type="text/css">
    
                
                 a:link {
   text-decoration: none;
 }
 
 a:visited {
   text-decoration: none;
 }
 
 a:hover {
   text-decoration: underline;
 }
 
 
         </style>
<meta name="description" content="example-inner-join-with-multiple-tables php mysql examples | w3resource">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>


<body style="background-image: url('bg2.png');">


<?php  include('headers/head_agri.html');?>
     <!-- **********************************************************************************************************************************************************
         MAIN SIDEBAR MENU
         *********************************************************************************************************************************************************** -->
     <!--sidebar start-->
     <aside id="aside">
       <div id="sidebar" class="nav-collapse ">
         <!-- sidebar menu start-->
         <ul class="sidebar-menu" id="nav-accordion">
           <p class="centered"><a href="profile.php"><img src="images/avatar.png" class="img-circle" width="100"></a></p>
           <?php 
  
 if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
   echo '<h5 style="color:black;"class="centered">Bienvenue '.$_SESSION['sess_name'].'</h5>';
   
 } else { 
   header('location:landing/index.html');
 }
 ?>  </ul>
         <!-- sidebar menu end-->
       </div>
     </aside>


<div class="container">
<div class="row">
<div class="col-md-12">
<h2>Liste des plantes par zone</h2>
<table class='table table-bordered'>
<tr>
<th>Nom zone</th><th>Type du sol</th><th>Nom plante</th><th>Type plante</th><th>(est)Durée d'arrosage/tytpe plante (min)</th><th scope="col">Supprimer</th>
      
</tr>

<?php
   
$hostname="localhost";
$username="root";
$password="root";
$db = "proinfo";
$dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
foreach($dbh->query('SELECT *
FROM zone,plante,typeplante,typesol

WHERE (plante.idtypeplante=typeplante.idtypeplante)AND (plante.idzone=zone.idzone) AND (zone.idtypesol=typesol.idtypesol) ORDER BY nomplante')

as $row) {
echo "<tr>";
echo "<td>" . $row['nomzone'] . "</td>";
echo "<td>" . $row['nomtypesol'] . "</td>";
echo "<td>" . $row['nomplante'] . "</td>";

echo "<td>" . $row['nomtypeplante'] . "</td>";
echo "<td>" . $row['dureearrosage'] . "</td>";
echo "<td>"." <a href='controller/deletePlante.php?idplante=".$row['idplante']."'>"."Supprimer la plante</a>"."</td>";

echo "</tr>";
}

  ?>                         



</tbody></table>


</div>
</div>
</div>
<div class=" btn-toolbar centered" role="toolbar" aria-label="Toolbar with button groups" style="margin-left: 50%;margin-right: 100px; ">
  <div class="btn-group me-4" role="group" aria-label="First group">
    <button type="button" class="btn btn-secondary btn-lg"> <a   href="addplante3.php" class="link-light">Ajouter une plante</a></button>
    
  </div>
  <div class="btn-group me-4" role="group" aria-label="Second group">
    <button type="button" class="btn btn-success btn-lg"><a   href="addtomarketplace.php" class="link-light">Ajouter un produit à la market place</a></button>
   
  </div>
  
</div>


</body>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
