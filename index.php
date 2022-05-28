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
        echo "login success";
        $_SESSION["customerid"] = $row["customerid"];
      } else {
        echo 'password or email incorrect';
      }


     // $conn->close();
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
    echo '<a href="customer.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">'.$row['firstname'].' '.$row['lastname'].'</a>';

  }
  ?>
  </div>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="w3-row-padding">
      <div class="w3-col m2">
        <label><i class="fa fa-map-marker"></i> Pick Up Location</label>
        <select class="form-control form-control-lg w3-input w3-border " name="pickup-location">
        <option value="0">Ankara</option>
          <option value="1">Antalya</option>
          <option value="2">İzmir</option>
          <option value="3">İstanbul</option>
        </select>
      </div>
      <div class="w3-col m2">
        <label><i class="fa fa-map-marker"></i> Drop Location </label>
        <select class="form-control form-control-lg w3-input w3-border " name="drop-location">
          <option value="0">Ankara</option>
          <option value="1">Antalya</option>
          <option value="2">İzmir</option>
          <option value="3">İstanbul</option>
        </select>
      </div>
      <div class="w3-col m2">
        <label><i class="fa fa-calendar-o"></i> Pick Up Date</label>
        <input id="pickup-date" class="w3-input w3-border" type="date" placeholder="DD MM YYYY" name="pickup-date" required>
      </div>

      <div class="w3-col m2">
        <label><i class="fa fa-calendar-o"></i> Drop Date </label>
        <input id="drop-date" class="w3-input w3-border" type="date" placeholder="DD MM YYYY" name="drop-date" required>
      </div>
      <div  class="w3-col m2">
        <label><i class="fa fa-car"></i> Select Car</label>
        <select id="brands" class="form-control form-control-lg w3-input w3-border " name="select-car">
      
        </select>
      </div>
      <div class="w3-col m2">
        <label><i class="fa fa-search"></i> Search</label>
        <button class="w3-button w3-block w3-black" name ='form1'>Search</button>
      </div>
      </div>
  </form>
  <?php

  if (isset($_POST['form1'])) {  
 
    $_SESSION["pickup-location"] = test_input($_POST["pickup-location"]);
    $_SESSION["drop-location"] = test_input($_POST["drop-location"]);
    $_SESSION["pickup-date"] = test_input($_POST["pickup-date"]);
    $_SESSION["drop-date"] = test_input($_POST["drop-date"]);
    $_SESSION["select-car"] = test_input($_POST["select-car"]);
    $date=date('Y-m-d');
    if($_POST["pickup-date"]>$date && $_POST["drop-date"]>$date && $_POST["drop-date"]>$_POST["pickup-date"]){
     echo "<script> window.location.href='cars.php'</script>";
    }else{
      echo  "<script> alert('pick a valid dates');</script>";
    }

  }
  $carmodelsql="SELECT DISTINCT brandname FROM car  ";
  $carresult1 = $conn->query($carmodelsql);
  $selectcararr=[];
  $brandhtml = "<option value=0>ALL</option>";
  $selectcararr[] ="ALL";
  $counter = 1;
  while( $carrow1 = mysqli_fetch_assoc($carresult1)){
      $selectcararr[] = $carrow1["brandname"];
      $brandhtml = $brandhtml . "<option value=".$counter . ">" . $carrow1["brandname"] . "</option>";
      $counter = $counter + 1;
  }
  $_SESSION["brands"] = $selectcararr;
 echo "<script>
 document.getElementById('brands').innerHTML ='" . $brandhtml . "';
