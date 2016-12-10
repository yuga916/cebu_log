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

  <!-- WELCOME SECTION -->
     <div class="container">
       <div class="row mt centered">
         <div class="col-lg-8 col-lg-offset-2">
           <img style="border-radius: 30px;
                       height: 150px;
                       width: 150px;" src="member_picture/<?php echo $member['picture_path']; ?>" width="100" height="100">
                       <br>
                       <br>
         </div>
         <div class="col-lg-8 col-lg-offset-2">
           <p><b>NAME:セブ太郎</p>
           <p><b>INRODUCTION:</b>セブ太郎です。</p>

           <!-- <a href="edit.php"><button type="button" class="btn btn-primary btn-lg" style="border-color: #ff0000;background-color: #ff0000">Edit</button></a> -->
         </div>
       </div><!-- /row -->
     </div><!-- /.container -->
     <br>
     <br>
     <?php foreach($this->viewOptions as $viewOption): ?>
      [<a href="like/<?php echo $viewOption['id']; ?>">Like <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>]
     <?php endforeach; ?>



    
    <div class="container">
          <div id="gallery" class="zoomwall">

            
                      <img style="padding: 2px;" src="/cebu_log/post_img/20161119163921orange6.jpg"  data-highres="" />
      
                      
                      <img style="padding: 2px;" src="/cebu_log/post_img/iine.png"  data-highres="" />
          
                      <img style="padding: 2px;" src="/cebu_log/post_img/20161119163921orange6.jpg"  data-highres="" />


                      <img style="padding: 2px;" src="/cebu_log/post_img/20161119163921orange6.jpg"  data-highres="" />

                      <img style="padding: 2px;" src="/cebu_log/post_img/20161119163921orange6.jpg"  data-highres="" />
                      
                      
                      <img style="padding: 2px;" src="/cebu_log/post_img/20161119163921orange6.jpg"  data-highres="" />


                      <img style="padding: 2px;" src="/cebu_log/post_img/20161119163921orange6.jpg"  data-highres="" />
          </div>
    </div>
    <br>
    <br>
  


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