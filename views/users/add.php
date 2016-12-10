<?php 
  
  // 各入力欄のvalueの初期値を定義
  $nick_name = '';
  $email = '';
  $password = '';

  //フォームからデータが送信された場合
  if (!empty($_POST)) {
    $nick_name = $_POST['nick_name']; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // ニックネームが未入力チェック
    if ($_POST['nick_name'] == ''){
      $error['nick_name'] = 'blank';
    }

    // メールアドレス未入力チェック
    if ($_POST['email'] == ''){
      $error['email'] = 'blank';
    }

    // パスワード未入力チェック
    if ($_POST['password'] == ''){
      $error['password'] = 'blank';
    } elseif (strlen($_POST['password']) < 4) {
      $error['password'] = 'length';
    }

    
    // メールアドレスの重複チェック
    if (empty($error)) {
        $sql = sprintf('SELECT COUNT(*) AS cnt FROM `users` WHERE `email` = "%s"',mysqli_real_escape_string($db,$email));
        // p246のコード
        // $recordはObject型（このままでは使えない）
          $record = mysqli_query($db,$sql) or die(mysqli_error($db));
        // fetchしてArray型に変換する
          $table = mysqli_fetch_assoc($record);
          if($table['cnt'] > 0) {
            $error['email'] = 'duplicate';
          }   
    }


    // エラーがなかった場合の処理
    if (empty($error)) {
      
      // セッションに値を保存する
      $_SESSION['join'] = $_POST;
      header('Location: picture_add');
      exit();
    }
  }
  //書き直し処理
  if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'rewrite'){
    $_POST = $_SESSION['join'];
    $nick_name = $_POST['nick_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $error['rewrite'] = true;
  }
 ?>

 <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="../assets/ico/favicon.png">

      <title>Sigh In</title>


    </head>

    <body>
   

   <div class="container">
     <div class="row">
       <div class="col-md-6 col-md-offset-3 content-margin-top">
        <br>
        <br>
        <br>
         <legend>会員登録</legend>
         <form method="post" action="" class="form-horizontal" role="form" enctype="multipart/form-data">
           <!-- ニックネーム -->
           <div class="form-group">
             <label class="col-sm-4 control-label">ニックネーム</label>
             <div class="col-sm-8">
               <input type="text" name="nick_name" class="form-control" placeholder="Ex： セブ太郎" value="<?php echo $nick_name; ?>">
               <?php if(isset($error['nick_name']) && $error['nick_name'] == 'blank'): ?>
                  <p style="color: red;">*ニックネームを入力してください</p>
               <?php endif; ?>
             </div>
           </div>

           <!-- メールアドレス -->
           <div class="form-group">
             <label class="col-sm-4 control-label">メールアドレス</label>
             <div class="col-sm-8">
               <input type="email" name="email" class="form-control" placeholder="Ex： cebu_log@net.com" value="<?php echo $email; ?>">
               <?php if(isset($error['email']) && $error['email'] == 'blank'): ?>
                  <p style="color: red;">*メールアドレスを入力してください</p>
               <?php endif; ?>
               <?php if(isset($error['email']) && $error['email'] == 'duplicate'): ?>
                  <p style="color: red;">指定されたメールアドレスは登録されています</p>
               <?php endif; ?>
             </div>
           </div>
           <!-- パスワード -->
           <div class="form-group">
             <label class="col-sm-4 control-label">パスワード</label>
             <div class="col-sm-8">
               <input type="password" name="password" class="form-control" placeholder="" value="<?php echo $password; ?>">

               <?php if(isset($error['password']) && $error['password'] == 'blank'): ?>
                  <p style="color: red;">パスワードを入力してください</p>
               <?php endif; ?>
               
               <?php if(isset($error['password']) && $error['password'] == 'length'): ?>
                  <p style="color: red;">パスワードは4文字以上で入力してください</p>
               <?php endif; ?>
             </div>
           </div>
          

           <input type="submit" class="btn btn-default" value="トップ画像登録へ">
         </form>
       </div>
     </div>
   </div>

     