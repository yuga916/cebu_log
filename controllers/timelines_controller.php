<?php
    special_echo('timelines_controller.phpが呼び出されました。');

    require('models/user.php');
    require('models/picture.php');    

    // インスタンス化
    $controller = new TimelinesController();

    // アクションによって呼び出すメソッドを変える
    switch ($action) {
      
      case 'show':
        $controller->show($id);
        break;

      case 'edit':
        $controller->edit($id);
        break;

      case 'update':
        $controller->update($post);
        break;

      case 'delete':
        $controller->delete($id);
        break;



      default:
        # code...
        break;
    }

    // コントローラのクラス
    class TimelinesController {

        // プロパティ
        private $user;
        private $picture;
        private $resource;
        private $action;
        private $viewOptions;

        function __construct() {
            $this->user = new User();
            $this->picture = new Picture();
            $this->resource = 'timelines';
            $this->action = 'index';
            $this->viewOptions = array();
        }

        //  一覧ページ表示アクション
        function index() {
            special_echo('Controllerのcreate()が呼び出されました。');
            
            // モデルを呼び出してデータを返り値として取得
            $this->viewOptions = $this->user->random();

            // データをViewに送る
            $this->display();
        }

        //  リアルタイム表示アクション
        function realtime() {
            special_echo('Controllerのrealtime()が呼び出されました。');
            
            // モデルを呼び出してデータを返り値として取得
            $this->viewOptions = $this->picture->random();

            // データをViewに送る
            $this->display();
        }

        // 詳細ページ表示アクション
        function show($id) {
            special_echo('Controllerのshow()が呼び出されました。');
            special_echo('$idは' . $id . 'です。');
            $this->viewOptions = $this->user->show($id); // 戻り値 $rtnを受け取る
            // special_var_dump($this->viewOptions);
            $this->action = 'show';
            $this->display();
        }


        // Viewを表示するメソッド
        function display() {
            require('views/layouts/application.php');
        }
    }
 ?>





