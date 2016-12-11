<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>My Page</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/cebu_log/webroot/assets/css/main.css" rel="stylesheet">

    <link href="/cebu_log/webroot/assets/css/font-awesome.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <script src="/cebu_log/webroot/assets/js/modernizr.custom.js"></script>

    <!-- oneline_bbs -->
    <link rel="stylesheet" href="/cebu_log/webroot/assets/css/form.css">
    <link rel="stylesheet" href="/cebu_log/webroot/assets/css/timeline.css">

    <!-- ギャラリー -->
    <link rel="stylesheet" type="text/css" href="/cebu_log/webroot/assets/zoomwall.js-master/zoomwall.css" />
    <script type="text/javascript" src="/cebu_log/webroot/assets/zoomwall.js-master/zoomwall.js"></script>
    
  </head>

  <body>

<div class="container">
  <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center animate-box ">
            <div class="heading-section">
              <br>
              <br>
              <h2><?php echo $this->viewShops['shop_name']; ?>の今までの投稿</h2>
              
            </div>
          </div>
  </div>
</div>


    <div class="container">
          <div id="gallery" class="zoomwall">
            <?php foreach($this->viewOptions as $viewOption): ?>
          
                        <img style="padding: 2px;" src="../../post_img/<?php echo $viewOption['shop_picture_path']?>"  data-highres="" />
            <?php endforeach; ?>
        </div>
    </div>
    <br>
    <br>
  

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

  <!-- CONTACT FOOTER -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/cebu_log/webroot/assets/js/bootstrap.min.js"></script>
    <script src="/cebu_log/webroot/assets/js/main.js"></script>
  <script src="/cebu_log/webroot/assets/js/masonry.pkgd.min.js"></script>
  <script src="/cebu_log/webroot/assets/js/imagesloaded.js"></script>
    <script src="/cebu_log/webroot/assets/js/classie.js"></script>
  <script src="/cebu_log/webroot/assets/js/AnimOnScroll.js"></script>
  

  <!-- ギャラリー -->
  <script>
    window.onload = function() {
        zoomwall.create(document.getElementById('gallery'));
    };
  </script>

  <script>
    zoomwall.create(document.getElementById('first-gallery'));
    zoomwall.create(document.getElementById('second-gallery'));
    zoomwall.keys();
  </script>
  

  </body>
</html>
