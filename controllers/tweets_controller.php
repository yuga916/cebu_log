<?php 
    // Controllerのクラス
        require('models/tweet.php');
        //special_echo("tweets_controllers.phpが読み込まれました。");
        $controller = new TweetsController();

        switch ($action) {
          case 'index': //Tweet表示
            $controller->index();
            break;

          case 'create': // 新規投稿
            if (!empty($post['body'])) {
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

          function index(){
//            special_echo("tweets_controllersのindex()を通りました");
            $this->viewOptions = $this->tweet->index();
            $this->display();
          }

          function create($post) {
            $this->tweet->create($post);
            header('Location: index');
          }

          // update
          function update($post) {
            $this->tweet->update($post);
            header('Location: index');
          }

          // delete
          function delete($id) {
            $this->tweet->delete($id);
            header('Location: index');
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
