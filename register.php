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
  <a button onclick="document.getElementById('contact').style.display='block'"class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Sign In</a>
</div>

<!--Register-->
<form action="/action_page.php">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="firstname"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="firstname" id="firstname" required>

    <label for="lastname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lastname" id="lastname" required>

    <label for="phonenumber"><b>Phone Number</b></label>
    <input type="text" placeholder="Enter Phone Number" name="phonenumber" id="phonenumber" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button class="w3-button w3-teal" type="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>
  <!-- Modal -->
  <div id="contact" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom">
      <div class="w3-container w3-black">
        <span onclick="document.getElementById('contact').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
        <h1>SIGN IN</h1>
      </div>
      <div class="w3-container">
        <p>Reserve a table, ask for today's special or just send us a message:</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="User Name" required name="UserName"></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="*******" required name="Password"></p>
           <p><button class="w3-button w3-teal" type="submit">SIGN IN</button></p>
            <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
  <div class="" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>

        </form>
      </div>
    </div>
 
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