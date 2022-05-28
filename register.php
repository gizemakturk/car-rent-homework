<?php
include 'connect.php';
session_start();


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
#dob {
  display: block;
  width: 100%;
  height: 45px;
  margin-bottom: 5px;
}
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
<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="firstname"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="firstname" id="firstname" required>

    <label for="lastname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lastname" id="lastname" required>

    <label for="phonenumber"><b>Phone Number</b></label>
    <input type="text" placeholder="Enter Phone Number" name="number" id="phonenumber" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>
    
    <label for="gender"><b>Gender</b></label>
    <input type="text" placeholder="Enter Gender" name="gender" id="gender" required>

    <label for="dob"><b>DateofBirth</b></label>
    <input type="date" placeholder="Enter Date of Birth" name="dob" id="dob" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password" id="psw-repeat" required>
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

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="email" required name="email"></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="*******" required name="password"></p>
          <p><button name="login" class="w3-button w3-teal" type="submit">SIGN IN</button></p>
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
    // formdan alma
    require_once "connect.php";
$fnameErr = $lnameErr = $emailErr = $genderErr = $numberErr= $dobErr=$passwordErr= "";
$fname = $email = $gender =$number= $dob=$password= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  
  $validation = true;
  if (empty($_POST["firstname"])) {
    $fnameErr = "First Name is required";
    $validation = false;
  } else {
    $fname = test_input($_POST["firstname"]);

    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
      $validation = false;
    }
  }
  
   if (empty($_POST["lastname"])) {
      $lnameErr = "Last Name is required";
      $validation = false;
    } else {
      $lname = test_input($_POST["lastname"]);
  
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
        $lnameErr = "Only letters and white space allowed";
        $validation = false;
      }
    }
   
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
 
  if (empty($_POST["number"])) {
    $numberErr = "Phone Nubmer is required";
    $validation = false;
  } else {
    $number = test_input($_POST["number"]);

    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$number)) {
      $numberErr = "Only numbers and white space allowed";
      $validation = false;
    }
  }
  
  if (empty($_POST["dob"])) {
    $dobErr = "Date of Birth is required";
    $validation = false;
  } else {
    $dob = test_input($_POST["dob"]);
    
    
    // check if name only contains letters and whitespace
  }
  

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $validation = false;
  } else {
    $gender = test_input($_POST["gender"]);

  }

  $password = $_POST["password"];
  


if ($validation) {


  $encPasswordd= md5($password);
  $sql = "SELECT customerid, firstname, lastname,gender,dob,email,password,number FROM customer WHERE email='$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      echo "alredy registered";
  }else{
      $encPasswordd=md5($password);
      $sql = "INSERT INTO customer (firstname, lastname,gender,dob,email,password,number)
VALUES ('$fname', '$lname', '$gender','$dob','$email','$encPasswordd','$number')";

      if ($conn->query($sql) === TRUE) {
          echo "<script>document.getElementById('contact').style.display='block'</script>";
          
      } else {
        echo "<script>alert('Something went wrong!');</script>";

      }
  }
 

  $conn->close();
 
} else {
  echo "password or username incorrect";
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<?php
  $email = $password = "";
  if (isset($_POST["login"])) {
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
      $encPasswordd = md5($password);
      $sql = "SELECT customerid, firstname FROM customer WHERE email='$email' and password='$encPasswordd'";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["customerid"] = $row["customerid"];
        echo "<script> window.location.href='index.php'</script>";
      } else {
        echo 'password or email incorrect';
      }


     // $conn->close();
    } else {
      echo "something wrong";
    }
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