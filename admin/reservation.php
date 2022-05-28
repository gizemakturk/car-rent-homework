<?php
include '../connect.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>RedCar Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">
    <style>
        
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:teal;
  color: white;
}
    </style>

<!-- Top container -->
<div class="w3-bar w3-top w3-teal w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
   
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Gizem</strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-home fa-fw"></i>Home</a>
    <a href="vehicle.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-car fa-fw"></i> Vehicles</a>
    <a href="reservation.php" class="w3-bar-item w3-button w3-padding w3-teal"><i class="fa fa-calendar fa-fw"></i>  Reservations</a>
    <a href="message.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-envelope-open"></i>  Messages</a>
    <a href="adminlogin.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Log Out</a>
    
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b>RESERVATIONS</b></h5>
  </header>

  <div class="w3-row-padding w3-center w3-padding-64">
      
<table id="customers">
    <tr>
      <th>User</th>
      <th>Car</th>
      <th>Date</th>
      <th>Price</th>
      <th></th>
    </tr>
  <tbody id="reservations">
  </tbody>
  </table>
  </div>
  <hr><hr><hr><hr><hr><hr><hr><hr><hr><hr>
  <!--Modal-->
  <div id="info" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom">
      <div class="w3-container w3-teal">
        <span onclick="document.getElementById('info').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
        <h1>Detailed Information</h1>
      </div>
      <div class="w3-container">
        <p>Information about the rezervation.</p><br>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </p>
        <?php 
        if(isset($_GET["delete"])){
          $deletesql="DELETE FROM rent WHERE rentid=".$_GET["delete"];
          if ($conn->query($deletesql) === TRUE) {
            echo "Delete  successfully";
            
            
        } else {
            echo "Error: " . $deletesql . "<br>" . $conn->error;
        }
        }
         $sqlrent="SELECT * FROM rent";
         $result = $conn->query($sqlrent);
         $tablereservation = "";
        while($row = mysqli_fetch_assoc($result)) {
        $customerid=$row["customerid"];
        $carid=$row["carid"];
        $date=$row["startdate"]."     ".$row["enddate"];
        $invoinceid=$row["invoinceid"];
        $sqlcustomer="SELECT firstname,lastname FROM customer WHERE customerid=".$customerid;
        $result1 = $conn->query($sqlcustomer);
        $row1 = mysqli_fetch_assoc($result1);
        $fname=$row1["firstname"];
        $lname=$row1["lastname"];
        $sqlcar="SELECT modelname,brandname FROM car WHERE carid=" . $carid;
        $result2 = $conn->query($sqlcar);
        $row2 = mysqli_fetch_assoc($result2);
        $bname=$row2["brandname"];
        $mname=$row2["modelname"];
        $sqlinvoice="SELECT amount FROM invoince WHERE invoiceid=" . $invoinceid;
        $result3 = $conn->query($sqlinvoice);
        $row3 = mysqli_fetch_assoc($result3);
        $amount=$row3["amount"];

        $tablereservation = $tablereservation . "<tr>\
        <td>".$fname . " " . $lname."</td>\
        <td>" . $bname . " " . $mname."</td>\
        <td>".$date."</td>\
        <td>".$amount."</td>\
        <td><form>\
        <button name='delete' onclick='reload();' type='submit' value='". $row["rentid"] ."' class='w3-button w3-red w3-padding-small'><i class='fa fa-close'></i> Delete</button></form></td>\
      </tr>";
        }
        
        echo "<script>
        document.getElementById('reservations').innerHTML =\"$tablereservation\";
      </script>";

        ?>
      </div>
    </div>
  </div>

</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}
function showInfo() {
  document.getElementById('info').style.display='block';
}
function reload() {
  window.location.reload();
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
