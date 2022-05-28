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
        <?php if (!isset($_SESSION["customerid"])) {
            echo '<a onclick="document.getElementById(\'contact\').style.display=\'block\'" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Sign In</a>';
        } else {
            $sqlcustomer = "SELECT firstname, lastname FROM customer WHERE customerid=" . $_SESSION["customerid"];
            $result = $conn->query($sqlcustomer);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
            }
            echo '<a  onclick="document.getElementById(\'contact\').style.display=\'block\'" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">' . $row['firstname'] . ' ' . $row['lastname'] . '</a>';
        }
        ?>
        <div class="carousel-inner">

        </div>
        <!-- Modal Payment -->
        <div class="col">

            <div class="row">
                <div class="col-75">
                    <div class="container">
                        <div class="row" id="carrent">
                            <div class="col-50">DENEME</div>
                        </div>
                        <form name="formcars" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                            <div class="row">
                                <div class="col-50">
                                    <h3>Billing Address</h3>
                                    <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                    <input type="text" id="fname" name="firstname" required placeholder="John M. Doe">
                                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                    <input type="text" id="email" name="email" required placeholder="john@example.com">
                                    <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                    <input type="text" id="adr" name="address" required placeholder="542 W. 15th Street">
                                    <label for="city"><i class="fa fa-institution"></i> City</label>
                                    <input type="text" id="city" name="city" required placeholder="New York">

                                    <div class="row">
                                        <div class="col-50">
                                            <label for="state">State</label>
                                            <input type="text" id="state" name="state" required placeholder="NY">
                                        </div>
                                        <div class="col-50">
                                            <label for="zip">Zip</label>
                                            <input type="text" id="zip" name="zip" required placeholder="10001">
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
                                    <input type="text" id="cname" name="cardname" required placeholder="John More Doe">
                                    <label for="ccnum">Credit card number</label>
                                    <input type="text" id="ccnum" name="cardnumber" required placeholder="1111-2222-3333-4444">
                                    <label for="expmonth">Exp Month</label>
                                    <input type="text" id="expmonth" name="expmonth" required placeholder="September">
                                    <div class="row">
                                        <div class="col-50">
                                            <label for="expyear">Exp Year</label>
                                            <input type="text" id="expyear" name="expyear" required placeholder="2018">
                                        </div>
                                        <div class="col-50">
                                            <label for="cvv">CVV</label>
                                            <input type="text" id="cvv" name="cvv" required placeholder="352">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <label>
                                <input type="checkbox" checked="checked" name="sameadr" required> Shipping address same as billing
                            </label>
                            <button id="paymentForm" type="submit" name="formcars" class="btn">Continue to checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $parts = parse_url($url);
            parse_str($parts['query'], $query);
            $carid =  $query['carid'];
            $_SESSION["carid"] = $carid;
        }


        $caridsql = "SELECT * FROM car WHERE carid=" .  $_SESSION["carid"];
        $carrent1 = $conn->query($caridsql);
        $caridrow1 = mysqli_fetch_assoc($carrent1);
        $sqldetails = "SELECT dailyprice FROM cardetails WHERE detailsid=" . $caridrow1["detailsid"];
        $detailresult = $conn->query($sqldetails);
        $detailrow = mysqli_fetch_assoc($detailresult);

        var_dump($_SESSION["pickup-location"]);
            $locations = ["Ankara", "Antalya", "Izmir", "Istanbul"];
            $pickuplocation = $locations[$_SESSION["pickup-location"]];
            $droplocation = $locations[$_SESSION["drop-location"]];
            $pickupdate = $_SESSION["pickup-date"];
            $dropdate = $_SESSION["drop-date"];
            $diff = date_diff(date_create($pickupdate), date_create($dropdate));

            $amount = $diff->format("%a") * $detailrow["dailyprice"];
            $carrenthtml = "<div class=\'col-50\'><h1>Selected Car</h1><img src=\'" . $caridrow1["image"] . "\' style=\'width:100%\'></div><div class=\'col-50\'><h1>" . $caridrow1["brandname"] . " " . $caridrow1["modelname"] . "</h1>\
<h2> " . $pickuplocation . " & " .  $droplocation  .  "</h2>\
<h2> " . $pickupdate . " & " .  $dropdate  .  "</h2>\
<h2> " . $amount  .  "</h2>\
</div>";


            echo "<script>
document.getElementById('carrent').innerHTML ='" . $carrenthtml . "';
</script>";
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "buton BASILDI.";
            $validation = true;
            $paymentdate = date("Y-m-d");
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
            $sqlinvoince = "INSERT INTO invoince (paymentid,amount,paymentdate,firstname,email,address,city,state,zip)
        VALUES (1,'$amount','$paymentdate','$fname','$email','$address','$city','$state','$zip')";
            if ($conn->query($sqlinvoince) === TRUE) {
                $invoinceid = mysqli_insert_id($conn);
                $customerid = $_SESSION["customerid"];
                $carid=$_SESSION["carid"];
                $sqlrent = "INSERT INTO rent (customerid,carid,status,pickupaddress,returnaddress,invoinceid,startdate,enddate)
             VALUES ($customerid,$carid,'1','$pickuplocation','$droplocation',$invoinceid,'$pickupdate','$dropdate')";
                if ($conn->query($sqlrent) === TRUE) {
                    echo "<script> alert('Successfully booked and payment');window.location.href='index.php';</script>";
                } else {
                    echo "Error: " . $sqlrent . "<br>" . $conn->error;
                }
            } else {
                echo "Error: " . $sqlinvoince . "<br>" . $conn->error;
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
</body>

</html>