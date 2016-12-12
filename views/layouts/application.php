<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/cebu_log/webroot/assets/ico/favicon.png">

    <title>Cebu Log</title>

    <!-- Bootstrap core CSS -->
    <link href="/cebu_log/webroot/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/cebu_log/webroot/assets/css/main.css" rel="stylesheet">

    <link href="/cebu_log/webroot/assets/css/font-awesome.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="/cebu_log/webroot/assets/js/modernizr.custom.js"></script>


    
  </head>

  <body>
  <!-- Menu -->
  <nav class="menu" id="theMenu">
    <div class="menu-wrap">
      <h1 class="logo"><a href="index.php#home">LINK</a></h1>
      <i class="fa fa-arrow-right menu-close"></i>
      <a href="index.php">Home</a>
      <a href="services.html">Services</a>
      <a href="portfolio.html">Portfolio</a>
      <a href="about.html">About</a>
      <a href="/cebu_log/users/logout">ログアウト</a>
      <a href="#"><i class="fa fa-facebook"></i></a>
      <a href="#"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-dribbble"></i></a>
      <a href="#"><i class="fa fa-envelope"></i></a>
    </div>
    
    <!-- Menu button -->
    <div id="menuToggle"><i class="fa fa-bars"></i></div>
  </nav>
  
  <!-- MAIN PROJECT SECTION -->
  <div id="sp">
    <div class="container">
      <div class="row">
        <h2>セブログ</h2>
      </div><!-- row -->
    </div><!-- /container -->
  </div><!-- /portrwrap -->
  

  
  


  <?php
            include('views/' . $this->resource . '/' . $this->action . '.php');
         ?>

  
  

    <!-- CONTACT FOOTER -->
    <div id="cf">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h4>ADDRESS<br/>Minsk - Head Office</h4>
            <br>
            <p>
              Business Center, SomeAve 987,<br/>
              Minsk, Belarus.
            </p>
            <p>
              P: +55 4839-4390<br/>
              F: +55 4333-4345<br/>
              E: <a href="mailto:#">hello@linkagency.com</a>
            </p>
            <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
          </div><!--col-lg-4-->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- Contact Footer -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- ヘッダーの動きをつける -->
    <script src="/cebu_log/webroot/assets/js/main.js"></script>
    
  </body>
</html>
