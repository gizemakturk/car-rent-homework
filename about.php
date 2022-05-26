<?php
include 'connect.php';
session_start();
$sql="UPDATE views SET number = number + 1 WHERE viewsid=1";
if ($conn->query($sql) === TRUE) {
 }

?>
<!DOCTYPE html>
<html>
<head>
<title>REDCAR</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="style.css" rel="stylesheet" type="text/css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}

</style>
</head>
<body class="w3-light-grey">

<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-large">
  <a href="index.php" class="w3-bar-item w3-button w3-teal w3-mobile"><i class="fa fa-car w3-margin-right"></i>RedCar</a>
  <a href="cars.php" class="w3-bar-item w3-button w3-mobile">Cars</a>
  <a href="about.php" class="w3-bar-item w3-button w3-mobile">About</a>
  <a href="services.php" class="w3-bar-item w3-button w3-mobile">Services</a>
  <a href="contact.php" class="w3-bar-item w3-button w3-mobile">Contact</a>
  <?php if(!isset ($_SESSION["customerid"])){
   echo '<a onclick="document.getElementById(\'contact\').style.display=\'block\'" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Sign In</a>';
  }else{
    $sqlcustomer="SELECT firstname, lastname FROM customer WHERE customerid=" .$_SESSION["customerid"];
    $result = $conn->query($sqlcustomer);
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);}
    echo '<a  onclick="document.getElementById(\'contact\').style.display=\'block\'" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">'.$row['firstname'].' '.$row['lastname'].'</a>';

  }
  ?>
  <!-- Wrapper for slides -->
   <div class="carousel-inner">
    <div class="item active">
      <img src="img/carousel-2.jpg" alt="New York" width="2000" height="700">
      <div class="carousel-caption">
        <h3>HAKKIMIZDA</h3>
      </div>      
    </div>
  </div>
  <div class="w3-container w3-center" style="padding:128px 16px">
    <div class="w3-row-padding">
      <div class="w3-col m6">
        <img class="w3-image w3-round-xxlarge" src="img/gallery-1.jpg" width="500" height="500">
      </div>
      <div class="w3-col m6 ">
        <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">OUR MISSION</span><br><br><br>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>    
    </div>
  </div> 
  <!--MISSION AND VISION STATEMENTS-->
  <div class="w3-container w3-light-grey w3-center" style="padding:128px 16px">
    <div class="w3-row-padding">
      <div class="w3-col m6 text-center">    
        <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">OUR VISION</span><br><br><br>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
         </div>
      <div class="w3-col m6">
        <img class="w3-image w3-round-xxlarge" src="img/gallery-4.jpg" width="500" height="500">
      </div>
    </div>
  </div>
  <!--TEAM MEMBER SECTION -->
  <div class="container-fluid py-5 ">
    <div class="container pt-5 pb-3 ">
    <div class="w3-container">
        <div class="w3-row-padding" id="about">
        <div class="w3-center w3-padding-64">
          <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">TEAM MEMBERS</span>
        </div>    
        <div class="w3-third w3-margin-bottom">
          <div class="w3-card-4">
            <img src="img/team2.jpg" style = "width:100%">
            <div class="w3-container">
              <h3>Jane Doe</h3>
              <p class="w3-opacity">CEO & Founder</p>
              <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
              <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
            </div>
          </div>
        </div>
    
        <div class="w3-third w3-margin-bottom">
          <div class="w3-card-4">
            <img src="img/team1.jpg" style="width:100%">
            <div class="w3-container">
              <h3>Mike Ross</h3>
              <p class="w3-opacity">Art Director</p>
              <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
              <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
            </div>
          </div>
        </div>
    
        <div class="w3-third w3-margin-bottom">
          <div class="w3-card-4">
            <img src="img/team3.jpg" style="width:100%">
            <div class="w3-container">
              <h3>John Doe</h3>
              <p class="w3-opacity">Designer</p>
              <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
              <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
            </div>
          </div>
      </div>
    
    </div>
    </div>
    </div>
  </div>    
    <!-- Modal -->
    <div id="contact" class="w3-modal">
      <div class="w3-modal-content w3-animate-zoom">
        <div class="w3-container w3-black">
          <span onclick="document.getElementById('contact').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
          <h1>SIGN IN</h1>
        </div>
        
        <div class="w3-container">
          
          <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="email" required name="email"></p>
            <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="*******" required name="password"></p>
             <p><button class="w3-button w3-teal" type="submit">SIGN IN</button></p>
             <p><button class="w3-button w3-teal" type="button" onclick="window.location.href='register.php'">REGISTER</button></p>
              <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>
    <div class="" style="background-color:#f1f1f1">
      <button onclick="document.getElementById('contact').style.display='none'" type="button" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  
          </form>
          
        </div>
      </div>
    <?php 
    $email =$password= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $validation = true;
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $validation = false;
      } else {
        $email = test_input($_POST["email"]);
    
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          $validation = false;
        }
      }
      
     $password = $_POST["password"];
     
     if ($validation) {
     $encPasswordd= md5($password);
      $sql = "SELECT customerid, firstname FROM customer WHERE email='$email' and password='$encPasswordd'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          echo "login success";
      }else{
          echo 'password or email incorrect';
      }
     
    
      $conn->close();
     
    } else {
      echo "something wrong";
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
<footer class="w3-padding-32 w3-black w3-center w3-margin-top">
    <h5>Find Us On</h5>
    <div class="w3-xlarge w3-padding-16">
      <i class="fa fa-facebook-official w3-hover-opacity"></i>
      <i class="fa fa-instagram w3-hover-opacity"></i>
      <i class="fa fa-snapchat w3-hover-opacity"></i>
      <i class="fa fa-pinterest-p w3-hover-opacity"></i>
      <i class="fa fa-twitter w3-hover-opacity"></i>
      <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
   
  </footer>
</body>
</html>