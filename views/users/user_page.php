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

  <?php  special_var_dump($this->viewFollows['is_follow']); ?>

  <!-- WELCOME SECTION -->
     <div class="container">
       <div class="row mt centered">
         <div class="col-lg-8 col-lg-offset-2">
         <br>
         <br>

           <img style="border-radius: 30px;
                       height: 150px;
                       width: 150px;" src="../../<?php echo $this->viewOptions['picture_path']; ?>" width="100" height="100">

                       <br>
                       <br>
         </div>
         <div class="col-lg-8 col-lg-offset-2">
             <p><b>NAME:<?php echo $this->viewOptions['nick_name']; ?></p>
             <p><b>INRODUCTION:</b><?php echo $this->viewOptions['m_intro']; ?></p>
           <?php if($_SESSION['id'] == $this->viewOptions['id']): ?>
             <a href="../edit/<?php echo $this->viewOptions['id']; ?>"><button type="button" class="btn btn-warning">ユーザー情報を編集する</button></a>
           <?php endif; ?>
           <br>
           <br>
           
           <?php if($this->viewFollows['is_follow'] == 0): ?>
               <a href="/cebu_log/users/follow/<?php echo $this->viewOptions['id']; ?>"><button type="button" class="btn btn-warning">フォローする</button></a>
           
           <?php else: ?>   

               <a href="/cebu_log/users/unfollow/<?php echo $this->viewOptions['id']; ?>"><button type="button" class="btn btn-warning">フォローを解除する</button></a>
           <?php endif; ?>


        <!-- follower,followeringのカウント -->
        
            <div class="row mt centered">
              <div class="col-lg-6">
                <br>
                <p><b>フォロー数:<a href="/cebu_log/users/followings/<?php echo $this->viewOptions['id']; ?>"><?php echo $this->followings['follow_cnt']; ?></a></b>人</p>
              </div>

              <div class="col-lg-6">
                <br>
                <p><b>フォロワー数:<a href="/cebu_log/users/followers/<?php echo $this->viewOptions['id']; ?>"><?php echo $this->followers['following_cnt']; ?></a></b>人</p>
              </div>
            </div>
        


           
         </div>
       </div><!-- /row -->
     </div><!-- /.container -->
     <br>
     <br>
     
    <div class="container">
          <div id="gallery" class="zoomwall">
                      <img style="padding: 2px;" src="/cebu_log/post_img/20161119163921orange6.jpg"  data-highres="" />
            <?php foreach($this->viewPictures as $viewPicture): ?>
                      <img style="padding: 2px;" src="/cebu_log/uploads/pictures/<?php echo $viewPicture['shop_picture_path']?>"  data-highres="" />
            <?php endforeach; ?>
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
