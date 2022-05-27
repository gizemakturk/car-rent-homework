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
    <a href="vehicle.php" class="w3-bar-item w3-button w3-padding w3-teal"><i class="fa fa-car fa-fw"></i> Vehicles</a>
    <a href="reservation.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar fa-fw"></i>  Reservations</a>
    <a href="message.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-envelope-open"></i>  Messages</a>
    <a href="adminlogin.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Log Out</a>
    
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:60px">
    <h5><b>VEHICLES</b></h5>
    <a href="car_settingsadd.php" class="w3-button w3-teal w3-padding-large"><i class="fa fa-cog"></i> Add New Car </a>
  </header>

  <div id="cars" class="w3-row-padding w3-center w3-padding-16" >

  </div>

  <?php
  $sql = "SELECT * from car";
  $result = $conn->query($sql);
  $carstring = "";
  
  while($row = mysqli_fetch_assoc($result)) {
   $carid=$row["carid"];
    $sqlcardetails="SELECT * FROM cardetails where detailsid=" . $row["detailsid"];
        $detailresult = $conn->query($sqlcardetails);
        $detailrow = mysqli_fetch_assoc($detailresult);
        $carstring = $carstring . "<div class='w3-third w3-margin-bottom'>\
        <ul class='w3-ul w3-border w3-hover-shadow'>\
          <li class='w3-theme'>\
          <img src='" . $row["image"] . "' style='width:100%'>\
          </li>\
          <li class='w3-padding-16'><b>". $row["brandname"] . " - " .$row["modelname"] ."</b> </li>\
          <li class='w3-padding-16'><b>" . $detailrow["numberofseat"] . "</b> Number of Seat</li>\
          <li class='w3-padding-16'><b>" . $detailrow["numberofdoors"] . "</b> Number of Doors</li>\
          <li class='w3-padding-16'><b>" . $detailrow["capacityofluggage"] . "</b> Capacity of Luggage</li>\
          <li class='w3-padding-16'><b>" . $detailrow["geartype"] . "</b> Gear Type </li>\
          <li class='w3-padding-16'>\
            <h2 class='w3-wide'><i class='fa fa-usd'></i> ".  $detailrow["dailyprice"] ."</h2>\
            <span class='w3-opacity'>per day</span>\
          </li>\
          <li class='w3-theme-l5 w3-padding-24'>\
          <form><a href='car_settingsupdate.php?carid=" . $carid . "' class='w3-button w3-teal w3-padding-large'><i class='fa fa-cog'></i> Update</a>\
          <button name='delete' type='submit' value='". $carid ."' class='w3-button w3-red w3-padding-large'><i class='fa fa-close'></i> Delete</button></form>\
        </li>\
        </ul>\
      </div> ";
     
  }
  echo "<script>
    document.getElementById('cars').innerHTML =\"$carstring\";
  </script>";

  if(isset($_GET["delete"])){
    $deletesql="DELETE FROM car WHERE carid=".$_GET["delete"];
    if ($conn->query($deletesql) === TRUE) {
      echo "Delete  successfully";
      
  } else {
      echo "Error: " . $deletesql . "<br>" . $conn->error;
  }
  }
  ?>

  <!-- Footer -->
  <footer class="w3-padding-32 w3-gray w3-center w3-margin-top">
    <h5>Find Us On</h5>
    <div class="w3-xlarge w3-padding-16">
    </div>
   
  </footer>
  <!-- End page content -->
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

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
