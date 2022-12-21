<?php include_once '../racine.php'; 
 
 session_start(); 
include("../db.php");
 ?> 
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="description" content="">
   
 
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
   <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!--external css-->
   <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  
   <!-- Custom styles for this template -->
   <link href="css/style.css" rel="stylesheet">
   <link href="css/style-responsive.css" rel="stylesheet">
   
  <style type="text/css">
         
                
 
 a:visited {
   text-decoration: none;
 }
 
 a:hover {
   text-decoration: underline;
 }
 
 
 
         </style>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<meta name="description" content="example-inner-join-with-multiple-tables php mysql examples | w3resource">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>


<body style="background-image: url('../bg2.png');">


<?php  include('../headers/head_manager.html');?>
     <!-- **********************************************************************************************************************************************************
         MAIN SIDEBAR MENU
         *********************************************************************************************************************************************************** -->
     <!--sidebar start-->
     <aside id="aside">
       <div id="sidebar" class="nav-collapse ">
         <!-- sidebar menu start-->
         <ul class="sidebar-menu" id="nav-accordion">
           <p class="centered"><a href="profile.php"><img src="../images/avatar2.jpg" class="img-circle" width="100"></a></p>
           <?php 
  
 if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
   echo '<h5 style="color:black;"class="centered">Bienvenue '.$_SESSION['sess_name'].'</h5>';
   
 } else { 
   header('location:../landing/index.html');
 }
 ?>  </ul>
         <!-- sidebar menu end-->
       </div>
     </aside>
     <!--sidebar end-->
    
     <div class="container">
<div class="row">
<div class="col-md-12">
<h2> Responsable pour chaque zone </h2>
<table class='table table-bordered'>
<tr>
<th>Zones</th><th scope="col">Agriculteur Responsable</th><th scope="col">Option</th>
      
</tr>

<?php
   
$hostname="localhost";
$username="root";
$password="root";
$db = "proinfo";
$dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
include_once RACINE . '/service/zoneService.php'; 
$e = new zoneService();
foreach($dbh->query("SELECT *
FROM zone,users
WHERE username != '".$_SESSION['sess_username']."' AND zone.iduser = (select idmanagement FROM users WHERE username ='".$_SESSION['sess_username']."' Limit 1)  ")
as $row) {
echo "<tr>";
echo ($_SESSION['sess_username']); 
echo "<td>" . $row['nomzone'] . "</td>";
echo "<td>" . $row['username'] . "</td>";


echo "<td>"." <a href='territoire2.php?idzone=".$row['idzone']."'>"."Voir Territoire </a>"."</td>";
echo "</tr>";
}

  ?>                         



</tbody></table>


</div>
</div>
</div>
<!--2ndprinting-->


<div class="container">
<div class="row">
<div class="col-md-12">
<h2>Liste des plantes par zone</h2>
<table class='table table-bordered'>
<tr>
<th>Nom zone</th><th>Nom plante</th><th>Type du sol</th><th>Durée d'arrosage (min)</th>
      
</tr>

<?php
   
$hostname="localhost";
$username="root";
$password="root";
$db = "proinfo";
$dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
foreach($dbh->query("SELECT *
FROM zone,plante,typeplante,users,typesol

WHERE username != '".$_SESSION['sess_username']."' AND typesol.idtypesol=zone.idtypesol AND (plante.idtypeplante=typeplante.idtypeplante)AND (plante.idzone=zone.idzone) AND zone.iduser = (select idmanagement FROM users WHERE username ='".$_SESSION['sess_username']."' Limit 1)  ORDER BY nomplante")

as $row) {
echo "<tr>";
echo "<td>" . $row['nomzone'] . "</td>";
echo "<td>" . $row['nomplante'] . "</td>";
echo "<td>" . $row['nomtypesol'] . "</td>";
echo "<td>" . $row['dureearrosage'] . "</td>";


echo "</tr>";
}

  ?>                         



</tbody></table>

 
</div>
</div>
</div>


</body>
</html>
