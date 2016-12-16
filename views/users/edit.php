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

      <!-- Bootstrap core CSS -->
      <link href="../assets/css/bootstrap.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="../assets/css/main.css" rel="stylesheet">

      <link href="../assets/css/font-awesome.min.css" rel="stylesheet">

      <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
      
      <script src="assets/js/modernizr.custom.js"></script>

      <!-- street view from brushed -->

    </head>

    <body>
   
   <div class="container">
     <div class="row">
       <div class="col-md-6 col-md-offset-3 content-margin-top">
        <br>
        <br>
        <br>
         <legend>ユーザー情報の編集</legend>
         <form method="post" action="<?php echo makePath() ?>users/update/<?php echo $this->viewOptions['id']; ?>" class="form-horizontal" role="form" enctype="multipart/form-data">
           <!-- 投稿 -->
           <div class="form-group">
             <label class="col-sm-4 control-label">名前</label>
             <div class="col-sm-8">
               <input type="text" name="nick_name" class="form-control" placeholder="Ex： セブ太郎" value="<?php echo $this->viewOptions['nick_name']; ?>">
             </div>
           </div>

           <!-- コメント -->
           <div class="form-group">
             <label class="col-sm-4 control-label">紹介文</label>
             <div class="col-sm-8">
               <textarea name="m_intro" class="form-control" cols="30" rows="5"><?php echo $this->viewOptions['m_intro']; ?></textarea>
             </div>
           </div>
          
           <input type="hidden" name="id" value="<?php echo $this->viewOptions['id']; ?>">
           <input type="submit" class="btn btn-default" value="ユーザー情報を更新">
         </form>
       </div>
     </div>
   </div>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>

       <!-- Bootstrap core JavaScript
       ================================================== -->
       <!-- Placed at the end of the document so the pages load faster -->
       <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
       <script src="../assets/js/bootstrap.min.js"></script>
       <script src="../assets/js/main.js"></script>
     <script src="../assets/js/masonry.pkgd.min.js"></script>
     <script src="../assets/js/imagesloaded.js"></script>
       <script src="../assets/js/classie.js"></script>
     
     
   </body>
 </html>
