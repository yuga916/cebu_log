 <!DOCTYPE html>
   <html lang="en">
     <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta name="description" content="">
       <meta name="author" content="">
       <link rel="shortcut icon" href="../assets/ico/favicon.png">

       <title>sigh in</title>


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

     <body>

     

<?php special_var_dump($_SESSION['users']); ?>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 content-margin-top">
        <form method="post" action="thanks" class="form-horizontal" role="form">
        <form method="post" action="/cebu_log/users/create" class="form-horizontal" role="form">
        <br>
        <br>
        <br>
          <input type="hidden" name="action" value="submit">
          <div class="well">ご登録内容をご確認ください。</div>
            <table class="table table-striped table-condensed">
              <tbody>
                <!-- 登録内容を表示 -->
                <tr>
                  <td><div class="text-center">ニックネーム</div></td>
                  <td><div class="text-center">hogehoge</div></td>
                  <td><div class="text-center">
                  <?php echo $this->viewOptions['nick_name']; ?>
                  <input type="hidden" class="form-control" name="nick_name" value="<?php echo $this->viewOptions['nick_name']; ?>">
                  </div></td>

                </tr>
                <tr>
                  <td><div class="text-center">メールアドレス</div></td>
                  <td><div class="text-center">hoge@hoge</div></td>
                  <td><div class="text-center"><?php echo $this->viewOptions['email']; ?>
                  <input type="hidden" class="form-control" name="email" value="<?php echo $this->viewOptions['email']; ?>">
                  </div></td>
                </tr>
                <tr>
                  <td><div class="text-center">パスワード</div></td>
                  <td><div class="text-center">●●●●●●●●</div></td>
                  <td><div class="text-center">●●●●●●●●
                    <input type="hidden" class="form-control" name="password" value="<?php echo $this->viewOptions['password']; ?>">
                  </div></td>
                </tr>
                <tr>
                  <td><div class="text-center">プロフィール画像</div></td>
                  <td><div class="text-center"><img src="../member_picture/" width="100"></div></td>
                  <td><div class="text-center"><img src="../<?php echo $_SESSION['join']['image_file']; ?>" width="100"></div></td>
                </tr>
              </tbody>
            </table>

            <a href="add?action=rewrite">&laquo;&nbsp;書き直す</a> |
            <input type="submit" class="btn btn-default" value="会員登録">
          </div>
        </form>
      </div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>