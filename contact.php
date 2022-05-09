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
      <div class="col-md-8">
        <div class="row">
          <div class="col-sm-6 form-group">
            <input class="form-control" id="name" name="name" placeholder="İsim" type="text" required>
          </div>
          <div class="col-sm-6 form-group">
            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
          </div>
          <div class="col-sm-12 form-group">
            <input class="form-control" id="content" name="content" placeholder="Konu" type="text" required>
          </div>
        </div>
        <textarea class="form-control" id="comments" name="comments" placeholder="Yorumunuz" rows="5"></textarea>
        <br>
        <div class="row">
          <div class="col-md-12 form-group">
            <button class="btn pull-right" type="submit">Send</button>
          </div>
        </div>
      </div>
    </div>
  </div><br><br>
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
          <p>Reserve a table, ask for today's special or just send us a message:</p>
          <form action="/action_page.php" target="_blank">
            <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="User Name" required name="UserName"></p>
            <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="*******" required name="Password"></p>
             <p><button class="w3-button w3-teal" type="submit">SIGN IN</button></p>
          </form>
        </div>
      </div>
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