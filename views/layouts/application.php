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
  <?php if(!empty($_SESSION['id'])): ?>
      <nav class="menu" id="theMenu">
        <div class="menu-wrap">
          <h1 class="logo"><a href="/cebu_log/">セブログ</a></h1>
          <i class="fa fa-arrow-right menu-close"></i>
          <a href="/cebu_log/users/user_page/<?php echo $_SESSION['id']; ?>">マイページ</a>
          <a href="/cebu_log/timelines/index/<?php echo $_SESSION['id']; ?>">タイムライン</a>
          <a href="/cebu_log/pictures/add">写真を投稿</a>
          <a href="/cebu_log/shops/add">お店ページを作成</a>
          <a href="/cebu_log/users/logout">ログアウト</a>
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-dribbble"></i></a>
          <a href="#"><i class="fa fa-envelope"></i></a>
        </div>
        
        <!-- Menu button -->
        <div id="menuToggle"><i class="fa fa-bars"></i></div>
      </nav>
  <?php endif; ?>
  
  <!-- MAIN PROJECT SECTION -->
  <div id="sp">
    <div class="container">
      <div class="row">
        <h2>セブログ
        <?php if(empty($_SESSION['id'])): ?>
           <?php if(($this->action != 'signup') 
              AND ($this->action != 'picture_add') 
              AND ($this->action != 'check')
              AND ($this->action != 'thanks')
              AND ($this->action != 'login')
              ):?> 

          
              &nbsp;&nbsp;<a href="/cebu_log/users/signup"><button type="button" class="btn btn-danger" style="float: right;">新規登録</button></a>&nbsp;&nbsp;<a href="/cebu_log/users/login"><button type="button" class="btn btn-secondary" style="float: right;">ログイン</button></a></h2>
           <?php endif; ?>
        <?php endif; ?>
      </div><!-- row -->
    
    </div><!-- /container -->
  </div><!-- /portrwrap -->


  <?php
            include('views/' . $this->resource . '/' . $this->action . '.php');
         ?>

  
  
    <?php if (($this->action == 'signup') 
          OR ($this->action == 'picture_add')
          OR ($this->action == 'check')
          OR ($this->action == 'thanks')
          OR ($this->action == 'login')
          OR ($this->action == 'add')
          OR ($this->action == 'edit')
          ): ?>

    <?php else: ?>
      
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
  <?php endif; ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    

    <!-- ヘッダーの動きをつける -->
    <script src="/cebu_log/webroot/assets/js/main.js"></script>
    
  </body>
</html>
