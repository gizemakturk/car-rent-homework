<?php
  $servername = "localhost";
  $d_username = "root";
 
  $dbname = "carrental";


  // Create connection
  $conn = new mysqli($servername, $d_username, null, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
?>