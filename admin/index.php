<?php
include '../connect.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>REDCAR ADMIN</title>
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
    <a href="index.php" class="w3-bar-item w3-button w3-padding w3-teal"><i class="fa fa-home fa-fw"></i>Home</a>
    <a href="vehicle.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-car fa-fw"></i> Vehicles</a>
    <a href="reservation.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar fa-fw"></i>  Reservations</a>
    <a href="adminlogin.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Log Out</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<?php
$sqlcar="SELECT COUNT(*) AS carnum from car";
$result=$conn->query($sqlcar) ;
  $row =mysqli_fetch_assoc($result);
  $carnumber=$row["carnum"];

  $sqlviews="SELECT number from views ";
$result=$conn->query($sqlviews) ;
  $row =mysqli_fetch_assoc($result);
  $viewnumber=$row["number"];

  $sqlbook="SELECT COUNT(*) AS book from rent";
$result=$conn->query($sqlbook) ;
  $row =mysqli_fetch_assoc($result);
  $booknumber=$row["book"];

  $sqlcustomer="SELECT COUNT(*) AS customernum from customer";
$result=$conn->query($sqlcustomer) ;
  $row =mysqli_fetch_assoc($result);
  $customernumber=$row["customernum"];
?>
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h2><b><i class="fa fa-home"></i> HOME</b></h2>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $carnumber ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Car Numbers</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $viewnumber ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Views</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $booknumber ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Number Of Bookings</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $customernumber ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>

  <div class="w3-container" id="recent">
    
    
  </div>
  <?php 
  $recentbook = "SELECT * FROM rent ORDER BY 'rentid' DESC";
  $result=$conn->query($recentbook) ;
  $counter = 1;
  $html = "<h2>Recent Bookings</h2>";
  while($row =mysqli_fetch_assoc($result)){

    $customerid=$row["customerid"];
    $invoinceid=$row["invoinceid"];

    $recentinvoince = "SELECT paymentdate FROM invoince WHERE invoiceid=". $invoinceid;
    $result1=$conn->query($recentinvoince) ;
    $row1 =mysqli_fetch_assoc($result1);
    $paymentdate=$row1["paymentdate"];

    $recentcustomer = "SELECT firstname, lastname FROM customer WHERE customerid=". $customerid;
    $result2=$conn->query($recentcustomer) ;
    $row2 =mysqli_fetch_assoc($result2);
    $customerfullname=$row2["firstname"] . " " . $row2["lastname"];

    $html = $html . "<div class='w3-row'>\
    <div class='w3-col m2 text-center'>\
      <img  src='../img/car-rent-". $counter . ".png' style='width:160px;height:96px'>\
    </div>\
    <div class='w3-col m10 w3-container'>\
      <h4>". $customerfullname . " <span class='w3-opacity w3-medium'>". $paymentdate . "M</span></h4>\
      <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>\
    </div>\
  </div>";

    $counter = $counter + 1;
    if($counter > 2) {break;}
  }
  echo "<script>
    document.getElementById('recent').innerHTML =\"$html\";
  </script>";
  ?>
  <hr>
  <div class="w3-container">
    <h2>General Stats</h2>
    <p>New Visitors</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
    </div>
    <p>New Users</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
    </div>
    <p>Bounce Rate</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
    </div>
  </div>
  <hr>

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
