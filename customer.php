<?php
include 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>W3.CSS Template</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    html,
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Roboto", sans-serif
    }
  </style>
</head>

<body class="w3-light-grey">
  <a href="index.php" class="w3-bar-item w3-button w3-teal w3-mobile"><i class="fa fa-car w3-margin-right"></i>RedCar</a>
  <a href="cars.php" class="w3-bar-item w3-button w3-mobile">Cars</a>
  <a href="about.php" class="w3-bar-item w3-button w3-mobile">About</a>
  <a href="services.php" class="w3-bar-item w3-button w3-mobile">Services</a>
  <a href="contact.php" class="w3-bar-item w3-button w3-mobile">Contact</a>
  <!-- Page Container -->
  <div class="w3-content w3-margin-top" style="max-width:1400px;">

    <!-- The Grid -->
    <div class="w3-row-padding">
      <?php

      $customerid = $_SESSION["customerid"];
      $customersql = "SELECT * FROM customer WHERE customerid=" . $customerid;
      $customerresult = $conn->query($customersql);
      $customerrow = mysqli_fetch_assoc($customerresult);
      $fname = $customerrow["firstname"];
      $lname = $customerrow["lastname"];
      $dob = $customerrow["dob"];
      $email = $customerrow["email"];
      $number = $customerrow["number"];






      ?>
      <!-- Left Column -->
      <div class="w3-third">

        <div class="w3-white w3-text-grey w3-card-4">
          <div class="w3-display-container">
            <img src="img/team1.jpg" style="width:100%" alt="Avatar">
            <div class="w3-display-bottomleft w3-container w3-text-black">

            </div>
          </div>
          <div class="w3-container">
            <h2><?php echo $fname . " " . $lname ?></h2>
            <p><i class="fa fa-birthday-cake  w3-margin-right w3-large w3-text-teal"></i><?php echo $dob ?></p>
            <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $email ?></p>
            <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $number ?></p>
            <form method='POST' action='customer.php'> <button name="signout" type="submit" class="btn btn-default btn-sm">
                <span class="fa fa-sign-out w3-margin-right w3-large w3-text-teal"></span> Sign out</button></form>
            <hr>

          </div>
        </div><br>

        <!-- End Left Column -->
      </div>
      <?php

      if (isset($_POST['signout'])) {
        unset($_SESSION['customerid']);
        header('Location: index.php');
        exit();
      }
      ?>
      <!-- Right Column -->
      <div class="w3-twothird">
        <div id='customerrent' class="w3-container w3-card w3-white w3-margin-bottom">

        </div>

        <?php
        if (isset($_POST['delete'])) {
          $sqlrentdelete = "DELETE FROM rent WHERE rentid=" . $_POST["delete"];
          if ($conn->query($sqlrentdelete) === TRUE) {
            echo "<script> alert('Delete  successfully');</script>";
          } else {
            echo "Error: " . $sqlrentdelete . "<br>" . $conn->error;
          }
        }
        if (isset($_POST['update'])) {
          $_SESSION["updateRent"] = $_POST['update'];
          header('Location: customerupdate.php');
          exit();
        }
        $booksql = "SELECT * FROM rent WHERE customerid=" . $_SESSION["customerid"];
        $result = $conn->query($booksql);
        $bookinghtml = "<h2 class='w3-text-grey w3-padding-16'><i class='fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal'></i>Bookings</h2>";
        $invoincehtml = " <h2 class='w3-text-grey w3-padding-16'><i class='fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal'></i>Invoince</h2>";
        while ($bookrow = mysqli_fetch_assoc($result)) {
          $carsql = "SELECT * FROM car WHERE  carid=" . $bookrow["carid"];
          $result1 = $conn->query($carsql);
          $bookrow1 = mysqli_fetch_assoc($result1);
          $sqlinvoince = "SELECT * FROM invoince WHERE invoiceid=" . $bookrow["invoinceid"];
          $result2 = $conn->query($sqlinvoince);
          $bookrow2 = mysqli_fetch_assoc($result2);
          $bookinghtml = $bookinghtml . " <div class='w3-container'>\
    <h5 class='w3-opacity'><b>" . $bookrow1['brandname'] . " " . $bookrow1['modelname'] . "</b></h5>\
    <form method='post' action='customer.php'><button type='submit' name='update' value='" . $bookrow["rentid"] . "' class='w3-button w3-teal w3-padding-small'><i class='fa fa-tasks'></i> Update</button>\
    <button name='delete' onclick='reload();' type='submit' value='" . $bookrow["rentid"] . "' class='w3-button w3-red w3-padding-small'><i class='fa fa-close'></i> Delete</button></form></td>\
    <h6 class='w3-text-teal'><i class='fa fa-calendar fa-fw w3-margin-right'></i>" . $bookrow['startdate'] . " <span class='w3-text-teal '>" . $bookrow['enddate'] . "</span></h6>\
    <h6 class='w3-text-teal'><i class='fa fa-map-marker fa-fw w3-margin-right'></i>" . $bookrow['pickupaddress'] . " <span class='w3-tag-teal '>" . $bookrow['returnaddress'] . "</span></h6>\
    <p>Lorem ipsum dolor sit amet. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>\
    <hr>\
  </div>";
          $invoincehtml = $invoincehtml . " <div class='w3-container'>\
  <h5 class='w3-opacity'><b>" . $bookrow1['brandname'] . " " . $bookrow1['modelname'] . "</b></h5>\
  <h6 class='w3-text-teal'><i class='fa fa-calendar fa-fw w3-margin-right'></i>" . $bookrow2['paymentdate'] . " </h6>\
  <h6 class='w3-text-teal'><i class='fa fa-location fa-fw w3-margin-right'></i>" . $bookrow2['address'] . " </h6>\
  <p>Web Development! All I need to know in one place</p>\
  <hr>\
</div>";
        }
        echo "<script>
  document.getElementById('customerrent').innerHTML =\"$bookinghtml\";

</script>";





        ?>

        <div id='invoincecustomer' class="w3-container w3-card w3-white">
          <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Invoince</h2>

        </div>

        <!-- End Right Column -->
      </div>
      <?php
      echo "<script>

    document.getElementById('invoincecustomer').innerHTML =\"$invoincehtml\";
  </script>"; ?>
      <!-- End Grid -->
    </div>

    <!-- End Page Container -->
  </div>

  <footer class="w3-container w3-teal w3-center w3-margin-top">
    <p>Find me on social media.</p>
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </footer>
  <script>
    function showInfo(params) {
      window.location.href = 'customerupdate.php?rentid=' + params;
    }
  </script>
</body>

</html>