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

            // special_var_dump($this->viewOptions);
            $this->action = 'show';
            $this->display();
        }

//ツイート登録処理
        function tweet($post,$file) {
            special_echo('Controllerのtweet()が呼び出されました。');
            
                if (!empty($post)) {
                
                  if (!empty($file)) {
                    $fileName = $file['shop_picture_path']['name'];
                    $error = $this->shop->file_valid($file); // バリデーション用メソッド

                    if (!empty($error)) {
                            // エラーがあった場合
                            $this->viewOptions = $post;
                            $this->viewErrors = $error;
                            $this->display();
                    } else {
                            // エラーがなかった場合
                            //　投稿画像のアップロード
                            $img_post = date('YmdHis') . $file['shop_picture_path']['name'];
                                move_uploaded_file($_FILES['shop_picture_path']['tmp_name'], 'post_img/' . $img_post);

                            // つぶやきデータが入力されていれば
                            if (!empty($file['shop_picture_path']['name'])) {
                            $img_pic = date('YmdHis') . $_FILES['shop_picture_path']['name'];
                            } else {
                                $img_pic = '';
                            }       
                  }
              }
          }
          $this->shop->tweet($post,$file);
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







