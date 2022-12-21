<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "watering";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
extract($_GET);
echo $idferme;
$sql ="UPDATE ferme SET nomferme='hhhhhh' where idferme='".$idferme."'";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
                            
header("location:../proinfo/afficherFerme.php");

