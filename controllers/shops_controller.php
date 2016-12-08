<?php
    special_echo('shops_controller.phpが呼び出されました。');

    require('models/shop.php');
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
            $this->resource = 'shops';
            $this->action = 'index';
            $this->viewOptions = array();
        }


// 詳細ページ表示アクション
        function show($id) {
            special_echo('Controllerのshow()が呼び出されました。');
            special_echo('$idは' . $id . 'です。');
            $this->viewOptions = $this->shop->show($id); // 戻り値 $rtnを受け取る
            // special_var_dump($this->viewOptions);
            $this->action = 'show';
            $this->display();
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





