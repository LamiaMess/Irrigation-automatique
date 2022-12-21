
<?php 
include_once '../racine.php'; 
 
 session_start(); 
 /*include("db.php");*/

 $regValue = $_GET['idzone'];


 ?> 
 
 
 
 
 <?php 
  
 include("../connexion/connect.php");
 ?>
 <?php 
 
 $msg = ""; 

 if(isset($_POST['m'])) {
   
 $sql = "UPDATE datacap SET arroser='m'";
 
 if ($mysqli->query($sql) === TRUE) {
 
 } else {
   echo "Error: " . $sql . "<br>" . $mysqli->error;
 }
 
 
 
 
   }elseif (isset($_POST['n'])) {
   
 $sql = "UPDATE datacap SET arroser='n'";
 
 if ($mysqli->query($sql) === TRUE) {
 
 } else {
   echo "Error: " . $sql . "<br>" . $mysqli->error;
 }
 
 
 
 
   }
  
 $mysqli->close();
 
 ?>

 <?php
	if(isset($_POST['GO']))
	{
	shell_exec("python C:/Users/Dell/Desktop/EminesCI1A/projetinfo/devsite/irrigation/code_python.py ");
		echo"success";
	}
?>
 
 
  
   
   <!DOCTYPE html>
  <html  lang="en">
 
 <head>

 
 <meta charset="utf-8">
 <meta http-equiv="refresh" content="2">
 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
   <!-- Bootstrap core CSS -->
   <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <style type="text/css">
    #chart-container {
        width: 640px;
        height: auto;
      }     
                
                 a:link {
   text-decoration: none;
 }
 
 a:visited {
   text-decoration: none;
 }
 
 a:hover {
   text-decoration: underline;
 }
 
 a:active {
   text-decoration: underline;
   
 }
         </style>
 
 </head>
 
 <body style="background-image: url(' ');"  >
   <section id="container">
     <!-- **********************************************************************************************************************************************************
         TOP BAR CONTENT & NOTIFICATIONS
         *********************************************************************************************************************************************************** -->
     <!--header start-->
     <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #5cb85c;">
        <a class="navbar-brand" href="#">IRRITAB</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto me-auto mb-2 mb-lg-0">
            <li class="nav-item ">
              <a class="nav-link" href="../index.php">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../myspace.php">Mon espace</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../territoire.php">Territoires</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../plantes.php">Plantes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="marketplace.php">Marketplace</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../imgsat.php">Imagerie Satellitaire</a>
            </li>

            
           
          </ul>
          <div  class="float-lg-left">
            <a href="logout.php" class=" btn btn-dark btn-lg float-right" tabindex="-1" role="button" aria-disabled="true" >Log out</a>
          </div>
         
        </div>
      </nav>
     <!--header end-->
     <!-- **********************************************************************************************************************************************************
         MAIN SIDEBAR MENU
         *********************************************************************************************************************************************************** -->
     <!--sidebar start-->
    
 
 
 
 
 
 
 
 
 
 <section id="main-content">
       <section class="wrapper"  >
 <?php
 include("../connexion/connect.php");   
  
   
  
 ?>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "proinfo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


$sql= "SELECT AVG(tauxhumidite),AVG(temperature),AVG(temperatureresentie),AVG(humsol1),AVG(humsol2),AVG(humsol3),AVG(humair),AVG(luminosite),nomzone  FROM datacap,zone  WHERE (zone.idzone= $regValue )" ;
$result = $conn->query($sql);
while($row = mysqli_fetch_array($result)){
    $tauxhum=floor($row['AVG(tauxhumidite)']);
    $temp=floor($row['AVG(temperature)']);
    $tempr=floor($row['AVG(temperatureresentie)']);
    $humsol1=floor($row['AVG(humsol1)']);
    $humsol2=floor($row['AVG(humsol2)']);
    $humsol3=floor($row['AVG(humsol3)']);
    $humair=floor($row['AVG(humair)']);
    $lum=floor($row['AVG(luminosite)']);
    $nomzone=$row['nomzone'];
  

};
$conn->close();
?>
 <div class="row">

   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="h3 mb-0 text-gray-800"><?php echo(" ZONE D'irrigation: ");  echo ($nomzone); ?></h4>
                        
                    </div>


<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        température</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php   echo ($temp); ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        luminosité</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php   echo ($lum); ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Humidité de l'air</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php   echo ($humair); ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Pluie </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Non </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

 




  
  
 
 
 
         
          </section> 
   </section>
  
 </section>
 
 <div class="row">

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Humidité au niveau du sol</h6>
            
        </div>
        <div id="chart-container">
      <canvas id="mycanvas"></canvas>
    </div>
    </div>
</div>

<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Taux humidité</h6>
            
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
            </div>
            
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php    echo" 55%"; ?></div>
                
            
        </div>
    </div>
    
   
</div>
</div>

<!-- Content Row -->

    <!-- javascript -->

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>

    <script src="js/demo/chart-pie-demo.js"></script>

 
 
   <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  
 
 
 
  
  
 </body>
 
 </html>