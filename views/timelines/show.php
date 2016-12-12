<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title></title>

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


    <!-- oneline_bbs -->
    <link rel="stylesheet" href="assets/css/form.css">
    <link rel="stylesheet" href="assets/css/timeline.css">

    
  </head>


   <div class="container" style="padding-top: 40px;">

     

   
        <!-- 画面左側 -->
      <div class="col-md-4 content-margin-top">
        <!-- form部分 --> 
      
      </div><!-- col-md-4 content-margin-top -->

      <!-- 画面右側 -->
      <div class="col-md-8 content-margin-top">
        <div class="timeline-centered">
      <!-- 検索ボックスの表示 -->
      <form action="index.php" method="get" class="form-horizontal">
        <input type="text" name="search_word">
        <!-- index.php?['key'] = ['value']; -->
        <!-- inputに入力されたvalueを取り出すには、$_GET['search_word'] -->
        <!--　つぶやきの表示 -->
        <input type="submit" value="検索" class="btn btn-success btn-xs">
      </form>
      <br>
      <br>
      <br>
      <br>

        <?php foreach($this->viewOptions as $viewOption): ?>

        
                  <article class="timeline-entry">
                      
                              
                          <div class="timeline-label">
                            <img src="cebu_log/uploads/users/<?php echo $viewOption['picture_path']; ?>" width="48" height="48"
                            style="border-radius: 10px;
                                  height: 40px;
                                  width: 40px;">
                              

                            &nbsp;&nbsp;<p style="display:inline;">name:hoge</a></p>&nbsp;&nbsp;date:2016年<br><br>
                            <p>hogehoge</p>

                              <!-- 投稿画像の表示 -->
                               <img src="post_img/<?php echo $tweet['img_col']; ?>" width="300">
                               <br>
                               <br>

                                  <i class="fa fa-trash-o" style="float: right;"></i>
                                  <!-- ①ゴミ箱をクリック -->
                                  <!-- ②クリック後、http://localhost/oneline_bbs/bbs.php?action=edit&id=8のようなアドレスに遷移 -->
                                  <i class="fa fa-pencil-square-o" style="float: right;  margin-right: 5px;"></i>
                          </div>
                        
                      

                  </article>
        </div><!-- timeline-centered -->
      <?php endforeach; ?>


          <ul>
                
                  <li style="display: inline-block;">前</li>
                  <li style="display: inline-block;">次</li>
    
                
                
          </ul>
      </div>
     </div>
    </div><!-- container -->
        
          <article class="timeline-entry begin">
              <div class="timeline-entry-inner">
                  <div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
                      <i class="entypo-flight"></i> 
                  </div>
              </div>
          </article>


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
