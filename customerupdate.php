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

    #pickup-date,
    #drop-date {
      width: 100% !important;
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
      <?php



      $rentidsql = "SELECT * FROM rent WHERE rentid=" .  $_SESSION["updateRent"];
      $carrent1 = $conn->query($rentidsql);
      $rentidrow1 = mysqli_fetch_assoc($carrent1);
      $caridsql = "SELECT * FROM car WHERE carid=" .  $rentidrow1['carid'];
      $carrent2 = $conn->query($caridsql);
      $caridrow1 = mysqli_fetch_assoc($carrent2);
      $sqldetails = "SELECT dailyprice FROM cardetails WHERE detailsid=" . $caridrow1["detailsid"];
      $detailresult = $conn->query($sqldetails);
      $detailrow = mysqli_fetch_assoc($detailresult);


      $locations = ["Ankara", "Antalya", "Izmir", "Istanbul"];
      $pickuplocation = $rentidrow1["pickupaddress"];
      $droplocation = $rentidrow1["returnaddress"];
      $pickupdate = $rentidrow1["startdate"];
      $dropdate = $rentidrow1["enddate"];
      $diff = date_diff(date_create($pickupdate), date_create($dropdate));

      $carrenthtml = "<div class=\'col-50\'><h1>Selected Car</h1><img src=\'" . $caridrow1["image"] . "\' style=\'width:100%\'></div><div class=\'col-50\'><h1>" . $caridrow1["brandname"] . " " . $caridrow1["modelname"] . "</h1>\
<h2> " . $pickuplocation . " & " .  $droplocation  .  "</h2>\
<h2> " . $pickupdate . " & " .  $dropdate  .  "</h2>\
</div>";




      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $pickuplocation = $_POST["pickup-location"];
        $droplocation =  $_POST["drop-location"];
        $pickupdate =  $_POST["startdate"];
        $dropdate =  $_POST["enddate"];
        $_SESSION["pickup-location"] = $pickuplocation;
        $_SESSION["drop-location"] = $droplocation;
        $_SESSION["pickup-date"] = $pickupdate;
        $_SESSION["drop-date"] = $dropdate;
        $_SESSION["select-car"] = "0";
        $sqlupdaterent = "SELECT * from car where carid NOT IN (select r.carid from rent r where '$pickupdate' between r.startdate and r.enddate ) AND carid=" . $rentidrow1['carid'];
        $result4 = $conn->query($sqlupdaterent);
        if ($result4->num_rows > 0) {
          $updaterentsql =  "UPDATE rent SET startdate='" . $pickupdate . "', enddate='" . $dropdate . "', returnaddress='" . $droplocation . "', pickupaddress='" . $pickuplocation . "' WHERE rentid=" .  $_SESSION["updateRent"];
          if ($conn->query($updaterentsql) === TRUE) {
            echo "<script>window.location.href='index.php'; </script>";
          }
        } else {
          if ($_SESSION["pickup-date"] >= $date && $_SESSION["drop-date"] >= $date && $_SESSION["drop-date"] >= $_SESSION["pickup-date"]) {
            $updaterentsql =  "UPDATE rent SET status=0 WHERE rentid=" .  $_SESSION["updateRent"];
            if ($conn->query($updaterentsql) === TRUE) {
              echo "<script> window.location.href='cars.php'</script>";
            }
          } else {
            echo  "<script> alert('pick a valid dates');</script>";
          }
        }
      }

      ?>
    </div>
    <!-- Modal Payment -->
    <div class="col">

      <div class="row">
        <div class="col-75">
          <div class="container">
            <div class="row" id="carrent">

            </div>
            <form name="formcars" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

              <div class="row">
                <div class="col-50">
                  <h3>Rent Address</h3>

                  <label for="email"><i class="fa fa-address-card-o"></i> Pickup Address</label>
                  <select class="form-control form-control-lg w3-input w3-border " name="pickup-location">
                    <option value="0" <?= $pickuplocation == 'Ankara' ? ' selected="selected"' : ''; ?>>Ankara</option>
                    <option value="1" <?= $pickuplocation == 'Antalya' ? ' selected="selected"' : ''; ?>>Antalya</option>
                    <option value="2" <?= $pickuplocation == 'Izmir' ? ' selected="selected"' : ''; ?>>İzmir</option>
                    <option value="3" <?= $pickuplocation == 'Istanbul' ? ' selected="selected"' : ''; ?>>İstanbul</option>
                  </select>
                  <label for="adr"><i class="fa fa-address-card-o"></i> Return Address</label>
                  <select class="form-control form-control-lg w3-input w3-border " name="drop-location">
                    <option value="0" <?= $droplocation == 'Ankara' ? ' selected="selected"' : ''; ?>>Ankara</option>
                    <option value="1" <?= $droplocation == 'Antalya' ? ' selected="selected"' : ''; ?>>Antalya</option>
                    <option value="2" <?= $droplocation == 'Izmir' ? ' selected="selected"' : ''; ?>>İzmir</option>
                    <option value="3" <?= $droplocation == 'Istanbul' ? ' selected="selected"' : ''; ?>>İstanbul</option>
                  </select>



                </div>

                <div class="col-50">
                  <h3>Rent Date</h3>


                  <label for="pickup-date"><i class="fa fa-calendar"></i> Start Date</label>
                  <input type="date" id="pickup-date" name="startdate" value='<?php echo $pickupdate ?>' required placeholder="John More Doe">
                  <label for="drop-date"><i class="fa fa-calendar"></i> End Date</label>
                  <input type="date" id="drop-date" name="enddate" value='<?php echo $dropdate ?>' required placeholder="1111-2222-3333-4444">


                </div>

              </div>

              <button id="paymentForm" type="submit" name="formcars" class="btn">UPDATE
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php
    echo "<script>
   document.getElementById('carrent').innerHTML ='" . $carrenthtml . "';
   </script>";
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