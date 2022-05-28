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
  <style>
    body {
      font-family: Arial;
      font-size: 17px;
    }

    * {
      box-sizing: border-box;
    }

    .row {
      display: -ms-flexbox;
      /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap;
      /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
    }

    .col-25 {
      -ms-flex: 25%;
      /* IE10 */
      flex: 25%;
    }

    .col-50 {
      -ms-flex: 50%;
      /* IE10 */
      flex: 50%;
    }

    .col-75 {
      -ms-flex: 75%;
      /* IE10 */
      flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }

    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }

    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    a {
      color: #2196F3;
    }

    hr {
      border: 1px solid lightgrey;
    }

    span.price {
      float: right;
      color: grey;
    }

    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Raleway", Arial, Helvetica, sans-serif
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
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/carousel-2.jpg" alt="New York" width="2000" height="700">

      </div>
    </div>

    <!--Cars Section-->
    <div class="w3-row-padding w3-center w3-padding-64" id="pricing">


    </div>

    
   
    <!-- Modal -->
    <div id="contact" class="w3-modal">
      <div class="w3-modal-content w3-animate-zoom">
        <div class="w3-container w3-black">
          <span onclick="document.getElementById('contact').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
          <h1>SIGN IN</h1>
        </div>

        <div class="w3-container">

          <form name="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="email" required name="email"></p>
            <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="*******" required name="password"></p>
            <p><button class="w3-button w3-teal" type="submit" name="login">SIGN IN</button></p>
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
    $pickuplocation = $droplocation = $pickupdate = $dropdate = $selectcar = "";
    $pickuplocationErr = $droplocationErr = $pickupdateErr = $dropdateErr = $selectcarErr = "";
    $selectcararr= $_SESSION["brands"];
    $validation = true;
    $carstring = "<h2>CARS</h2>\
    <p>Choose a service that helps your needs.</p><br>";
    if(isset($_SESSION["select-car"])){

      $pickuplocation = $_SESSION["pickup-location"];
      $droplocation = $_SESSION["drop-location"];
      $pickupdate = $_SESSION["pickup-date"];
      $dropdate = $_SESSION["drop-date"];
      $selectcar = $selectcararr[$_SESSION["select-car"]];

      if ($validation) {
        if($selectcar=="ALL"){
        $sql = "SELECT * from car where carid NOT IN (select r.carid from rent r where '$pickupdate' between r.startdate and r.enddate )";
         }else{
          $sql = "SELECT * from car where carid NOT IN (select r.carid from rent r where '$pickupdate' between r.startdate and r.enddate ) and brandname='".$selectcar."'";
         }
          $result = $conn->query($sql);
        $carstring = "<h2>CARS</h2>\
      <p>Choose a service that helps your needs.</p><br>";
  
        if ($result == false) {
        } else if ($result->num_rows > 0) {
         
          while ($row = mysqli_fetch_assoc($result)) {
            $sqlcardetails = "SELECT * FROM cardetails where detailsid=" . $row["detailsid"];
            $detailresult = $conn->query($sqlcardetails);
            $detailrow = mysqli_fetch_assoc($detailresult);
            $carstring = $carstring . "<div class='w3-third w3-margin-bottom'>\
          <ul class='w3-ul w3-border w3-hover-shadow'>\
            <li class='w3-theme'>\
              <img src='". $row["image"]. "' style='width:100%'>\
            </li>\
            <li class='w3-padding-16'><b>" . $row["brandname"] . " - " . $row["modelname"] . "</b> </li>\
            <li class='w3-padding-16'><b>" . $detailrow["numberofseat"] . "</b> Number of Seat</li>\
            <li class='w3-padding-16'><b>" . $detailrow["numberofdoors"] . "</b> Number of Doors</li>\
            <li class='w3-padding-16'><b>" . $detailrow["capacityofluggage"] . "</b> Capacity of Luggage</li>\
            <li class='w3-padding-16'><b>" . $detailrow["geartype"] . "</b> Gear Type </li>\
            <li class='w3-padding-16'>\
              <h2 class='w3-wide'><i class='fa fa-usd'></i> " . $detailrow["dailyprice"] . "</h2>\
              <span class='w3-opacity'>per day</span>\
            </li>\
            <li class='w3-theme-l5 w3-padding-24'>\
              <form method='post'><a id='" . $row["carid"] . "' value = '" . $row["carid"] . "' type='button' name='review' href='payment.php?carid=". $row["carid"] . "' class='w3-button w3-teal w3-padding-large'><i class='fa fa-check'></i> Rent</a></form>\
            </li>\
          </ul>\
        </div> ";
          
          }
          unset($_SESSION["select-car"]);
        } else {
          echo 'araba yok';
        }
  
      
      } else {
        echo "something wrong";
      }
    }else{
      $sqlallcars="SELECT * FROM car";
      $result = $conn->query($sqlallcars);
     
      while ($row = mysqli_fetch_assoc($result)) {
        $sqlcardetails = "SELECT * FROM cardetails where detailsid=" . $row["detailsid"];
        $detailresult = $conn->query($sqlcardetails);
        $detailrow = mysqli_fetch_assoc($detailresult);
        $carstring = $carstring . "<div class='w3-third w3-margin-bottom'>\
      <ul class='w3-ul w3-border w3-hover-shadow'>\
        <li class='w3-theme'>\
          <img src='". $row["image"]. "' style='width:100%'>\
        </li>\
        <li class='w3-padding-16'><b>" . $row["brandname"] . " - " . $row["modelname"] . "</b> </li>\
        <li class='w3-padding-16'><b>" . $detailrow["numberofseat"] . "</b> Number of Seat</li>\
        <li class='w3-padding-16'><b>" . $detailrow["numberofdoors"] . "</b> Number of Doors</li>\
        <li class='w3-padding-16'><b>" . $detailrow["capacityofluggage"] . "</b> Capacity of Luggage</li>\
        <li class='w3-padding-16'><b>" . $detailrow["geartype"] . "</b> Gear Type </li>\
        <li class='w3-padding-16'>\
          <h2 class='w3-wide'><i class='fa fa-usd'></i> " . $detailrow["dailyprice"] . "</h2>\
          <span class='w3-opacity'>per day</span>\
        </li>\
      </ul>\
    </div> ";
      
      }
    }
    echo "<script>
    document.getElementById('pricing').innerHTML =\"$carstring\";
  </script>";


   

    ?>
    
   
    <?php
    $email = $password = "";
    if (isset($_POST['login'])) {
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
          echo "login success";
        } else {
          echo 'password or email incorrect';
        }
      } else {
        echo "something wrong";
      }
    }
    function test_input($data)
    {
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
    <script>
      function rent(params) {
        document.getElementById('id01').style.display = 'block';
        document.getElementById('paymentForm').value = params;
      }
    </script>
</body>

</html>