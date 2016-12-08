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


      <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
      
      <script src="assets/js/modernizr.custom.js"></script>


      <!-- googleaddress　MAP -->
      <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&sensor=SET_TO_TRUE_OR_FALSE"></script>
      <script src="/cebu_log/webroot/assets/google_map/google_map.js"></script>
      <link href="/cebu_log/webroot/assets/google_map/google_map.css" rel="stylesheet">


    </head>


   <div class="container">
     <div class="row">
       <div class="col-md-6 col-md-offset-3 content-margin-top">
        <br>
        <br>
        <br>
         <legend>新規shopの作成</legend>
         <form method="post" action="index.php" class="form-horizontal" role="form" enctype="multipart/form-data">
           <!-- ニックネーム -->
           <div class="form-group">
             <label class="col-sm-4 control-label">店名</label>
             <div class="col-sm-8">
               <input type="text" name="nick_name" class="form-control" placeholder="Ex： Samurai" value="">
             </div>
           </div>

           <!-- メールアドレス -->
           <div class="form-group">
             <label class="col-sm-4 control-label">紹介文</label>
             <div class="col-sm-8">
               <input type="email" name="email" class="form-control" placeholder="Ex： samurai@net.com" value="">
              
             </div>
           </div>

           <!-- 平均予算 -->
           <div class="form-group">
             <label class="col-sm-4 control-label">平均予算</label>
             <div class="col-sm-8">
               <input type="email" name="email" class="form-control" placeholder="Ex： samurai@net.com" value="">
             </div>
           </div>

           <!-- 地図 -->
           <div class="form-group">
             <label class="col-sm-4 control-label">地図</label>
             <div class="col-sm-8">
               <form>
               <input type="text" value="東京スカイツリー" id="address">
               <input type="button" value="地図検索" id="button">
               </form>

               <!-- 地図を表示させる要素 -->
               <div id="map-canvas"></div>

             </div>
           </div>
          

           <input type="submit" class="btn btn-default" value="トップ画像登録へ">
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
