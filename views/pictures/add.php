<<<<<<< HEAD
<div>
	<form method="POST" action="/cebu_log/pictures/post_validation" enctype="multipart/form-data">
		<input type="hidden" name="owner_id" value="1">

        <div>
        	<p>紹介するお店を名前を指定してください</p>
            <select name="s_id">
              <?php while($shops=mysqli_fetch_assoc($this->viewsoptions_shops)): ?>
              <option value="<?php echo($shops['shop_id']) ?>"><?php echo($shops['shop_name']); ?></option>
            <?php endwhile ?>
            </select>
        </div>

        <div>
        	<p>写真のカテゴリを指定してください</p>
            <select name="categoly">          
              <?php while($categoly=mysqli_fetch_assoc($this->viewsoptions_categoly)): ?>
              <option value="<?php echo($categoly['categoly_id']);?>"><?php echo($categoly['categoly']);?></option>                              
          <?php endwhile ?>
        </div>

		<div>
			<p>写真投稿を行ってください</p>
			<input type="file" name="picture_path">
		</div>
		<div>
		<input type="submit" value="投稿する">	
		</div>

	</form>
</div>
=======
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
         <legend>新規foodの投稿</legend>
         <form method="post" action="index.php" class="form-horizontal" role="form" enctype="multipart/form-data">
           <!-- 投稿 -->
           <div class="form-group">
             <label class="col-sm-4 control-label">投稿写真</label>
             <div class="col-sm-8">
               <input type="text" name="nick_name" class="form-control" placeholder="Ex： Samurai" value="">
             </div>
           </div>

           <div class="form-group">
             <label class="col-sm-4 control-label">写真カテゴリー</label>
              <div class="col-sm-8">
               <select class="form-control" name="nation_id">
                     <option value="0">Food</option>
                     <option value="1">お店の外装、内装</option>
                     <option value="2">その他</option>
              </select>
            </div>
           </div>


           <!-- コメント -->
           <div class="form-group">
             <label class="col-sm-4 control-label">コメント</label>
             <div class="col-sm-8">
               <input type="email" name="email" class="form-control" placeholder="Ex： samurai@net.com" value="">
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
>>>>>>> e08ace28a445dc3799b05aa4f817340fa3ae3175
