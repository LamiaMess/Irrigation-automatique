<?php include_once './racine.php'; 
 
 session_start(); 
 include("db.php");
 ?> 
<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "root", "proinfo");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$nomproduit = mysqli_real_escape_string($db, $_POST['nomproduit']);
      $description = mysqli_real_escape_string($db, $_POST['description']);
      
      $quantite = mysqli_real_escape_string($db, $_POST['quantite']);
     
      


  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO produit (nomproduit, description,quantite,filename) VALUES ('$nomproduit','$description','$quantite','$image')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM produit");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['filename']."' >";
      	echo "<p>".$row['nomproduit']."</p>";
          echo "<p>".$row['nomproduit']."</p>";
          echo "<p>".$row['categorie']."</p>";
          echo "<p>".$row['quantite']."</p>";
         
      echo "</div>";
    }
  ?>
  <form method="POST" action="test.php" enctype="multipart/form-data">
  <div class="form-group row">
                                     <div class="form-group col-md-6">
                                       <label for="name">Nom du produit:</label>
                                       <input type="text" name="nomproduit" class="form-control" placeholder="Entrer le nom du produit">
                                     </div>
                                     <div class="form-group col-md-6">
                                       <label for="name">description :</label>
                                       <input type="int" name="description" class="form-control" placeholder="Entrer une description du produit">
                                     </div>
                                     <div class="form-group col-md-6">
                                       <label for="name">Quantité en Kg:</label>
                                       <input type="int" name="quantite" class="form-control" placeholder="Entrer la quantité disponible">
                                     </div>
                                   </div>
                               
                                   
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>