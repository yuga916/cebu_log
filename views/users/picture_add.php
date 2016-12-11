<?php
 
  function uploadImageFile() { // Note: GD library is required for this function
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $iWidth = $iHeight = 200; // desired image result dimensions
              $iJpgQuality = 90;
              
              if ($_FILES) {
                  // if no errors and size less than 250kb
                  if (! $_FILES['image_file']['error'] && $_FILES['image_file']['size'] < 250 * 1024) {
                      if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {
                          // new unique filename
                          $sTempFileName = 'member_img/' . md5(time().rand());
                          // move uploaded file into cache folder
                          move_uploaded_file($_FILES['image_file']['tmp_name'], $sTempFileName);
                          // $_SESSION['join']['image_file'] = $sResultFileName;
                          // change file permission to 644
                          @chmod($sTempFileName, 0750);
                              if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
                                  $aSize = getimagesize($sTempFileName); // try to obtain image info
                                  if (!$aSize) {
                                      @unlink($sTempFileName);
                                      return;
                                  }
                                      // check for image type
                                      switch($aSize[2]) {
                                      case IMAGETYPE_JPEG:
                                      $sExt = '.jpg';
                                      // create a new image from file 
                                      $vImg = @imagecreatefromjpeg($sTempFileName);
                                      break;
                                      case IMAGETYPE_PNG:
                                      $sExt = '.png';
                                      // create a new image from file 
                                      $vImg = @imagecreatefrompng($sTempFileName);
                                      break;
                                      default:
                                      @unlink($sTempFileName);
                                      return;
                                      }
                                      // create a new true color image
                                      $vDstImg = @imagecreatetruecolor( $iWidth, $iHeight );
                                      // copy and resize part of an image with resampling
                                      imagecopyresampled($vDstImg, $vImg, 0, 0, (int)$_POST['x1'], (int)$_POST['y1'], $iWidth, $iHeight, (int)$_POST['w'], (int)$_POST['h']);
                                      // define a result image filename
                                      $sResultFileName = $sTempFileName . $sExt;
                                      $_SESSION['join']['image_file'] = $sResultFileName;
                                      // output image to file
                                      imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                                      @unlink($sTempFileName);
                                      return $sResultFileName;
                              }
                          }
                      }
              }

      }
      
  }
      $sImage = uploadImageFile();

      
        if (!empty($_POST['submit'])) {
         header('Location: check');
         exit();
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
      <link rel="shortcut icon" href="/cebu_log/webroot/assets/ico/favicon.png">

      <title>Sigh In</title>

      <!-- Bootstrap core CSS -->
      <link href="/cebu_log/webroot/assets/css/bootstrap.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <!-- <link href="/cebu_log/webroot/assets/css/main.css" rel="stylesheet"> -->

      <link href="/cebu_log/webroot/assets/css/font-awesome.min.css" rel="stylesheet">

      <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
      
      <script src="/cebu_log/webroot/assets/js/modernizr.custom.js"></script>

      
      

      <!-- add styles -->
      <link href="/cebu_log/webroot/assets/top_img/test.css" rel="stylesheet" type="text/css" />
      <link href="/cebu_log/webroot/assets/top_img/tapmodo-Jcrop-1902fbc/css/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />


      <!-- add scripts -->
      <script src="/cebu_log/webroot/assets/top_img/tapmodo-Jcrop-1902fbc/js/jquery.min.js"></script>
      <script src="/cebu_log/webroot/assets/top_img/tapmodo-Jcrop-1902fbc/js/jquery.Jcrop.min.js"></script>
      <script src="/cebu_log/webroot/assets/top_img/test.js"></script>
      </head>

      <script src="/cebu_log/webroot/js/main.js"></script>


<body>
    

      <div class="bbody">
        <!-- upload form -->
        <form id="upload_form" enctype="multipart/form-data" method="post" action="" onsubmit="return checkForm()">
        
        
        <!-- hidden crop params -->
        <?php if(empty($_POST)) : ?>
            <input type="hidden" id="x1" name="x1" />
            <input type="hidden" id="y1" name="y1" />
            <input type="hidden" id="x2" name="x2" />
            <input type="hidden" id="y2" name="y2" />
            <h2>Step1: 写真を選択してください</h2>
            <div><input type="file" name="image_file" id="image_file" onchange="fileSelectHandler()" /></div>
            <div class="error"></div>
            <div class="step2">
            <h2>Step2: 写真を切り取ってください</h2>
            <img id="preview" />
            <div class="info">
            <label>File size</label> <input type="text" id="filesize" name="filesize" />
            <label>Type</label> <input type="text" id="filetype" name="filetype" />
            <label>Image dimension</label> <input type="text" id="filedim" name="filedim" />
            <label>W</label> <input type="text" id="w" name="w" />
            <label>H</label> <input type="text" id="h" name="h" />
            </div>
            <input type="submit" value="Upload" />
            </div>
            </form>
            </div>
        </div>
        <?php else : ?>

        <h2>この写真で良いですか？</h2>
        <br>
          <?php echo '<img src="'.$sImage.'" />';?>
          <h2>この写真で良いですか？</h2>
          <br>
            <?php echo '<img src="../'.$sImage.'">';?>      
          
        
        <a href="check"><button type="button">確認画面へ</button></a>

          <a href="check"><button type="button">確認画面へ</button></a>
        <?php echo '</div>' ?>

      <?php endif; ?>

    

        

</body>
</html>