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
      <img src="img/carousel-1.jpg" alt="New York" width="2000" >
      <div class="carousel-caption">
        <h3>İLETİŞİM</h3>
      </div>      
    </div>
  </div>
  <!-- Container (Contact Section) -->
  <div class="container">
    <h3 class="text-center" style="font-size: 30px">İletişim</h3>
    <p class="text-center"><em>Bizimle iletişime geçin.</em></p>

    <div class="row" style="border-style: double; padding-top: 30px; margin-left: 0px;">
      <div class="col-md-4" style="padding: 5%;">
        <p>Bizimle Paylaş!</p>
        <p><span class="glyphicon glyphicon-map-marker"></span>Antalya,TURKEY</p>
        <p><span class="glyphicon glyphicon-phone"></span>Phone:0555 555 55 55</p>
        <p><span class="glyphicon glyphicon-envelope"></span>Email: mail@mail.com</p>
      </div>
      <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="col-md-8">
        <div class="row">
          <div class="col-sm-6 form-group">
            <input class="form-control" id="name" name="name" placeholder="name" type="text" required>
          </div>
          <div class="col-sm-6 form-group">
            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
          </div>
          <div class="col-sm-12 form-group">
            <input class="form-control" id="content" name="content" placeholder="content" type="text" required>
          </div>
        </div>
        <textarea class="form-control" id="comments" name="comments" placeholder="comments" rows="5"></textarea>
        <br>
        <div class="row">
          <div class="col-md-12 form-group">
            <button class="btn pull-right" name="message" type="submit">Send</button>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div><br><br>
  <?php 
   if (isset($_POST['message'])) {   
    $customerid = $_SESSION["customerid"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $content = $_POST["content"];
    $comments = $_POST["comments"];
    if(isset($_SESSION["customerid"])){
      $sqlmessage="INSERT INTO message (name,email,content,comments,customerid)
      VALUES('$name','$email','$content','$comments',$customerid)";
      if ($conn->query($sqlmessage) === TRUE) {
        echo "<script>alert('Your message is taken from us!');</script>";
        header("Location: index.php");
        exit;
      }
    }else{
     echo "<script>alert('you need to sign in to contact with us!');</script>";
    }
     }
  ?>
  <div class="container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48167.19253027008!2d28.712432173586024!3d41.0154201136153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa6c7af9b80dd%3A0xbf7ef8fe104affb1!2zS8O8w6fDvGvDp2VrbWVjZSBHw7Zsw7w!5e0!3m2!1str!2str!4v1564262754011!5m2!1str!2str" width="100%" height="300%" allowfullscreen></iframe>
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
             <p><button class="w3-button w3-teal" name='signin' type="submit">SIGN IN</button></p>
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
    if (isset($_POST['signin'])) {
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