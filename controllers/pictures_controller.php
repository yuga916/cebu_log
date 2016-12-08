<?php
    special_echo('pictures_controller.phpが呼び出されました。');

    require('models/picture.php');

    // インスタンス化
    $controller = new PicturesController();

    // アクションによって呼び出すメソッドを変える
    switch ($action) {
//トップページのランダム表示
      case 'random':
        $controller->random();
        break;

      case 'realtime':
        $controller->realtime();
        break;

      case 'add':
        $controller->add();
        break;


//food一覧ページ表示
      case 'all_show':
        $controller->all_show($id);
        break;

      case 'create':
        if (!empty($post['title']) && !empty($post['body'])) {
            $controller->create($post);
        } else {
            $controller->add();
        }
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

//like機能
      case 'like':
          $controller->like();
          break;
 
 //unlike機能
      case 'unlike':
          $controller->unlike();
          break;


      default:
        # code...
        break;
    }

    // コントローラのクラス
    class PicturesController {

        // プロパティ
        private $blog;
        private $resource;
        private $action;
        private $viewOptions;

        function __construct() {
            $this->picture = new Picture();
            $this->resource = 'pictures';
            $this->action = 'realtime';
            $this->viewOptions = array();
        }

        //  一覧ページ表示アクション
        function random() {
            special_echo('Controllerのrandom()が呼び出されました。');
            
            // モデルを呼び出してデータを返り値として取得
            $this->viewOptions = $this->picture->random();

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
        function all_show($id) {
            special_echo('Controllerのall_show()が呼び出されました。');
            special_echo('$idは' . $id . 'です。');
            $this->viewOptions = $this->picture->all_show($id); // 戻り値 $rtnを受け取る
            // special_var_dump($this->viewOptions);
            $this->action = 'all_show';
            $this->display();
        }

        function add() {
            special_echo('Controllerのadd()が呼び出されました。');
            $this->action = 'add';
            $this->display();
        }

        function create($post) {
            special_echo('Controllerのcreate()が呼び出されました。');
            $this->blog->create($post);
            header('Location: index');
        }

        function edit($id) {
            special_echo('Controllerのedit()が呼び出されました。');

            // model処理
            $this->viewOptions = $this->blog->edit($id);

            $this->action = 'edit';
            $this->display();
        }

        function update($post) {
            $this->blog->update($post);
            header('Location: index');
        }

        function delete($id) {
            special_echo('controllerのdeleteが表示されました。');
            $this->blog->delete($id);
            header('Location: ../index');
        }

        function like($option) {
                      special_echo('Controllerのlike()が呼び出されました。');
                      $this->picture->like($option);
                      header('Location: ../index');
                  }
          
                  function unlike($option) {
                      special_echo('Controllerのunlike()が呼び出されました。');
                      $this->picture->unlike($option);
                      header('Location: ../index');
                  }       

        // Viewを表示するメソッド
        function display() {
            require('views/layouts/application.php');
        }
    }
 ?>





