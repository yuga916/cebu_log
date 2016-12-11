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

  <?php if(!empty($_POST)): ?>
  　<?php special_var_dump($_POST); ?>
　<?php endif; ?>
    


  <!-- WELCOME SECTION -->
    <div class="container">
      <div class="row mt centered">
        <div class="col-lg-8 col-lg-offset-2">
          <h1><b><?php echo $this->viewOptions['shop_name']; ?>
          </b></h1>
          <p><?php echo $this->viewOptions['shop_intro']; ?></p>
        </div>
      </div><!-- /row -->
    </div><!-- /.container -->
    
    <!-- MAC IMAGE -->
  <div class="container">
    <div class="row centered">
      <div class="col-lg-10 col-lg-offset-1">
        <img class="" src="../../post_img/<?php echo $this->Picture_tops['shop_picture_path']; ?>" alt="Spot Theme" 
        style="height: auto;
               width: 500px;
               text-align:center;">
      </div>
    </div>
  </div>
  <br>
  <br>
  
  <!-- CLIENT INFORMATION -->
  <div id="lg">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-lg-offset-1 desc">
          <h3>The History Of Mt. Fuji</h3>
          <p>Mt. Fuji was thought of as sacred. So women were forbidden from climbing until the Meiji era. It is recorded that a monk climbed Mt. Fuji in 663 for the first time.<br>Mt. Fuji was recognized as a UNESCO world heritage site in 2013.</p>
        </div>
        
        <div class="col-lg-4 col-lg-offset-1 desc">
          <h3>The Features Of Mt. Fuji</h3>
          <p>There are several lakes around Mt. Fuji(Lake Yamanaka, Lake Kawaguchi, Lake Saiko, Lake Motosu and Lake Shojin). These lakes are known as the "Fuji Five Lakes".<br>Sometimes you can clearly see the shadow of Mt. Fuji in the evening.
          </p>
          
          
        </div>
        
      </div><!-- row -->
    </div><!-- container -->
  </div><!-- lg -->
  

  <!-- map -->
  <div id="lg" style="background-color: #f5f5f5;">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
              <div id="mapwrap">
            <iframe height="400" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.es/maps?t=m&amp;ie=UTF8&amp;ll=52.752693,22.791016&amp;spn=67.34552,156.972656&amp;z=6&amp;output=embed"></iframe>
          </div>  
        </div><!--col-lg-8-->
        <div class="col-lg-4">
          <h3>More Information</h3>
          <br>
          <h4><b>ADRESS</b></h4>
          <p>6663-1 Funatsu Kawaguchiko-Town YAMANASHI 401-0301 JAPAN
          </p>
              <br>
              <h4><b>Official Site</b></h4>
              <p><a href="http://www.yamanashi-kankou.jp/visitor/english/"><i class="fa fa-link"></i>Yamanashi travel net</a></p>
              <p class="tm">This site introduces the way to Mt. Fuji, the weather of Mt. Fuji and climbing rule. The warning, clothing and equipment when climbing Mt. Fuji is useful for you.</p>
        </div><!--col-lg-4-->
      </div><!-- row -->
    </div><!-- container -->
  </div><!-- Contact Footer -->
  
  <!-- SINGLE PROJECT STANDOUT IMAGE -->  
  
  <div class="container">
    <div class="row mt centered">
      <div class="col-lg-8 col-lg-offset-2">
        <h1>Photos</h1>
      </div>
    </div><!-- row -->

    <div class="col-lg-8"></div><!-- col-lg-8-->
    <div class="col-lg-4 goright">
      <p><a href="/cebu_log/pictures/all_show/<?php echo $this->viewOptions['shop_id']; ?>"><i class="fa fa-angle-right"></i> See All Posts</a></p>
    </div>
  </div><!-- container -->

      
    <div class="container">
     <?php foreach($this->viewPictures as $viewPicture): ?>
        <div class="col-md-3 ">
            <figure>

              <img class="img-responsive" src="../../post_img/<?php echo $viewPicture['shop_picture_path'] ?>" >
              <br>
            </figure><!-- /figure -->
        </div>
      <?php endforeach; ?>
    </div>
      <br>
      <br>

   <div class="container" style="padding-top: 40px;">

     <div class="row mt">
      <div class="col-lg-12">
        <h1 id="ground">Talk Spot</h1>
      </div><!-- col-lg-12 -->
      <div class="col-lg-8">
        <p>Let's talk about Orange</p>
      </div><!-- col-lg-8-->
    </div><!-- row -->

   
        <!-- 画面左側 -->
      <div class="col-md-4 content-margin-top">
        <!-- form部分 -->
        <!-- /cebu_log/shops/tweet  -->
      <form action="" method="post" enctype="multipart/form-data">
          <!-- つぶやき入力画面 -->
          <div class="form-group">
            <div class="input-group" data-validate="length" data-length="4">
              <textarea type="text" class="form-control" name="tweet" id="validate-length" cols="50" rows="5" placeholder="comment"></textarea>
            </div>
          </div>
          <!-- 画像の投稿枠 -->
          <input type="file" name="shop_picture_path">
          <br>
          <select class="form-control" name="category_id">
                     <option value="0">Food</option>
                     <option value="1">お店の外装、内装</option>
                     <option value="2">その他</option>
          </select>

          <input type="hidden" name="shop_id" value="<?php echo $id; ?>">
          <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">

          <?php if(isset($this->viewErrors['shop_picture_path']) && $this->viewErrors['shop_picture_path'] == 'blank'): ?>
           <p style="color:red;">* 名前を入力してください</p>
          <?php endif; ?>
          <!-- つぶやくボタン -->
          <button type="submit" class="btn btn-primary col-xs-12">つぶやく</button>
        </form>
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

        <?php foreach($this->viewTweets as $viewTweet): ?>
        <?php foreach($this->viewTwpictures as $viewTwpicture): ?>

                  <article class="timeline-entry">
                          <div class="timeline-label">
                            <img src="../../<?php echo $viewTweet['picture_path']; ?>" width="48" height="48"
                            style="border-radius: 10px;
                                  height: 40px;
                                  width: 40px;">
                              

                            &nbsp;&nbsp;<p style="display:inline;">name:<a href="/cebu_log/users/user_page/<?php echo $viewTweet['id']; ?>"><?php echo $viewTweet['nick_name']; ?></a></p>&nbsp;&nbsp;date:<?php echo $viewTweet['created']; ?><br><br>
                            <p><?php echo $viewTweet['tweet']; ?></p>

                              <!-- 投稿画像の表示 -->
                               <img src="../../post_img/<?php echo $viewTwpicture['shop_picture_path']; ?>" width="300">
                               <br>
                               <br>

                                  <i class="fa fa-trash-o" style="float: right;"></i>
                                  <!-- ①ゴミ箱をクリック -->
                                  <!-- ②クリック後、http://localhost/oneline_bbs/bbs.php?action=edit&id=8のようなアドレスに遷移 -->
                                  <i class="fa fa-pencil-square-o" style="float: right;  margin-right: 5px;"></i>
                          </div>
                        
                      

                  </article>
                <?php endforeach; ?>
                <?php endforeach; ?>
        </div><!-- timeline-centered -->

          <ul>
                
                  <li style="display: inline-block;">前</li>
                  <li style="display: inline-block;">前</li>
    
                
                
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
