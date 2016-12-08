 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="">
     <meta name="author" content="">
     <link rel="shortcut icon" href="assets/ico/favicon.png">

     <title>Log In画面</title>

     <!-- Bootstrap core CSS -->
     <link href="assets/css/bootstrap.css" rel="stylesheet">

     <!-- Custom styles for this template -->
     <link href="assets/css/main.css" rel="stylesheet">

     <link href="assets/css/font-awesome.min.css" rel="stylesheet">

     <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
       <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
     <![endif]-->
     
     <script src="assets/js/modernizr.custom.js"></script>

     <!-- street view from brushed -->



     <!-- oneline_bbs -->
     <link rel="stylesheet" href="assets/css/form.css">
     <link rel="stylesheet" href="assets/css/timeline.css">

     
   </head>

  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 content-margin-top">
      <br>
      <br>
      <br>
        <legend>ログイン</legend>
        <form method="post" action="" class="form-horizontal" role="form">
          <!-- メールアドレス -->
          <div class="form-group">
            <label class="col-sm-4 control-label">メールアドレス</label>
            <div class="col-sm-8">
              <input type="email" name="email" class="form-control" placeholder="例： seed@nex.com" value="">
            </div>
          </div>
          <!-- パスワード -->
          <div class="form-group">
            <label class="col-sm-4 control-label">パスワード</label>
            <div class="col-sm-8">
              <input type="password" name="password" class="form-control" placeholder="" value="<?php echo htmlspecialchars($password, ENT_QUOTES, 'utf-8'); ?>">
            </div>
          </div>

          <!-- 自動ログイン設定のチェックボックス -->
          <div class="form-group">
            <label for="" class= col-sm-4 control-label">自動ログイン</label>
            <div class="class=col-sm-8">
              <input type="checkbox"  id="save" name="save" value="on">
            </div>
            
          </div>
          <input type="submit" class="btn btn-default" value="ログイン"> | <a href="join/index.php" class="btn btn-success">会員登録</a>
        </form>
      </div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
      <!-- CONTACT FOOTER -->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/main.js"></script>
      <script src="assets/js/masonry.pkgd.min.js"></script>
      <script src="assets/js/imagesloaded.js"></script>
        <script src="assets/js/classie.js"></script>
      <script src="assets/js/AnimOnScroll.js"></script>
      <!-- oneline_bbs -->
      <script src="assets/js/form.js"></script>
  </body>
</html>
