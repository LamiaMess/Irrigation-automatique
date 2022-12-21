<?php include_once './racine.php'; 
 
 session_start(); 
 include("db.php");
 ?> 
<?php
error_reporting(0);
 
$msg = "";
 
// If upload button is clicked ...
if (isset($_POST['upload'])) {
 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./images/" . $filename;
 
    $db = mysqli_connect("localhost", "root", "root", "proinfo");
 
    // Get all the submitted data from the form
    $sql1="SELECT  idproduit FROM produit  order by idproduit desc limit 1";
   
    $result = mysqli_query($db, $sql1);
    while ($row = mysqli_fetch_assoc($result)) {
      
          $LASTID=$row['idproduit'];
          
   
      
          }
      

    $sql = "UPDATE produit
    SET filename =  ('$filename') WHERE (idproduit='$LASTID')";
 
    // Execute query
    mysqli_query($db, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
      header('location:marketplace.php');
        
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
}
?>
<!DOCTYPE html>
<html>
   
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
      *{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

#content{
	width: 50%;
	justify-content: center;
	align-items: center;
	margin: 20px auto;
	border: 1px solid #cbcbcb;
}
form{
	width: 50%;
	margin: 20px auto;
}



    </style>
</head>
   
<body>
<body style="background-image: url('bg2.png');">
   <section id="container">
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
   header('location:index.php');
 }
 ?>  </ul>
         <!-- sidebar menu end-->
       </div>
     </aside>
     <legend>Ajouter un Produit à Marketplace</legend>
    <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
      
    </div>
    <div id="display-image">
    <?php
        $query = " select * from produit ";
        $result = mysqli_query($db, $query);
 
        while ($data = mysqli_fetch_assoc($result)) {
    ?>
        <img src="./images/<?php echo $data['filename']; ?>">
 
    <?php
        }
    ?>
    </div>
</body>
 
</html>