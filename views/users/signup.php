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
               <input type="text" name="nick_name" class="form-control" placeholder="Ex： セブ太郎" value="<?php echo $this->viewOptions['nick_name']; ?>">
               <?php if(isset($this->viewErrors['nick_name']) && $this->viewErrors['nick_name'] == 'blank'): ?>
                 <p style="color:red;">* 名前を入力してください</p>
              <?php endif; ?>
             </div>
           </div>

           <!-- メールアドレス -->
           <div class="form-group">
             <label class="col-sm-4 control-label">メールアドレス</label>
             <div class="col-sm-8">
               <input type="email" name="email" class="form-control" placeholder="Ex： cebu_log@net.com" value="<?php echo $this->viewOptions['email']; ?>">
               <?php if(isset($this->viewErrors['email']) && $this->viewErrors['email'] == 'blank'): ?>
                  <p style="color:red;">* メールアドレスを入力してください</p>
               <?php endif; ?>
             </div>
           </div>
           <!-- パスワード -->
           <div class="form-group">
             <label class="col-sm-4 control-label">パスワード</label>
             <div class="col-sm-8">
               <input type="password" name="password" class="form-control" placeholder="" value="<?php echo $this->viewOptions['password']; ?>">

               <?php if(isset($this->viewErrors['password']) && $this->viewErrors['password'] == 'blank'): ?>
                <p style="color:red;">* パスワードを入力してください</p>
              <?php endif; ?>
              <?php if(isset($this->viewErrors['password']) && $this->viewErrors['password'] == 'length'): ?>
                <p style="color:red;">* パスワードは４文字以上で入力してください</p>
             <?php endif; ?>
             </div>
           </div>
          

           <input type="submit" class="btn btn-default" value="トップ画像登録へ">
         </form>
       </div>
     </div>
   </div>
  </body>
</html>

     