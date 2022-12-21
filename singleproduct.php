
<?php include_once './racine.php'; 
 
 session_start(); 
include("db.php");
 ?>  
 
  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- displays site properly based on user's device -->

  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
 

  <link rel="stylesheet" href="./css/style.css">
  <script src="./js/script.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa5IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Single product page</title>

</head>

<body style="background-image: url('bg2.png');" >

<?php  include('headers/head_agri.html');?>


<?php
   
$hostname="localhost";
$username="root";
$password="root";
$db = "proinfo";
$dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
include_once RACINE . '/service/produitService.php'; 
include_once RACINE . '/service/planteService.php';
include_once RACINE . '/service/categorieService.php';

$e = new produitService();

foreach($dbh->query("SELECT *
FROM produit,plante,users,categorie
WHERE (produit.idcategorie=categorie.idcategorie)   AND users.username='".$_SESSION['sess_username']."' order by idproduit desc  Limit 1")
as $row) {
echo"";
}

  ?> 

  <div class="container">
  <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="images/<?php echo($row['filename']);?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: BST-498</div>
                        <h1 class="display-5 fw-bolder"> <?php echo($row['nomproduit']);?></h1>
                       
                        <p class="lead"><?php echo($row['description']);?></p>
                       
                       
  <div class="mb-3 row">
    <label for="static" class="col-sm-6 col-form-label" style="background-color: darkgrey; ">Catégorie </label>
    <div class="col-sm-5">
      <input type="text" readonly class="form-control-plaintext" id="static" value="<?php echo($row['nomcategorie']);?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="static" class="col-sm-6 col-form-label" style="background-color: darkgrey; ">Quantité disponible /Kg</label>
    <div class="col-sm-5">
      <input type="text" readonly class="form-control-plaintext" id="static" value="<?php echo($row['quantite']);?>">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="static" class="col-sm-6 col-form-label" style="background-color: darkgrey; ">Nom d'Agriculteur</label>
    <div class="col-sm-5">
      <input type="text" readonly class="form-control-plaintext" id="static" value="<?php echo($row['username']);?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="static" class="col-sm-6 col-form-label" style="background-color: darkgrey; ">Numéro de télephone</label>
    <div class="col-sm-5">
      <input type="text" readonly class="form-control-plaintext" id="static" value="<?php echo($row['phone']);?>">
    </div>
  </div>
                       
                    </div>
                </div>
            </div>
        </section>
   
    </div>
  </div>

 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>