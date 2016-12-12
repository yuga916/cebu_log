<?php 
    // Controllerのクラス
        require('models/tweet.php');
        //special_echo("tweets_controllers.phpが読み込まれました。");
        $controller = new TweetsController();

        switch ($action) {
          case 'index': //Tweet表示
            $Controller->index();
            break;

          case 'create': // 新規投稿
            if (!empty($post['title']) && !empty($post['body'])) {
              $controller->create($post);
            } else {
              $controller->index();
            }
            break;

        }

  class TweetsController{
    private $tweet;
    private $resource;
    private $action;
    private $viewOption;
  

      function __construct() {
        $this->tweet = new Tweet();
        $this->resource = 'tweets';
        $this->action = 'index';
        $this->viewOptions = array();
      }

      // tweet：プルダウン内容選択「food・shop」
      // tweet：つぶやき一覧降順（新→古）表示
          function index(){
//            special_echo("tweets_controllersのindex()を通りました");
            $this->viewOptions = $this->tweet->index();
            $this->display();
          }

          function display() {
            require('views/tweets/index.php');
          }
        }


      // 追加候補機能
      // // tweet：返信ボタン
      //     function 
      // // tweet：いいねボタン
      // // tweet：投稿削除ボタン（投稿者のみ）
      //     function delete($post) {
      //       $this->tweet->dekete($id);
      //       header('Location: ../index');
      //     }
 ?>
