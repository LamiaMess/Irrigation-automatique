<?php 
session_start(); 
include("../db.php");

$msg = ""; 
if(isset($_POST['submitBtnLogin'])) {
  
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	if($username != "" && $password != "") {
    
		try {
			$query = "select * from `users` where `username`=:username and `password`=:password";
			$stmt = $db->prepare($query);
			$stmt->bindParam('username', $username, PDO::PARAM_STR);
			$stmt->bindValue('password', $password, PDO::PARAM_STR);
			$stmt->execute();
			$count = $stmt->rowCount();
			$row   = $stmt->fetch(PDO::FETCH_ASSOC);
			if($count == 1 && !empty($row)) {
				/******************** Your code ***********************/
        if($row['usertype']=="admin"){
				$_SESSION['sess_user_id']   = $row['iduser'];
				$_SESSION['sess_username'] = $row['username'];
				$_SESSION['sess_name'] = $row['name'];
        
				header('location:admin.php');
                
      }elseif ($row['usertype']=="agriculteur") {
        # code...
        $_SESSION['sess_user_id']   = $row['iduser'];
        $_SESSION['sess_username'] = $row['username'];
        $_SESSION['sess_name'] = $row['name'];
        
        header('location: ../myspace.php');
        
      }
      elseif ($row['usertype']=="manager") {
        # code...
        $_SESSION['sess_user_id']   = $row['iduser'];
        $_SESSION['sess_username'] = $row['username'];
        $_SESSION['sess_name'] = $row['name'];
        
        header('location: ../manager/manage.php');
        
      }

			} else {
				$msg = "Invalid username and password!";
			}
		} catch (PDOException $e) {
			echo "Error : ".$e->getMessage();
		}
	} else {
		$msg = "Both fields are required!";
	}
}else {

    echo(''); 
}


 

?>

<!DOCTYPE html>
<html lang="en">

<head>
 
 
  <!-- Favicons -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plateforme d'irrigation automatique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
         
  
</head>

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
       
   
   
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        
          <div class="text-center">
             <!-- Button HTML (to Trigger Modal) -->
        
        </div>


 




<!-- LOGIN HTML -->

		<div class="" style="width: 600px; border: 3px solid #c3c3c3;
 
 position: absolute;
margin-left: auto;
margin-right: auto;
left: 0;
right: 0;
text-align: center;">
			<form  method="post" style="align-content: center; position: absolute;
margin-left: auto;
margin-right: auto;
left: 0;
right: 0;
text-align: center;">
				<div class="modal-header">				
					<h4 class="modal-title">Login</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
        <?php 
        if(isset($msg)) 
        {
          echo '<label class="text-danger"></label>';
        }
        ?>
				<div class="modal-body">				
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name ="username" required="required">
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label>Password</label>
							 	</div>
						
                                            <input type="password" name="password" class="form-control" required="required">
					</div>
				</div>
				<div class=" justify-content-between">
					<input type="submit" style="background-color: #006600;"class="btn btn-primary"name="submitBtnLogin" value="Login">
				</div>
			</form>
		</div>
	    
 

         
  </section>
</section>
</section>



  <!-- js placed at the end of the document so the pages load faster -->
 
   <script>

var btn = document.getElementById("myBtn");


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>