</script>";

  ?>

  <!-- Header -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/carousel-1.jpg" alt="New York" width="2000" height="700">
        <div class="carousel-caption">
          <h3>REDCAR</h3>
        </div>
      </div>
      <div class="item">
        <img src="img/carousel-2.jpg" alt="Chicago" width="2000" height="700">
        <div class="carousel-caption">
          <h3>Quality Cars With Unlimited Miles</h3>
        </div>
      </div>
      <div class="item">
        <img src="img/carousel-1.jpg" alt="Los Angeles" width="2000" height="700">
        <div class="carousel-caption">
          <h3>Best Rental Cars ın Your Location</h3>
        </div>
      </div>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div><br><br><br><br><br><br>

  <!-- About content -->
  <div class="w3-content w3-center" style="max-width:1532px;">
    <div class="w3-row-padding">
      <div class="w3-container">
        <div class="container ">
          <h1 class="display-4 text-uppercase mb-5">Welcome To <span class="text-primary">Red Cars</span></h1> <br><br>
          <div class="col-lg-12">
            <img class="w-75 mb-4" src="img/about.png" width="100%">
            <p>Justo et eos et ut takimata sed sadipscing dolore lorem, et elitr labore labore voluptua no rebum sed, stet voluptua amet sed elitr ea dolor dolores no clita. Dolores diam magna clita ea eos amet, amet rebum voluptua vero vero sed clita accusam takimata. Nonumy labore ipsum sea voluptua sea eos sit justo, no ipsum sanctus sanctus no et no ipsum amet, tempor labore est labore no. Eos diam eirmod lorem ut eirmod, ipsum diam sadipscing stet dolores elitr elitr eirmod dolore. Magna elitr accusam takimata labore, et at erat eirmod consetetur tempor eirmod invidunt est, ipsum nonumy at et.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--SERVICES-->
  <div class="container-fluid py-5">
    <div class="container pt-5 pb-3 ">
      <div class="w3-row-padding w3-center w3-padding-64 ">
        <h2>SERVİCES</h2>
        <p>Choose a service that helps your needs.</p><br>
        <div class="w3-third w3-margin-bottom">
          <ul class="w3-ul w3-border w3-hover-shadow">
            <li class="w3-theme">
              <p class="w3-xlarge">Basic</p>
            </li>
            <li class="w3-padding-16"><b>10GB</b> Storage</li>
            <li class="w3-padding-16"><b>10</b> Emails</li>
            <li class="w3-padding-16"><b>10</b> Domains</li>
            <li class="w3-padding-16"><b>Endless</b> Support</li>
            <li class="w3-padding-16">
              <h2 class="w3-wide"><i class="fa fa-usd"></i> 10</h2>
              <span class="w3-opacity">per month</span>
            </li>
          </ul>
        </div>

        <div class="w3-third w3-margin-bottom">
          <ul class="w3-ul w3-border w3-hover-shadow">
            <li class="w3-theme-l2">
              <p class="w3-xlarge">Pro</p>
            </li>
            <li class="w3-padding-16"><b>25GB</b> Storage</li>
            <li class="w3-padding-16"><b>25</b> Emails</li>
            <li class="w3-padding-16"><b>25</b> Domains</li>
            <li class="w3-padding-16"><b>Endless</b> Support</li>
            <li class="w3-padding-16">
              <h2 class="w3-wide"><i class="fa fa-usd"></i> 25</h2>
              <span class="w3-opacity">per month</span>
            </li>
          </ul>
        </div>

        <div class="w3-third w3-margin-bottom">
          <ul class="w3-ul w3-border w3-hover-shadow">
            <li class="w3-theme">
              <p class="w3-xlarge">Premium</p>
            </li>
            <li class="w3-padding-16"><b>50GB</b> Storage</li>
            <li class="w3-padding-16"><b>50</b> Emails</li>
            <li class="w3-padding-16"><b>50</b> Domains</li>
            <li class="w3-padding-16"><b>Endless</b> Support</li>
            <li class="w3-padding-16">
              <h2 class="w3-wide"><i class="fa fa-usd"></i> 50</h2>
              <span class="w3-opacity">per month</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>


  <!--find your car-->
  <div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
      <h1 class="display-4 text-uppercase text-center mb-5">Find Your Car</h1>
      <div class="w3-row-padding w3-padding-16" id="popularcars">
        </div>

      </div>
    </div>
  </div>
  <!--Client says-->
  <!-- First Photo Grid-->
  <div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
      <div class="w3-row-padding w3-padding-16 w3-center" id="food">

        <h1 class="display-4 text-uppercase text-center mb-5">Client Says</h1>
        <div class="w3-quarter">
          <img src="img/team-1.jpg" style="width:100%">
          <h3>The Perfect Sandwich, A Real NYC Classic</h3>
          <p>Just some random text, lorem ipsum text praesent tincidunt ipsum lipsum.</p>
        </div>
        <div class="w3-quarter">
          <img src="img/team-2.jpg" style="width:100%">
          <h3>Let Me Tell You About This Steak</h3>
          <p>Once again, some random text to lorem lorem lorem lorem ipsum text praesent tincidunt ipsum lipsum.</p>
        </div>
        <div class="w3-quarter">
          <img src="img/team-3.jpg" style="width:100%">
          <h3>Cherries, interrupted</h3>
          <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
          <p>What else?</p>
        </div>
        <div class="w3-quarter w3-round-xxlarge">
          <img src="img/team-4.jpg" style="width:100%">
          <h3>Once Again, Robust Wine and Vegetable Pasta</h3>
          <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row" style="border-style: double; padding-top: 30px; margin-left: 0px;">
      <h3 class="text-center" style="font-size: 30px">İletişim</h3><br>
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
  </div>
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
  
  <!-- Modal -->
<?php


    $sql = "SELECT * from car";
    $result = $conn->query($sql);
    $carhtml = "";
    $counter = 1;
    while($row = mysqli_fetch_assoc($result)) {
      $carid = $row["carid"];
      $detailid = $row["detailsid"];
      $detailsql = "SELECT * FROM cardetails WHERE detailsid=" . $detailid;
      $resultdetail = $conn->query($detailsql);
      $detailrow = mysqli_fetch_assoc($resultdetail);

      $carhtml = $carhtml . "<div class='w3-third w3-margin-bottom w3-card-2 w3-hover-opacity'>\
      <img src='".$row['image']."' style='width:100%'>\
      <div class='w3-container w3-white'>\
        <h3>" . $row["brandname"] . " " . $row["modelname"] . "</h3>\
        <h6 class='w3-opacity'>From ".$detailrow["dailyprice"]."</h6>\
        <label style='width: 100px;'><i class='fa fa-car'></i> ".$detailrow["numberofdoors"]."</label>\
        <label style='width: 100px;'><i class='fa fa-car'></i> ".$detailrow["geartype"]."</label>\
        <label><i class='fa fa-car'></i> ".$detailrow["numberofseat"]."</label>\
      </div>\
    </div>";
    $counter = $counter + 1;
      if ($counter > 6) {
        break;
      }
    }
    echo "<script>
    document.getElementById('popularcars').innerHTML =\"$carhtml\";
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


  <!-- Add Google Maps -->
  <script>
    function myMap() {
      myCenter = new google.maps.LatLng(41.878114, -87.629798);
      var mapOptions = {
        center: myCenter,
        zoom: 12,
        scrollwheel: false,
        draggable: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

      var marker = new google.maps.Marker({
        position: myCenter,
      });
      marker.setMap(map);
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>


</body>

</html>