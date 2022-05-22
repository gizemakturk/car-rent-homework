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
    <a button onclick="document.getElementById('contact').style.display='block'" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Sign In</a>
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/carousel-2.jpg" alt="New York" width="2000" height="700">

      </div>
    </div>

    <!--Cars Section-->
    <div class="w3-row-padding w3-center w3-padding-64" id="pricing">


    </div>
    <!-- Modal Payment -->
    <div id="id01" class="w3-modal">

      <div class="row">
        <div class="col-75">
          <div class="container">
            <form name="formcars" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

              <div class="row">
                <div class="col-50">
                  <div><span onclick="document.getElementById('id01').style.display='none'" style="margin-top: 100px;margin-right:180px;" class="w3-button w3-display-topright w3-large">x</span></div>
                  <h3>Billing Address</h3>
                  <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                  <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                  <label for="email"><i class="fa fa-envelope"></i> Email</label>
                  <input type="text" id="email" name="email" placeholder="john@example.com">
                  <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                  <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                  <label for="city"><i class="fa fa-institution"></i> City</label>
                  <input type="text" id="city" name="city" placeholder="New York">

                  <div class="row">
                    <div class="col-50">
                      <label for="state">State</label>
                      <input type="text" id="state" name="state" placeholder="NY">
                    </div>
                    <div class="col-50">
                      <label for="zip">Zip</label>
                      <input type="text" id="zip" name="zip" placeholder="10001">
                    </div>
                  </div>
                </div>

                <div class="col-50">
                  <h3>Payment</h3>
                  <label for="fname">Accepted Cards</label>
                  <div class="icon-container">
                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                  </div>
                  <label for="cname">Name on Card</label>
                  <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                  <label for="ccnum">Credit card number</label>
                  <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                  <label for="expmonth">Exp Month</label>
                  <input type="text" id="expmonth" name="expmonth" placeholder="September">
                  <div class="row">
                    <div class="col-50">
                      <label for="expyear">Exp Year</label>
                      <input type="text" id="expyear" name="expyear" placeholder="2018">
                    </div>
                    <div class="col-50">
                      <label for="cvv">CVV</label>
                      <input type="text" id="cvv" name="cvv" placeholder="352">
                    </div>
                  </div>
                </div>

              </div>
              <label>
                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
              </label>
              <button id="paymentForm" type="submit" name="formcars" class="btn">Continue to checkout
              </button>
            </form>
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

    $validation = true;
    $pickuplocation = $_SESSION["pickup-location"];
    $droplocation = $_SESSION["drop-location"];
    $pickupdate = $_SESSION["pickup-date"];
    $dropdate = $_SESSION["drop-date"];
    $selectcar = $_SESSION["select-car"];


    if ($validation) {
      $sql = "SELECT * from car where not exists (select r.carid from rent r where $pickupdate between r.startdate and r.enddate )";
      $result = $conn->query($sql);
      $carstring = "<h2>CARS</h2>\
    <p>Choose a service that helps your needs.</p><br>";

      if ($result == false) {
      } else if ($result->num_rows > 0) {
        $img = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo "id: " . $row["carid"] . " - model: " . $row["modelname"] . "<br>";
          $sqlcardetails = "SELECT * FROM cardetails where detailsid=" . $row["detailsid"];
          $detailresult = $conn->query($sqlcardetails);
          $detailrow = mysqli_fetch_assoc($detailresult);
          $carstring = $carstring . "<div class='w3-third w3-margin-bottom'>\
        <ul class='w3-ul w3-border w3-hover-shadow'>\
          <li class='w3-theme'>\
            <img src='img/car-rent-" . $img . ".png' style='width:100%'>\
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
            <button id='" . $row["carid"] . "' type='button' onclick='rent(this.id);' class='w3-button w3-teal w3-padding-large'><i class='fa fa-check'></i> Rent</button>\
          </li>\
        </ul>\
      </div> ";
          $img =  $img + 1;
        }
      } else {
        echo 'araba yok';
      }

      echo "<script>
    document.getElementById('pricing').innerHTML =\"$carstring\";
  </script>";
    } else {
      echo "something wrong";
    }

    ?>
    <?php
    require_once "connect.php";
    $fnameErr = $addressErr = $emailErr = $cityErr = $stateErr = $zipErr = $cardnameErr = $cardnumberErr = $expmonthErr = $expyearErr = $cvvErr = "";
    $fname = $email = $address = $city = $state = $zip = $cardname = $cardnumber = $expmonth = $expyear = $cvv = "";
    if (isset($_POST['formcars'])) {
      $validation = true;
      if (empty($_POST["firstname"])) {
        $fnameErr = "First Name is required";
        $validation = false;
      } else {
        $fname = test_input($_POST["firstname"]);

        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
          $fnameErr = "Only letters and white space allowed";
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
      if (empty($_POST["address"])) {
        $addressErr = "address is required";
        $validation = false;
      } else {
        $address = test_input($_POST["address"]);

        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $address)) {
          $addressErr = "Only letters and white space allowed";
          $validation = false;
        }
      }
      if (empty($_POST["city"])) {
        $cityErr = "city is required";
        $validation = false;
      } else {
        $city = test_input($_POST["city"]);

        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $city)) {
          $cityErr = "Only letters and white space allowed";
          $validation = false;
        }
      }
      if (empty($_POST["state"])) {
        $stateErr = "state is required";
        $validation = false;
      } else {
        $state = test_input($_POST["state"]);

        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $state)) {
          $stateErr = "Only letters and white space allowed";
          $validation = false;
        }
      }

      if (empty($_POST["zip"])) {
        $zipErr = "zip is required";
        $validation = false;
      } else {
        $zip = test_input($_POST["zip"]);

        // check if name only contains letters and whitespace
        if (!preg_match("/^[0-9]*$/", $zip)) {
          $zipErr = "Only numbers and white space allowed";
          $validation = false;
        }
      }
      if (empty($_POST["cardname"])) {
        $cardnameErr = "cardname is required";
        $validation = false;
      } else {
        $cardname = test_input($_POST["cardname"]);

        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $cardname)) {
          $cardnameErr = "Only letters and white space allowed";
          $validation = false;
        }
      }
      if (empty($_POST["cardnumber"])) {
        $cardnumberErr = "cardnumber is required";
        $validation = false;
      } else {
        $cardnumber = test_input($_POST["cardnumber"]);

        // check if name only contains letters and whitespace
        if (!preg_match("/^[0-9]*$/", $cardnumber)) {
          $cardnumberErr = "Only numbers and white space allowed";
          $validation = false;
        }
      }
      if (empty($_POST["expmonth"])) {
        $expmonthErr = "expmonth is required";
        $validation = false;
      } else {
        $expmonth = test_input($_POST["expmonth"]);

        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $expmonth)) {
          $expmonthErr = "Only letters and white space allowed";
          $validation = false;
        }
      }
      if (empty($_POST["expyear"])) {
        $expyearErr = "expyear is required";
        $validation = false;
      } else {
        $expyear = test_input($_POST["expyear"]);

        // check if name only contains letters and whitespace
        if (!preg_match("/^[0-9]*$/", $expyear)) {
          $expyearErr = "Only numbers and white space allowed";
          $validation = false;
        }
      }
      if (empty($_POST["cvv"])) {
        $cvvErr = "CVV is required";
        $validation = false;
      } else {
        $cvv = test_input($_POST["cvv"]);

        // check if name only contains letters and whitespace
        if (!preg_match("/^[0-9]*$/", $cvv)) {
          $cvvErr = "Only numbers and white space allowed";
          $validation = false;
        }
      }
      if ($validation) {
        $locations = ["Ankara", "Antalya", "Izmir", "Istanbul"];
        $pickuplocation = $locations[$_SESSION["pickup-location"]];
        $droplocation = $locations[$_SESSION["drop-location"]];
        $pickupdate = $_SESSION["pickup-date"];
        $dropdate = $_SESSION["drop-date"];
        $selectcar = $_SESSION["select-car"];
        echo $pickupdate;
        $diff = date_diff(date_create($pickupdate), date_create($dropdate));
        if (isset($_POST["formcars"])) {
          $carid = $_POST["formcars"];
          $sqlcar = "SELECT detailsid FROM car WHERE carid=" . $carid;
          $carresult = $conn->query($sqlcar);
          $carrow = mysqli_fetch_assoc($carresult);

          $sqldetails = "SELECT dailyprice FROM cardetails WHERE detailsid=" . $carrow["detailsid"];
          $detailresult = $conn->query($sqldetails);
          $detailrow = mysqli_fetch_assoc($detailresult);
          $amount = $diff->format("%a") * $detailrow["dailyprice"];
          $paymentdate = date("Y-m-d");

          $sqlinvoince = "INSERT INTO invoince (paymentid,amount,paymentdate,firstname,email,address,city,state,zip)
  VALUES (1,'$amount','$paymentdate','$fname','$email','$address','$city','$state','$zip')";
          if ($conn->query($sqlinvoince) === TRUE) {
            $invoinceid = mysqli_insert_id($conn);
            $customerid = $_SESSION["customerid"];
            $sqlrent = "INSERT INTO rent (customerid,carid,status,pickupaddress,returnaddress,invoinceid,startdate,enddate)
       VALUES ($customerid,$carid,'1','$pickuplocation','$droplocation',$invoinceid,'$pickupdate','$dropdate')";
            if ($conn->query($sqlrent) === TRUE) {
              echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          } else {
            echo "Error: " . $sqlinvoince . "<br>" . $conn->error;
          }
        }
      } else {
        echo "Full name error: " . $fnameErr . "Address error:" . $addressErr . "Email error:" . $emailErr . "City error:" . $cityErr . "State error:" . $stateErr . "Zip error:" . $zipErr . "Card name error:" . $cardnameErr . "Card number error:" . $cardnumberErr . "Exp month error:" . $expmonthErr . "Exp year error:" . $expyearErr . "Cvv error:" . $cvvErr . "";;
      }
    }
    $conn->close();

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