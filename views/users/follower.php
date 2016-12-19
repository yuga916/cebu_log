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
  <?php special_var_dump($this->followers); ?>
  

  <div class="container">
    <div class="row">
      <br>
      <br>
      <br>
     <legend>フォロワ一一覧</legend>
    </div>
  </div>
  
  <div class="container" style="padding-top: 40px;">
        <div class="row mt">

          <?php foreach($this->followers as $follower): ?>        
             <div class="col-lg-4">
                      <article class="timeline-entry">        
                              <div class="timeline-label">
                                <img src="<?php echo makePath() ?><?php echo $follower['picture_path']; ?>" width="48" height="48"
                                style="border-radius: 10px;
                                      height: 80px;
                                      width: 80px;">

                                &nbsp;&nbsp;<p style="display:inline;">name:<a href="<?php echo makePath() ?>users/user_page/<?php echo $follower['id']; ?>"><?php echo $follower['nick_name']; ?></a></p>
                
                
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                  
                              </div> 
                      </article>
            </div>
          <?php endforeach; ?>


          
      </div>
     </div>
    
        
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
