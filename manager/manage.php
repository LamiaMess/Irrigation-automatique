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
   <meta name="author" content="Dashboard">
   <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
   
 
   <!-- Favicons -->
   <link href="img/farm.jpg" rel="icon">
   <link href="img/farm.jpg" rel="apple-touch-icon">
 
   <!-- Bootstrap core CSS -->
   <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!--external css-->
   <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
   <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
   <!-- Custom styles for this template -->
   <link href="css/style.css" rel="stylesheet">
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


<body>


<?php  include('../headers/head_manager.html');?>
     <!-- **********************************************************************************************************************************************************
         MAIN SIDEBAR MENU
         *********************************************************************************************************************************************************** -->
     <!--sidebar start-->
     <aside id="aside" class="aside" >
       <div id="sidebar" class="nav-collapse ">
         <!-- sidebar menu start-->
         <ul class="sidebar-menu" id="nav-accordion">
           <p class="centered"><a href="profile.php"><img src="img/abdoo.jpg" class="img-circle" width="150"></a></p>
           <?php 
  
 if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
   echo '<h5 style="color:black;"class="centered">Bienvenue '.$_SESSION['sess_name'].'</h5>';
   
 } else { 
   header('location: index2.php');
 }
 ?>
           <li style="margin-top: 60px;"> 
 
             <h5 class="centered"  ><a style="color:black; font-size: 15px; background-color: white;height:  30px;" class="l" href="profile.php"><img src="img/profile.png" alt="Avatar" class="avatar">   Profile</a></h5></li>
           
           <li > <a  class="centered" style="margin-top: 90px;" href="logout.php"> <strong style="color: black;text-align: center;font-size: 15px;text-decoration: underline;">Logout</strong></a> </li>
         </ul>
         <!-- sidebar menu end-->
       </div>
     </aside>
     <!--sidebar end-->

<!--personnal info  start-->
<div class="container">
     <?php
    $hostname="localhost";
    $username="root";
    $password="root";
    $db = "proinfo";
    $dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
include_once RACINE . '/service/zoneService.php'; 
$e = new zoneService();
foreach($dbh->query("SELECT name, username, email FROM users WHERE username='".$_SESSION['sess_username']."' LIMIT 1")
as $row) {

echo  $row['name']  ;
echo $row['username'] ;
echo $row['email'] ;

}
  
   
      ?>  
      
      
      </div>

      <!--personnal info  end-->
    
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


echo "<td>"." <a href='controller/afficherZone.php?idzone=".$row['idzone']."'>"."Voir Territoire </a>"."</td>";
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
FROM zone,plante,typeplante,users

WHERE username != '".$_SESSION['sess_username']."' AND (plante.idtypeplante=typeplante.idtypeplante)AND (plante.idzone=zone.idzone) AND zone.iduser = (select idmanagement FROM users WHERE username ='".$_SESSION['sess_username']."' Limit 1)  ORDER BY nomplante")

as $row) {
echo "<tr>";
echo "<td>" . $row['nomzone'] . "</td>";
echo "<td>" . $row['nomplante'] . "</td>";
echo "<td>" . $row['idtypesol'] . "</td>";
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
