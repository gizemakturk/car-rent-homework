<!DOCTYPE html>
<html>
<head>
<title>RedCar Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../style.css" rel="stylesheet" type="text/css">
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
    <a href="adminlogin.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Log Out</a>
    
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <div class="w3-container w3-margin-top">
 
  <form name="formcars" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="container">
    <h1>ADD</h1>
    <img src="../img/car-rent-1.png"  width="30%" height="50%"><br><br>
     
     
      <hr>
      <i class="fa fa-image"></i> <label for="img"><b> Add Image</b></label>
      <input name="img" type="text"  placeholder="Add Image" required >

      <label for="model"><b>Car Model</b></label>
      <input name="model" type="text" placeholder="Car Name" required>
  
      <label for="brand"><b>Car Brand</b></label>
      <input name="brand" type="text" placeholder="Car Brand"  required>
  
      <label for="seat"><b>Car Number of Seat</b></label>
      <input name="seat" type="text" placeholder="Car Number of Seat" required>
  
      <label for="doors"><b>Car Number of Doors</b></label>
      <input name="doors" type="text" placeholder="Car Number of Doors" required>

      <label for="luggage"><b>Car Capatiy of Luggage</b></label>
      <input name="luggage" type="text" placeholder="Car Capatiy of Luggage" required>

      <label for="gear"><b>Car Gear Type</b></label>
      <input name="gear" type="text" placeholder="Car Gear Type" required>
      
      <label for="price"><b>Car Daily Price</b></label>
      <input name="price" type="text" placeholder="Car Daily Price" required>
      <hr>
      <button name="add" class="w3-button w3-teal" type="submit" class="registerbtn">Add Car</button>
    </div>
    
  </form>
  </div>

  <?php 
  require_once "../connect.php";
  $fnameErr = $addressErr = $emailErr = $cityErr = $stateErr= $zipErr=$cardnameErr= $cardnumberErr = $expmonthErr = $expyearErr= $cvvErr="";
  $fname = $email = $address =$city= $state=$zip= $cardname = $cardnumber = $expmonth =$expyear= $cvv="";
  if (isset($_POST['add'])) {  
    $validation = true;
    if (empty($_POST["model"])) {
      $modelErr = "Model is required";
      $validation = false;
    } else {
      $model = test_input($_POST["model"]);
  
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$model)) {
        $modelErr = "Only letters and white space allowed";
        $validation = false;
      }
    }
     if (empty($_POST["brand"])) {
      $brandErr = "Brand is required";
      $validation = false;
    } else {
      $brand = test_input($_POST["brand"]);
  
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$brand)) {
        $brandErr = "Only letters and white space allowed";
        $validation = false;
      }
    }

    if (empty($_POST["seat"])) {
      $seatErr = "Seat is required";
      $validation = false;
    } else {
      $seat = test_input($_POST["seat"]);
  
      // check if name only contains letters and whitespace
      if (!preg_match("/^[0-9]*$/",$seat)) {
        $seatErr = "Only letters and white space allowed";
        $validation = false;
      }
    }
    if (empty($_POST["doors"])) {
      $doorsErr = "Door is required";
      $validation = false;
    } else {
      $doors = test_input($_POST["doors"]);
  
      // check if name only contains letters and whitespace
      if (!preg_match("/^[0-9]*$/",$doors)) {
        $doorsErr = "Only letters and white space allowed";
        $validation = false;
      }
    }
    if (empty($_POST["luggage"])) {
      $luggageErr = "Luggage is required";
      $validation = false;
    } else {
      $luggage = test_input($_POST["luggage"]);
  
      // check if name only contains letters and whitespace
      if (!preg_match("/^[0-9]*$/",$luggage)) {
        $luggageErr = "Only letters and white space allowed";
        $validation = false;
      }
    }
    if (empty($_POST["gear"])) {
      $gearErr = "Gear is required";
      $validation = false;
    } else {
      $gear = test_input($_POST["gear"]);
  
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$gear)) {
        $gearErr = "Only letters and white space allowed";
        $validation = false;
      }
    }
    if (empty($_POST["price"])) {
      $priceErr = "Price is required";
      $validation = false;
    } else {
      $price = test_input($_POST["price"]);
  
      // check if name only contains letters and whitespace
      if (!preg_match("/^[0-9]*$/",$price)) {
        $priceErr = "Only letters and white space allowed";
        $validation = false;
      }
    }
    if (empty($_POST["img"])) {
      $imgErr = "img is required";
      $validation = false;
    } else {
      $img = test_input($_POST["img"]);
  
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-z0-9A-Z-' ]*$/",$img)) {
        $imgErr = "Only letters and white space allowed";
        $validation = false;
      }
    }
    $sqladddetail="INSERT INTO cardetails (numberofseat,numberofdoors,capatiyofluggage,geartype,dailyprice)
    VALUES ('$seat','$doors','$luggage','$gear','$price')";
        if ($conn->query($sqladddetail) === TRUE) {
          $adddetailid =mysqli_insert_id($conn);
          $caraddsql="INSERT INTO car (modelname,brandname,detailsid,image)
          VALUES ('$model','$brand',$adddetailid,'$img')";
          if ($conn->query($caraddsql) === TRUE) {
            echo '<script>window.location.href="vehicle.php"</script>';
          }
          
          
      } else {
          echo "Error: " . $sqladddetail . "<br>" . $conn->error;
      }
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
