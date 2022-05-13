<?php
$servername = "localhost";
$root = "root";


// Create connection
$conn = new mysqli($servername, $root);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>