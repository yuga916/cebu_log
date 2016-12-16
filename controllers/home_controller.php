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
        $controller->show();
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
        private $Counts;
        private $viewlikesranks;
        private $viewrealtimepics;
        private $i;


        function __construct() {
            $this->resource = 'home';
            $this->action = 'home';
            $this->picture = new Picture();
            $this->user = new User();
            $this->viewOptions = array();
            $this->Counts = array();
            $this->viewlikesranks=array();
            $this->viewrealtimepics=array();
            $this->i=0;
        }

        function home() {
            special_echo('Controllerのhome()が呼び出されました。');
            // モデルを呼び出してデータを返り値として取得
            $this->viewOptions = $this->picture->random();
            $this->Counts = $this->picture->count();
            special_var_dump($this->Counts);
            special_var_dump($this->viewOptions);
            $this->viewlikesranks=$this->user->shopslikesranking();
            special_var_dump($this->viewlikesranks);
            $this->viewrealtimepics=$this->picture->realtime_top();
            special_var_dump($this->viewlikesranks);
            special_var_dump($this->viewrealtimepics);
            //pecial_var_dump($this->Counts);
            // データをViewに送る
            $this->display();
        }


        // Viewを表示するメソッド
        function display() {
            require('views/layouts/application.php');
        }
    }
 ?>





