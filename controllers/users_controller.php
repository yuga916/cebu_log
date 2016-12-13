<?php
    special_echo('users_controller.phpが呼び出されました。');
    require('models/user.php');
    require('models/picture.php');
    // インスタンス化
    $controller = new UsersController();
    // アクションによって呼び出すメソッドを変える
    switch ($action) {
//サインアップの処理
      case 'signup':
        $controller->signup($post, $id);
        break;
//チェック画面の表示
      case 'check':
        $controller->check();
        break;
//ログイン画面の表示
      case 'login':
        $controller->login();
        break;
//ログイン処理
      case 'auth':
              if (!empty($post['email']) && !empty($post['password'])) {
                  $controller->auth($post);
              } else {
                  header('Location: login');
                  exit();
              }
              break;


//ログアウト機能
        case 'logout':
            $controller->logout();
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
//会員登録
       case 'create':
        $controller->create($post);
        break;
//ユーザーページ表示
        case 'user_page':
          $controller->user_page($id);
          break;

//フォロー機能
      case 'follow':
          $controller->follow($id);
          break;
 
//アンフォロー機能
      case 'unfollow':
          $controller->unfollow($id);
          break;

//フォロー一覧表示
       case 'followings':
        $controller->followings($id);
        break;
//フォロワー一覧表示
       case 'followers':
        $controller->followers($id);
        break;

//ユーザー情報の編集
      case 'edit':
        $controller->edit($id);
        break;
      case 'update':
        $controller->update($post,$id);
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
        private $viewPictures;
        private $followings;
        private $followers;
        private $viewFollows;
        private $viewErrors;

        
        function __construct() {
            $this->user = new User();
            $this->picture = new Picture();
            $this->resource = 'users';
            $this->action = 'signup';
            $this->viewOptions = array('nick_name' => '', 'email' => '', 'password' => '',);
            $this->viewPictures = array();
            $this->viewFollows = array();
            $this->followings = array();
            $this->followers = array();
            
        }
//サインアップ処理
         function signup($post, $id) {
            special_echo('Controllerのsignup()が呼び出されました。');
            if (!empty($post)) {
                // 確認画面ボタンが押されたとき
                $error = $this->user->signup_valid($post); // バリデーション用メソッド
                if (!empty($error)) {
                    // エラーがあった場合
                    $this->viewOptions = $post;
                    $this->viewErrors = $error;
                    $this->display();
                } else {
                    // エラーがなかった場合
                    $_SESSION['users'] = $post;
                    header('Location: picture_add');
                    exit();
                }
            } else {
                // 通常遷移のとき
                if ($id == 'rewrite') {
                    // checkから戻るボタンが押されたとき
                    $this->viewOptions = $_SESSION['users'];
                }
                $this->display();
            }
        }
        
// ログインページ表示
        function login() {
            special_echo('Controllerのlogin()が呼び出されました。');
            $this->action = 'login';
            $this->display();
        }
//ログイン処理
        function auth($post) {
                    special_echo('Controllerのauth()が呼び出されました。');
                    $login_flag = $this->user->auth($post);
                    if ($login_flag) {
                        header('Location:/cebu_log/');
                        exit();
                    } else {
                        header('Location:login');
                        exit();
                    }
                }
//ログアウト
        function logout() {
                    special_echo('Controllerのlogout()が呼び出されました。');
                    // セッション変数を全て解除する
                    $_SESSION = array();
                    // セッションを切断するにはセッションクッキーも削除する。
                    // Note: セッション情報だけでなくセッションを破壊する。
                    if (ini_get("session.use_cookies")) {
                        $params = session_get_cookie_params();
                        setcookie(session_name(), '', time() - 42000,
                            $params["path"], $params["domain"],
                            $params["secure"], $params["httponly"]
                        );
                    }
                    // 最終的に、セッションを破壊する
                    session_destroy();
                    header('Location: /cebu_log/');
                    exit();
                }

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
//登録チェックページの表示
        function check() {
             special_echo('Controllerのcheck()が呼び出されました。');
             $this->viewOptions = $_SESSION['users'];
             $this->action = 'check';
             $this->display();
         }
//会員登録処理
        function create($post) {
            special_echo('Controllerのcreate()が呼び出されました。');
            $this->user->create($post);
            header('Location: thanks');
            exit();
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
        function user_page($id) {
            special_echo('Controllerのuser_page()が呼び出されました。');
            special_echo('$idは' . $id . 'です。');
            $this->viewOptions = $this->user->user_page($id);
            $this->viewPictures = $this->picture->user_page_picture($id);
            $this->viewFollows = $this->user->is_follow($id); 
            $this->followings = $this->user->countFollowing($id); 
            $this->followers = $this->user->countFollower($id); 
            special_var_dump($this->viewOptions);
            $this->action = 'user_page';
            $this->display();
        }



//フォロー機能
        function follow($id) {
            special_echo('users_controllerのfollow()が呼び出されました');
            $this->user->follow($id);
           header('Location: /cebu_log/users/user_page/' . $id);
    
        }

//アンフォロー機能
        function unfollow($id) {
            special_echo('users_controllerのunfollow()が呼び出されました');
            $this->user->unfollow($id);
            header('Location: /cebu_log/users/user_page/' . $id);
        }

//フォロー一覧ページ
        function followings($id){
            special_echo('users_controllerのfollowings()が呼び出されました');
            $this->followings = $this->user->followings($id);
            special_var_dump($this->followings);
            $this->action = 'following';
            $this->display();
        }

//フォロワー一覧ページ
        function followers($id){
            special_echo('users_controllerのfollowers()が呼び出されました');
            $this->followers = $this->user->followers($id);
            $this->action = 'follower';
            $this->display();
        }

//ユーザー情報の編集
        function edit($id) {
            special_echo('Controllerのedit()が呼び出されました。');
            // model処理
            $this->viewOptions = $this->user->edit($id);
            $this->action = 'edit';
            $this->display();
        }

//ユーザー情報のアップデート処理
        function update($post,$id) {
            $this->user->update($post);
            header('Location:/cebu_log/users/user_page/' . $id);
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
