

<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'proinfo');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}
//query to get data from the table
$query = sprintf("SELECT tauxhumidite,temperature,temperatureresentie,humsol1,humsol2,humsol3,humair,luminosite,timestamp  FROM datacap WHERE (DATE(`timestamp`) = CURDATE() ) ORDER BY iddatacap DESC");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
if (is_array($result) || is_object($result))
{
	foreach ($result as $row) {
		$data[] = $row;
	  }
}
else // If $myList was not an array, then this block is executed. 
{
  echo "Unfortunately, an error occured.";
}



//close connection
$mysqli->close();
//now print the data
print json_encode($data);