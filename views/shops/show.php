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


    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    
    
    
  </head>

  <?php if(!empty($_POST)): ?>
  　<?php special_var_dump($_POST); ?>
　<?php endif; ?>
  <?php special_var_dump($this->likeCounts); ?>
  <?php special_var_dump($this->viewLikes['m_id']); ?>
  
  

  
  
  <!-- WELCOME SECTION -->
    <div class="container">
      <div class="row mt centered">
        <div class="col-lg-8 col-lg-offset-2">
          <h1><b><?php echo $this->viewOptions['shop_name']; ?>
            <br>
            <br>

            <?php if(is_null($this->viewLikes['m_id'])): ?>
              </b><a href="<?php echo makePath() ?>shops/like/<?php echo $this->viewOptions['shop_id']; ?>"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a></h1>
            <?php else: ?>
              </b><a href="<?php echo makePath() ?>shops/unlike/<?php echo $this->viewOptions['shop_id']; ?>"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a></h1>
            <?php endif; ?>
          

          <p>総いいね数：<?php echo $this->likeCounts['like_cnt']; ?></p>
        </div>
      </div><!-- /row -->
    </div><!-- /.container -->
    
    <!-- MAC IMAGE -->
   
      <div class="container">
        <div class="row centered">
          <div class="col-lg-10 col-lg-offset-1">
            <?php if (!empty($this->Picture_tops['shop_picture_path'])): ?>
            <img class="" src="<?php echo makePath() ?>uploads/pictures/<?php echo $this->Picture_tops['shop_picture_path']; ?>" alt="Spot Theme" 
            style="height: auto;
                   width: 500px;
                   text-align:center;">
            <?php endif; ?>
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
          <h3>The Features Of Shop</h3>
          <p><?php echo $this->viewOptions['shop_intro']; ?></p>
        </div>
        
        <div class="col-lg-4 col-lg-offset-1 desc">
          <br>
          <br>
          <br>
          <p>ランチでは残念ながら彼のお口に合わなかったようですが、夜に私が訪れた限りではかなりのオススメのレストランでした！（たぶん斎藤さんは値段を気にしすぎて美味しいのを見逃してたんでしょう。ちっちゃい男です）今回は夜のディナー時の雰囲気、味、値段を交えてご紹介していきたいと思います。<br>
          
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
            <iframe height="400" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.es/maps?t=m&amp;ie=UTF8&amp;q=loc:<?php echo sprintf("%.15f",$this->viewOptions['shop_lat']); ?>,<?php echo sprintf("%.15f",$this->viewOptions['shop_lng']); ?>&amp;spn=67.34552,156.972656&amp;z=17&amp;output=embed"></iframe>
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
      <p><a href="<?php echo makePath() ?>pictures/all_show/<?php echo $this->viewOptions['shop_id']; ?>"><i class="fa fa-angle-right"></i> See All Posts</a></p>
    </div>
  </div><!-- container -->

      
    <div class="container">

     <?php foreach($this->viewPictures as $viewPicture): ?>
        <div class="col-md-3 ">
            <figure>
                <?php if ($viewPicture['shop_picture_path']!==''): ?>
                    <img class="img-responsive" src="<?php echo makePath() ?>uploads/pictures/<?php echo $viewPicture['shop_picture_path'] ?>" >
                    <br>
                <?php endif ?>
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
        <p>Let's talk about <?php echo $this->viewOptions['shop_name']; ?></p>
      </div><!-- col-lg-8-->
    </div><!-- row -->

   
        <!-- 画面左側 -->
      <div class="col-md-4 content-margin-top">
        <!-- form部分 --> 
      <form action="<?php echo makePath() ?>tweets/post_tweet_validation" method="post" enctype="multipart/form-data" onsubmit="if(this.tweet.value==''){alert(this.tweet.name+' が未入力です');return false}">

          <!-- つぶやき入力画面 -->
          <div class="form-group">
            <div class="input-group" data-validate="length" data-length="4">
              <textarea type="text" class="form-control" name="tweet" id="validate-length" cols="50" rows="5" placeholder="comment"></textarea>
            </div>
          </div>
          <!--hiddenでデータを送信-->
          <input type="hidden" name="reply_tweet_id" value="1">

          <!-- 画像の投稿枠 -->
          <input type="file" name="picture_path">

                <!--hiddenでデータを送信-->
          <input type="hidden" name="owner_id" value="<?php echo $_SESSION['id']; ?>">
                <!--hiddenでデータを送信-->

          <input type="hidden" name="s_id" value="<?php echo $this->viewOptions['shop_id']; ?>">
                          <!--hiddenでデータを送信-->


          <br>
          
         <select class="form-control" name="categoly">
            <?php while($categoly=mysqli_fetch_assoc($this->viewsoptionsCategoly)): ?>
            <option value="<?php echo($categoly['categoly_id']);?>"><?php echo($categoly['categoly']);?></option>   
            <?php endwhile ?>
        </select>

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
      <form action="<?php echo makePath() ?>shops/show/<?php echo $this->viewOptions['shop_id']; ?>
" method="get" class="form-horizontal">
        <input type="text" name="search_word">
        <!-- index.php?['key'] = ['value']; -->
        <!-- inputに入力されたvalueを取り出すには、$_GET['search_word'] -->
        <!--つぶやきの表示 -->
        <input type="submit" value="検索" class="btn btn-success btn-xs">
      </form>
      <br>
        <?php if ($this->results=="blank"): ?>
          <p style="color: red;">*検索結果が０件です。再検索してください。</p>
        <?php endif ?>

        <?php foreach($this->viewSamples as $viewSample): ?>

        
                  <article class="timeline-entry">
                      
                              
                          <div class="timeline-label">

                            <img src="<?php echo makePath() ?><?php echo $viewSample['picture_path']; ?>" width="48" height="48" style="border-radius: 10px;
                                  height: 40px;
                                  width: 40px;">
                              
                            &nbsp;&nbsp;<p style="display:inline;">name:<a href="<?php echo makePath() ?>users/user_page/<?php echo $viewSample['id']; ?>"><?php echo $viewSample['nick_name']; ?></a></p>
                            &nbsp;&nbsp;date:<?php echo $viewSample['created']; ?>
                                  <?php if(isset($_SESSION['id']) AND ($viewSample['m_id'] == $_SESSION['id'])): ?>
                                  <a href="<?php echo makePath() ?>tweets/delete/<?php echo $viewSample['tweet_id'] ?>"><i class="fa fa-trash-o fa-2" aria-hidden="true" style="float: center;" ></i></a>
                                  <?php endif; ?>
                            <p><?php echo $viewSample['tweet']; ?></p>

                              <!-- 投稿画像の表示 -->
                                <?php if ($viewSample['shop_picture_path']!==''): ?>
                               <img src="<?php echo makePath() ?>uploads/pictures/<?php echo $viewSample['shop_picture_path']; ?>" width="300">                 
                                <?php endif ?>
                               <br>
                               <br>

                          </div>
                       <br>
                       <br>

                      

                  </article>
                <?php endforeach; ?>
        </div><!-- timeline-centered -->
          <br>
          <br>
        
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
