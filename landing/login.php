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
        
        header('location: ../manager/myspace2.php');
        
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
      header('location: ../addferme1.php');
 

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
<html>
<head>
    <link rel="stylesheet" href="css/style1.css">
   
</head>

<body>

<div class="container">
<div class="card">
<div class="inner-box" id="card">
<div class="card-front">
    <h2>Connexion</h2>
    <?php 
        if(isset($msg)) 
        {
          echo '<label class="text-danger"></label>';
        }
        ?>
    <form method="post">
        <input type="text" name ="username"class="input-box" placeholder="Username" required>
        <input type="password" name ="password" class="input-box" placeholder="Mot de passe" required>
        <button type="submit" class="submit-btn" name="submitBtnLogin">Se connecter</button>
        <input type="checkbox"><span>se souvenir de moi</span>
    </form>
    <button type="button" class="btn" onclick="openInscription()">Première connexion?</button>
    <a href="">Mot de passe oublié</a>
    
    
</div>
<div class="card-back">
    <h2>Inscription</h2>
    <form>
        <input type="text" class="input-box" name ="name" placeholder="Nom et Prénom" required>
        <input type="text" class="input-box" name ="username" placeholder="Nom et Prénom" required>
        <input type="text" class="input-box" name ="phone" placeholder="Numéro de télephone" required>
        <input type="email" class="input-box" name ="email"placeholder="Email" required>
        <input type="password" class="input-box" name ="password1"placeholder="Mot de passe" required>
        <input type="password" class="input-box" name ="password2"placeholder="Ressaisir le Mot de passe" required>
       
        <div class="form-group">
            <label>user type</label>
            <select class="form-control" name="usertype" required="required">
    <option value="admin">Administrateur</option>
    <option value="agriculteur">Agriculteur</option>
    <option value="manager">Manager</option>
  </select>
          <!--  <input type="text" class="form-control" name ="usertype" required="required">-->
          </div>
          <button type="submit" class="submit-btn" name="submitBtnRegister" value="Register">Enregistrer</button>
        <input type="checkbox"><span>se souvenir de moi</span>
    </form>
    <button type="button" class="btn" onclick="openConnexion()">J'ai déja un compte</button>
    <a href="">Mot de passe oublié</a>
    
    </div>
          
    </div>
    </div>
    </div>
    <script>
        var card = document.getElementById("card");
        function openInscription(){
            card.style.transform="rotateY(-180deg)";
        
        }
        function openConnexion(){
            card.style.transform="rotateY(0deg)";
        }
    
    </script>
    </body>
        
</html>