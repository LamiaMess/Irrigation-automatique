<?php 
include_once '../racine.php'; 
 
 session_start(); 
 /*include("db.php");*/
 ?> 
 
 
 
 
 <?php 
  
 include("../connexion/connect.php");
 ?>
 <?php
 $msg = ""; 
 if(isset($_POST['m'])) {
   
 $sql = "UPDATE arrosage SET arroser='m'";
 
 if ($mysqli->query($sql) === TRUE) {
 
 } else {
   echo "Error: " . $sql . "<br>" . $mysqli->error;
 }
 
 
 
 
   }elseif (isset($_POST['n'])) {
   
 $sql = "UPDATE arrosage SET arroser='n'";
 
 if ($mysqli->query($sql) === TRUE) {
 
 } else {
   echo "Error: " . $sql . "<br>" . $mysqli->error;
 }
 
 
 
 
   }
  
 $mysqli->close();
 ?>
 
 
 
 
 
 
 
  <!DOCTYPE html>
  <html  lang="en">
 
 <head>
       <meta http-equiv="refresh" content="2">
 
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="Dashboard">
   <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
   <title>Gestion des fermes</title>
 
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
   <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
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
 
 a:active {
   text-decoration: underline;
   
 }
         </style>
   <!-- =======================================================
     Template Name: Dashio
     Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
     Author: TemplateMag.com
     License: https://templatemag.com/license/
   ======================================================= -->
 </head>
 
 <body style="background-image: url(' ');"  >
   <section id="container">
     <!-- **********************************************************************************************************************************************************
         TOP BAR CONTENT & NOTIFICATIONS
         *********************************************************************************************************************************************************** -->
     <!--header start-->
     <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <a href="#" onclick="toggle_visibility('aside');"  ><div id="foo" class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div> </a>
        </div>
        <!--logo start-->
        <a href="admin.php" class="logo"><b >GESTION DES FERMES</b></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
          <!--  notification start -->
          <ul class="nav top-menu" style="margin-right:212px; ">
            <!-- settings start -->
      <li><a href='../index.php'  >Home</a></li>
      <li><a  href='../myspace.php'  >Mon Espace</a></li>
      <li><a href='../territoire.php'  >Territoires</a></li>
      <li><a   href='../plantes.php'  >Plantes</a></li>
      <li><a   href='../imgsat.php'  >Imagerie Satellitaire</a></li>
         </ul>
        </div>
      </header>
     <!--header end-->
     <!-- **********************************************************************************************************************************************************
         MAIN SIDEBAR MENU
         *********************************************************************************************************************************************************** -->
     <!--sidebar start-->
     <aside id="aside">
       <div id="sidebar" class="nav-collapse ">
         <!-- sidebar menu start-->
         <ul class="sidebar-menu" id="nav-accordion">
           <p class="centered"><a href="profile.php"><img src="img/abdoo.jpg" class="img-circle" width="150"></a></p>
           <?php 
  
 if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
   echo '<h5 style="color:black;"class="centered">Bienvenue '.$_SESSION['sess_name'].'</h5>';
   
 } else { 
    
   header('location: index.php');
   
 }
 ?>
           <li style="margin-top: 60px;"> 
 
             <h5 class="centered"  ><a style="color:black; font-size: 15px; background-color: white;height:  30px;" class="l" href="profile.php"><img src="img/profile.png" alt="Avatar" class="avatar">   Profile</a></h5></li>
           
           <li > <a  class="centered" style="margin-top: 90px;" href="logout.php"> <strong style="color: black;text-align: center;font-size: 15px;text-decoration: underline;">Logout</strong></a> </li>
         </ul>
         <!-- sidebar menu end-->
       </div>
     </aside>
 
 
 
 
 
 
 
 
 
 <section id="main-content">
       <section class="wrapper"  >
 <?php
 include("../connexion/connect.php");   
  
   $sql= "SELECT * FROM grandeur,zone ORDER BY `datee` DESC" ;
 
   
   // Perform query
  
 ?>
 
 
 
  <table  cellspacing="1" cellpadding="1">
     <tr>
       <td>&nbsp;Zones&nbsp;</td>
       <td>&nbsp;Température &nbsp;</td>
       <td>&nbsp;Humiditée &nbsp;</td>
       <td>&nbsp;Luminosité &nbsp;</td>
       <td>&nbsp;Marche&nbsp;</td>
       <td>&nbsp;Arrét&nbsp;</td>
       <td>&nbsp;Commencer l'arrosage&nbsp;</td>
 
 
     </tr>
 
       <?php 
       if($result = $mysqli -> query($sql)){
 
          $row = $result -> fetch_array(MYSQLI_ASSOC);?>
             <tr><td> <?php echo $row["nomzone"]; ?></td><td> <?php echo $row["temperature"];  ?></td><td> <?php echo $row["humidity"];  ?> </td><td> <?php echo $row["luminosity"] ; ?> </td>
               <td> 
               <form   method="post">
             <input id="marche" type="hidden" name="marche" value="m" />
             <input class="btn btn-success" type="submit" name="m" value="marche" />
         </form></td>
         <td> 
           <form  method="post">
 
             <input id="arret"  type="hidden" name="arret" value="n" />
              <input class="btn btn-danger" type="submit" name="n" value="arret" />
         </form> </td>
 
 
 
       <td> 
           <form  action="hamza.py" method="post">
 
             <input id="arret"  type="hidden" name="arret" value="n" />
              <input class="btn btn-danger" type="submit"   value="arret" />
         </form> </td></tr>
             
          
               // Free result set
        
 <?php
       $mysqli -> close();
             }
       ?>
 
    </table>
  
 
 
 
         
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
   <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
 
  
    <script type="application/javascript">
     $(document).ready(function() {
       $("#date-popover").popover({
         html: true,
         trigger: "manual"
       });
       $("#date-popover").hide();
       $("#date-popover").click(function(e) {
         $(this).hide();
       });
 
       $("#my-calendar").zabuto_calendar({
         action: function() {
           return myDateFunction(this.id, false);
         },
         action_nav: function() {
           return myNavFunction(this.id);
         },
         ajax: {
           url: "show_data.php?action=1",
           modal: true
         },
         legend: [{
             type: "text",
             label: "Special event",
             badge: "00"
           },
           {
             type: "block",
             label: "Regular event",
           }
         ]
       });
     });
 
     function myNavFunction(id) {
       $("#date-popover").hide();
       var nav = $("#" + id).data("navigation");
       var to = $("#" + id).data("to");
       console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
     }
   </script>
  
     <script type="text/javascript">
 
     function toggle_visibility(id) {
        var e = document.getElementById(id);
        if(e.style.display == 'block')
           e.style.display = 'none';
        else
           e.style.display = 'block';
     }
 //-->
 </script>
 
  
 <script type="text/javascript">
 function GetArduinoInputs(){ //DEMO
   updateGraph(150,150+150,300+150,450+150,800,1023);
   setTimeout('GetArduinoInputs()',document.getElementById('dur').value);
 }
  function SendArduinoInputs(){ //DEMO
   updateGraph(Math.random()*150,150+Math.random()*150,300+Math.random()*150,450+Math.random()*150,Math.random()*800,Math.random()*1023);
   setTimeout('GetArduinoInputs()',document.getElementById('dur').value);
 }
  
 var canvas = document.getElementById('myCanvas');
 var ctx = canvas.getContext('2d');
 myCanvas.style.border = "black 1px solid";
 var aval0=[], aval1=[], aval2=[], aval3=[], aval4=[], aval5=[]; 
 
 for(cnt=0; cnt<18; cnt++){
   aval0[cnt]=0;
   aval1[cnt]=0;
   aval2[cnt]=0;
   aval3[cnt]=0;
   aval4[cnt]=0;
   aval5[cnt]=0;
 }
 
 function drawGraph(){initGraph(); updateGraph(0,0,0,0,0,0); GetArduinoInputs();}
 
 function initGraph(){
   ctx.fillStyle="green";
   ctx.font = "20px serif";
   ctx.textAlign = "center";
   ctx.fillText("Grandeurs atmosphèriques en fonction du temps",290,30);
 }
     
 function updateGraph(val0, val1, val2, val3, val4, val5){
   ctx.clearRect(0, 30, canvas.width, canvas.height);
   aval0.shift(); aval0.push(val0*2/10.23);
   aval1.shift(); aval1.push(val1*2/10.23);
   aval2.shift(); aval2.push(val2*2/10.23);
   aval3.shift(); aval3.push(val3*2/10.23);
   aval4.shift(); aval4.push(val4*2/10.23);
   aval5.shift(); aval5.push(val5*2/10.23);
   if(document.getElementById('c0').checked)drawPlot(0);
   if(document.getElementById('c1').checked)drawPlot(1);
   if(document.getElementById('c2').checked)drawPlot(2);
   if(document.getElementById('c3').checked)drawPlot(3);
   if(document.getElementById('c4').checked)drawPlot(4);
   if(document.getElementById('c5').checked)drawPlot(5);
 }
 
 function drawPlot(barSel){
   ctx.save();
   ctx.beginPath();
   ctx.lineWidth = 1;
   ctx.strokeStyle = 'white';
   for(cnt=1; cnt<9; cnt++){
     ctx.setLineDash([1,1]);
     ctx.moveTo(0,75+cnt*25);
     ctx.lineTo(525,75+cnt*25);
     ctx.stroke();
   }
   for(cnt=1; cnt<18; cnt++){
     ctx.moveTo(0+cnt*30,90);
     ctx.lineTo(0+cnt*30,300);
     ctx.stroke();
   }
   ctx.restore();
   ctx.beginPath();
   switch(barSel){
     case 0 : ctx.moveTo(0,300-aval0[0]); break;
     case 1 : ctx.moveTo(0,300-aval1[0]); break;
     case 2 : ctx.moveTo(0,300-aval2[0]); break;
     case 3 : ctx.moveTo(0,300-aval3[0]); break;
     case 4 : ctx.moveTo(0,300-aval4[0]); break;
     default : ctx.moveTo(0,300-aval5[0]); 
   }
   for(cnt=1; cnt<18; cnt++){
     switch(barSel){
       case 0 : ctx.lineTo(cnt*30,300-aval0[cnt]); ctx.strokeStyle = 'red'; break;
       case 1 : ctx.lineTo(cnt*30,300-aval1[cnt]); ctx.strokeStyle = 'red'; break;
       case 2 : ctx.lineTo(cnt*30,300-aval2[cnt]); ctx.strokeStyle = 'red'; break;
       case 3 : ctx.lineTo(cnt*30,300-aval3[cnt]); ctx.strokeStyle = 'red'; break;
       case 4 : ctx.lineTo(cnt*30,300-aval4[cnt]); ctx.strokeStyle = 'red'; break;
       default : ctx.lineTo(cnt*30,300-aval5[cnt]); ctx.strokeStyle = 'red';
     }
     ctx.lineWidth = 3;
     ctx.stroke();
   }
 }
 </script>
 
 
  
  
 </body>
 
 </html>