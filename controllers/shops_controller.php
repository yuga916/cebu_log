<?php
    special_echo('shops_controller.phpが呼び出されました。');

    require('models/shop.php');
    require('models/picture.php');
    require('models/tweet.php');

    // require('models/tweet.php');
    // require('models/user.php');

    // インスタンス化
    $controller = new ShopsController();

    // アクションによって呼び出すメソッドを変える
    switch ($action) {
    
      case 'show':
        $controller->show($id);
        break;

//like機能
      case 'like':
          $controller->like($id);
          break;
 
//unlike機能
      case 'unlike':
          $controller->unlike($id);
          break;

//新規shopページの作成画面
      case 'add':
        $controller->add();
        break;

      case 'create':
        if (!empty($post['title']) && !empty($post['body'])) {
            $controller->create($post);
        } else {
            $controller->add();
        }
        break;

//Tweet投稿
       case 'tweet':
        $controller->tweet($post,$file);
        break;



        default:
          # code...
          break;
    }


// コントローラのクラス
    class ShopsController {

        // プロパティ
        private $shop;
        private $resource;
        private $action;
        private $viewOptions;

        function __construct() {
            $this->shop = new Shop();
            $this->picture_top = new Picture();
            $this->picture = new Picture();
            $this->tweet = new Tweet();
            $this->resource = 'shops';
            $this->action = 'index';
            $this->viewOptions = array();
            $this->Picture_tops = array();
            $this->viewPictures = array();
            $this->viewTweets = array();
            $this->viewTwpictures = array();
            $this->viewLikes = array();
            $this->likeCounts = '';
        }


// 詳細ページ表示アクション
        function show($id) {
            special_echo('Controllerのshow()が呼び出されました。');
            special_echo('$idは' . $id . 'です。');

            $this->Picture_tops = $this->picture->shop_top($id);
            $this->viewOptions = $this->shop->show($id);
            $this->viewPictures = $this->picture->shop_picture_show($id);
            $this->viewTweets = $this->tweet->shop_tweet_show($id);
            $this->viewTwpictures = $this->picture->shop_twpicture_show($id);
            $this->viewLikes = $this->shop->is_like($id);
            $this->likeCounts = $this->shop->count_like($id);

            // special_var_dump($this->viewOptions);
            $this->action = 'show';
            $this->display();
        }

//like機能
        function like($id) {
            $this->viewLikes = $this->shop->like($id);
            $this->action = 'like';
            header('Location: /cebu_log/shops/show/' . $id);
        }

//unlike機能
        function unlike($id) {
            $this->shop->unlike($id);
            header('Location: /cebu_log/shops/show/' . $id);
        }
      
      

        // 新規shopページの作成画面
        function add() {
            special_echo('Controllerのadd()が呼び出されました。');
            $this->action = 'add';
            $this->display();
        }

        
        // Viewを表示するメソッド
        function display() {
            require('views/layouts/application.php');
        }
    }
 ?>







