<?php
    special_echo('timelines_controller.phpが呼び出されました。');

    require('models/user.php');
    require('models/picture.php');
    require('models/timeline.php');    

    // インスタンス化
    $controller = new TimelinesController();

    // アクションによって呼び出すメソッドを変える
    switch ($action) {
      
      case 'show':
        $controller->show($_SESSION['id']);
        break;

      case 'realtime':
        $controller->realtime($id);
        break;

      case 'index':
        $controller->index($get['search_word'],$_SESSION['id']);
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
        private $timeline;

        function __construct() {
            $this->user = new User();
            $this->picture = new Picture();
            $this->timeline=new Timeline();
            $this->resource = 'timelines';
            $this->action = 'index';
            $this->viewOptions = array();
            $this->viewResultsTweets=array();
        }

        //  検索結果表示アクション
        function index($search_word,$id) {
            special_echo('Controllerのindex()が呼び出されました。');
            if (empty($search_word)) {
                header('Location:show');
                exit();
            }
            else{
            // モデルを呼び出してデータを返り値として取得
            $this->viewResultsTweets = $this->timeline->search($search_word,$id);
            //special_var_dump($search_word);
            //special_var_dump($this->viewResultsTweets);
            $this->action='show';
            // データをViewに送る
            $this->display();
            }
        }

        //  リアルタイム表示アクション
        function realtime() {
            special_echo('Controllerのrealtime()が呼び出されました。');
            
            // モデルを呼び出してデータを返り値として取得
            $this->viewOptions = $this->picture->random();

            // データをViewに送る
            $this->display();
        }

        // タイムラインの表示アクション//following_idを代入
        function show($id) {
            special_echo('Controllerのshow()が呼び出されました。');
            special_echo('$idは' . $id . 'です。');
            $this->viewOptions = $this->timeline->show($id); // 戻り値 $rtnを受け取る
            special_var_dump($this->viewOptions);
            //special_var_dump($this->viewResultsTweets);
            $this->action = 'show';
            special_var_dump($_SESSION['id']);
            $this->display();
        }


        // Viewを表示するメソッド
        function display() {
            require('views/layouts/application.php');
        }
    }
 ?>





