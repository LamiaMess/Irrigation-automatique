<?php include_once './racine.php'; 
 
 session_start(); 
 include("db.php");
 ?> 
  <!DOCTYPE html>
  <html  lang="en">
 
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   
   <title>Gestion des fermes</title>
 
   <!-- Favicons -->
   <link href="img/farm.jpg" rel="icon">
   <link href="img/farm.jpg" rel="apple-touch-icon">
 
   <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!--external css-->
   <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
   <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
   
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
 
 <body style="background-image: url('bg2.png');" >
   <section id="container">
     <!-- **********************************************************************************************************************************************************
         TOP BAR CONTENT & NOTIFICATIONS
         *********************************************************************************************************************************************************** -->
     <!--header start-->
  <?php  include('headers/head_agri.html');?>
     <!--header end-->
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

     <!-- **********************************************************************************************************************************************************
         MAIN CONTENT
         *********************************************************************************************************************************************************** -->
     <!--main content start-->
     <section id="main-content">
       <section class="wrapper">
      
     
         <form style="position: relative;margin: 200px;"method="GET" action="controller/addFerme.php">
            <fieldset>
             <legend>Ajouter une ferme</legend>
               <div class="form-group row">
                 <div class="form-group col-md-3">
                   <label for="name">Nom :</label>
                   <input type="text" name="nomferme" class="form-control" placeholder="Entrer le nom de ferme">
                 </div>
               </div>
              <div class="form-group row">
                 <div class="col-sm-12 text-left">
                   <button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
                   <button type="reset" class="btn btn-secondary btn-sm">Vider</button>
                 </div>
              </div>
            </fieldset>
         </form>
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
  
  
 </body>
 
 </html>