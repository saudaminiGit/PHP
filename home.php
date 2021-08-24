<!DOCTYPE html>
<html>
<body>
<?php
$servername = "localhost";
$username = "saudamini";
$password = "smovesist@db16";
$database='test';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Id, Name, Role FROM admin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Id : " . $row["Id"]. " <br> Name : " . $row["Name"]. " <br> Role : " . $row["Role"]. "<br>";	
  }
} else {
	echo "0 results";
}
$conn->close();

//File CSV
$list = array (
  array("Saudamini", "Griffin" ,"Oslo", "Norway"),
  array("Glenn", "Quagmire", "Oslo", "Norway")
);

$file = fopen("contacts.csv","w");

foreach ($list as $line) {
  fputcsv($file, $line);
}

fclose($file);
?>
</body>
</html>