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
      

    </head>

    <body>
   
   <div class="container">
     <div class="row">
       <div class="col-md-6 col-md-offset-3 content-margin-top">
        <br>
        <br>
        <br>
         <legend>新規foodの投稿</legend>
         <!--post送信後どこにページ遷移する？-->
         <form method="post" action="<?php echo makePath() ?>pictures/post_validation" enctype="multipart/form-data" class="form-horizontal" role="form">
          <!--owner_idを入力-->
         <input type="hidden" name="owner_id" value="1">


           <!-- 投稿 -->
           <div class="form-group">
             <label class="col-sm-4 control-label">お店名</label>
             <div class="col-sm-8">
              <select class="form-control" name="s_id">
                  <?php while($shops=mysqli_fetch_assoc($this->viewsoptionsShops)): ?>
                  <option value="<?php echo($shops['shop_id']) ?>"><?php echo($shops['shop_name']); ?></option>
                  <?php endwhile ?>
               </select>
             </div>
           </div>

           <div class="form-group">
             <label class="col-sm-4 control-label">写真カテゴリー</label>
              <div class="col-sm-8">
               <select class="form-control" name="categoly">
                  <?php while($categoly=mysqli_fetch_assoc($this->viewsoptionsCategoly)): ?>
                  <option value="<?php echo($categoly['categoly_id']);?>"><?php echo($categoly['categoly']);?></option>   
                  <?php endwhile ?>
              </select>
            </div>
           </div>



           <div class="form-group">
             <label class="col-sm-4 control-label">画像のアップロード</label>
             <div class="col-sm-8">
               <input type="file" name="picture_path" class="form-control">
             </div>
           </div>

        
           <input type="submit" class="btn btn-default" value="新規投稿">
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
