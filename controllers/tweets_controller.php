<?php 
    // Controllerのクラス
        requre('tweets/index.php');
        // special_echo("tweets_controllers.phpが読み込まれました。");
        $controller = new tweetsController();

        switch ($action) {
          case 'index':
            $controller->index();
            break;

          default:
            # code...
            break;
        }

  class TweetsController{
    private $tweet;
    private $resource;
    private $action;
    private $viewOption;
  }

      function__construct() {
        $this->tweet = new Tweet();
        $this->resource = 'tweets';
        $this->action = 'index';
        $this->viewOptions = array();
      }

      // tweet：プルダウン内容選択「food・shop」
      // tweet：つぶやき一覧降順（新→古）表示
          function index(){
            $this->viewOptions = $this->tweet->index();
            require('views/tweets/index.php');
            $this->display();
          }
      // // tweet：返信ボタン
      //     function 
      // // tweet：いいねボタン
      // // tweet：投稿削除ボタン（投稿者のみ）
      //     function delete($post) {
      //       $this->tweet->dekete($id);
      //       header('Location: ../index');
      //     }
 ?>
