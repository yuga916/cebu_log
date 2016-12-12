<?php
    special_echo('home_controller.phpが呼び出されました。');

    require('models/picture.php');
    require('models/user.php');

    // インスタンス化
    $controller = new HomeController();

    // アクションによって呼び出すメソッドを変える
    switch ($action) {
      case 'home':
        $controller->home();
        break;

      case 'show':
        $controller->show($id);
        break;

        default:
        # code...
        break;
    }

    // コントローラのクラス
    class HomeController {

        // プロパティ
        private $home;
        private $picture;
        private $user;
        private $resource;
        private $action;
        private $viewOptions;

        function __construct() {
            $this->picture = new Picture();
            $this->user = new User();
            $this->resource = 'home';
            $this->action = 'home';
            $this->viewOptions = array();
        }

        function home() {
            special_echo('Controllerのhome()が呼び出されました。');
            // モデルを呼び出してデータを返り値として取得
            $this->viewOptions = $this->picture->random();
            // データをViewに送る
            $this->display();
        }


        // Viewを表示するメソッド
        function display() {
            require('views/layouts/application.php');
        }
    }
 ?>





