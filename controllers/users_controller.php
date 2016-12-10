<?php
    special_echo('users_controller.phpが呼び出されました。');

    require('models/user.php');

    // インスタンス化
    $controller = new UsersController();

    // アクションによって呼び出すメソッドを変える
    switch ($action) {
//ログイン画面
      case 'login':
      $controller->login();
      break;

//新規登録チェック画面
      case 'check':
      $controller->check();
      break;

//サンクスページの表示
      case 'thanks':
      $controller->thanks();
      break;

//ランキングページの表示
      case 'rank':
        $controller->rank();
        break;

      case 'realtime':
        $controller->realtime($id);
        break;

//新規登録ページ
      case 'add':
        $controller->add();
        break;

//userのtop画像登録
      case 'picture_add':
        $controller->picture_add();
        break;


      case 'create':
        if (!empty($post['title']) && !empty($post['body'])) {
            $controller->create($post);
        } else {
            $controller->add();
        }
        break;

//ユーザーページ表示
        case 'user_page':
          $controller->user_page();
          break;

//フォロー一覧表示
       case 'show_follow':
        $controller->show_follow();
        break;

//フォロワー一覧表示
       case 'show_follower':
        $controller->show_follower();
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
    class UsersController {

        // プロパティ
        private $user;
        private $resource;
        private $action;
        private $viewOptions;

        function __construct() {
            $this->user = new User();
            $this->resource = 'users';
            $this->action = 'index';
            $this->viewOptions = array();
        }

// ログインページ表示
        function login() {
            special_echo('Controllerのlogin()が呼び出されました。');
            $this->action = 'login';
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
            $this->viewOptions = $this->blog->show($id); // 戻り値 $rtnを受け取る
            // special_var_dump($this->viewOptions);
            $this->action = 'show';
            $this->display();
        }


//会員登録表示ページ
        function add() {
            special_echo('Controllerのadd()が呼び出されました。');
            $this->action = 'add';
            $this->display();
        }

//TOP画像登録ページ
        function picture_add() {
            special_echo('Controllerのpicture_add()が呼び出されました。');
            $this->action = 'picture_add';
            $this->display();
        }

//会員登録処理
        function create($post) {
            special_echo('Controllerのcreate()が呼び出されました。');
            $this->user->create($post);
            header('Location: index');
        }

//登録チェックページの表示
         function check() {
             special_echo('Controllerのcheck()が呼び出されました。');
             $this->action = 'check';
             $this->display();
         }   

//サンクスページの表示     
         function thanks() {
             special_echo('Controllerのthanks()が呼び出されました。');
             $this->action = 'thanks';
             $this->display();
         }

//ランキングページの表示
        function rank() {
            special_echo('Controllerのrank()が呼び出されました。'); 
            $this->action = 'rank';
            $this->display();
        }

// ユーザーページ表示アクション
        function user_page() {
            special_echo('Controllerのuser_page()が呼び出されました。');
            $this->action = 'user_page';
            $this->display();
        }


// フォロー一覧表示アクション
        function show_follow() {
            special_echo('Controllerのshow_follow()が呼び出されました。');
            $this->action = 'show_follow';
            $this->display();
        }

// フォロワー一覧表示アクション
        function show_follower() {
            special_echo('Controllerのshow_follower()が呼び出されました。');
            $this->action = 'show_follower';
            $this->display();
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

        // Viewを表示するメソッド
        function display() {
            require('views/layouts/application.php');
        }
    }
 ?>





