<?php 
session_start(); 
include("db.php");
?>
<?php
$msg = ""; 
if (isset($_POST['submitBtnRegister'])) {
  # code...
 $name = trim($_POST['name']);
  $username = trim($_POST['username']);
  $password1 = trim($_POST['password1']);
   $password2 = trim($_POST['password2']);
  $email = trim($_POST['email']);
  $phone = trim($_POST['phone']);
   $usertype = trim($_POST['usertype']);
  
  if($username != "" && $password1 != ""&& $password2 != ""&& $email != ""&& $usertype != ""&& $password1 ==$password2) {
      
      $sql = "INSERT INTO users (name,username,password,email,phone,usertype) VALUES ('$name','$username','$password1','$email','$phone','$usertype')";
      $stmt= $db->prepare($sql);
      $stmt->execute();
      header('location: addferme1.php');
 

if($stmt===TRUE)
{
echo'Sign up successfully';
}           
else
{
  echo"The query did not run";
}  
 }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Plateforme fermes</title>
  <style>
* {
  box-sizing: border-box;
}
 
:root {
  --primary-color: #6CD9CE;
  --secondary-color: #D93BA1;
  --complimentary-color: #2E2473;
}
a.l:link, a.l:visited {
  background-color: white;
  color: black;
  padding: 14px 25px;
  padding-top: 2px;
  padding-bottom: 2px;
  text-align: center;
  font-size: 15px;
  text-decoration: none;
  border-radius: 8px;
  display: inline-block;

}

a.l:hover, a.l:active {
  background-color: white;
  color: black;

}

.container {
  min-height: 100vh;
  position: relative;
  width: 100vw;
  display: flex;
   justify-content: center;
  align-items: center;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
 position: relative;
}

h1 {
  font-size: 150px;
   transform: translateY(-600px);
  animation: 1.2s slideIn ease-in-out forwards 1s;
  z-index: 10;
  opacity: 0;
  position: relative;
}

h1::before {
    content: '';
    width: 0%;
    height: 76px;
     position: absolute;
    bottom: -10px;
    animation: 1s underline ease-in-out forwards 2s;
    mix-blend-mode: screen;
}

.overlay {
    position: absolute;
    width: 100%;
    top: 0;
    bottom: 0;
    opacity: 0;
    left: 0;
    right: 0;
    transform: scale(.5);
    animation: .5s slideIn ease-in-out forwards, 1s skewBg ease-in-out;
}

@keyframes skewBg {
  0% {
    transform: scale(.5);
  }
  100% {
    transform: scale(1);
  }
}

@keyframes underline {
  100% {
    width: 100%;
  }
}

@keyframes slideIn {
  100% {
    transform: translateY(0px);
    opacity: 1;
  }
}
body {
  margin: 0;
  font-family: Arial;
  font-size: 17px;
}



.content {
  position: fixed;
  bottom: 0;
 
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}

#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}

#myBtn:hover {
  background: #ddd;
  color: black;
}
</style>
  <!-- Favicons -->
  <link href="img/farm.jpg"  rel="icon">
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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <?php include 'headers/head_client.html';?>
   
   
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        
          <div class="text-center">
             <!-- Button HTML (to Trigger Modal) -->
        
        </div>

   
 
<!-- register -->
        
		<div class="register">
			<form action=" " method="post">
				<div class="modal-header">				
					<h4 class="modal-title">register</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">				
					  <div class="form-group">
            <label> name</label>
            <input type="text" class="form-control" name ="name" required="required">
          </div>
          <div class="form-group">
						<label>username</label>
						<input type="text" class="form-control" name ="username" required="required">
					</div>
          <div class="form-group">
            <label>email</label>
            <input type="text" class="form-control" name ="email" required="required">
          </div>
          <div class="form-group">
            <label>phone</label>
            <input type="text" class="form-control" name ="phone" required="required">
          </div>
					<div class="form-group">
						<div class="clearfix">
							<label>Password</label>
							 	</div>
						
                   <input type="password" name="password1" class="form-control" required="required">
					</div>
          <div class="form-group">
            <div class="clearfix">
              <label>Resaisir votre Password</label>
                </div>
            
                   <input type="password" name="password2" class="form-control" required="required">
          </div>
          <div class="form-group">
            <label>user type</label>
            <select class="form-control" name="usertype" required="required">
    <option value="admin">Administrateur</option>
    <option value="agriculteur">Agriculteur</option>
    <option value="manager">Manager</option>
  </select>
          <!--  <input type="text" class="form-control" name ="usertype" required="required">-->
          </div>
				</div>
				<div class="modal-footer justify-content-between">
				 	<input type="submit" style="background-color: #006600;"class="btn btn-primary"name="submitBtnRegister" value="Register">
				</div>
			</form>
      <p>Déjà inscrit?<a href="signin.php"  > Connectez-vous maintenant !</a></p>  
		</div>
	 
         
  </section>
</section>
</section>


  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
   <script>

var btn = document.getElementById("myBtn");


</script>
</body>

</html>
  