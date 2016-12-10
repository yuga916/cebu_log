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

      case 'post_validation':
        $controller->post_validation($post,$files,$fileName);
        break;



//food一覧ページ表示
      case 'all_show':
        $controller->all_show($id);
        break;

      case 'create':
             $controller->create($_SESSION['post'],$_SESSION['picture_path']);
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
        private $picture;
        private $resource;
        private $action;
        private $viewOptions;
        private $viewsoptionsShops;
        private $viewsoptionsCategoly;
        private $viewerrors;


        function __construct() {
            $this->picture = new Picture();
            $this->resource = 'pictures';
            $this->action = 'realtime';
            $this->viewOptions = array();
            $this->viewsoptionsShops=array();
            $this->viewsoptionsCategoly=array();
            $this->viewerrors=array();
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
            $this->action ='add';
            $this->viewsoptionsShops=$this->picture->add_shops();
            //special_var_dump('$this->viewsoptionsShops');
            $this->viewsoptionsCategoly=$this->picture->add_categoly();
            $this->display();
        }

     function create($post,$files){
            special_echo('Controllerのcreate()が呼び出されました。');
            $this->picture->create($post,$files);
              session_destroy();
              header('Location:add');
              exit();
               //header('Location: index');
        }

        function edit($id) {
            special_echo('Controllerのedit()が呼び出されました。');

            // model処理
            $this->viewOptions = $this->picture->edit($id);

            $this->action = 'edit';
            $this->display();
        }

        function update($post) {
            $this->picture->update($post);
            header('Location: index');
        }

        function delete($id) {
            special_echo('controllerのdeleteが表示されました。');
            $this->picture->delete($id);
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
      function post_validation($post,$files,$fileName){
        special_echo('controller`sのpost_validationが呼び出されました');

            if(!empty($post)){          
            $error=$this->picture->post_validation($post,$files);
            special_var_dump($error);
            if(!empty($error)){
              $this->action='post_validation';
              $this->viewerrors=$error;
            $this->viewsoptions_shops=$this->picture->add_shops();
              $this->viewsoptions_categoly=$this->picture->add_categoly();
              $this->display();
            }
            else{
                  //画像の拡張子チェック
                      if(!empty($fileName)){
                           $ext=substr($fileName,-3);
                          if($ext !='jpg'&&$ext !='gif'&&$ext !='png'){
                            $error['picture_path']='type';
                          }
                      
                  
              //エラーがない場合 画像をアップロードする
                        special_echo('画像をアップロード処理');
                        $picture_path=date('YmdHis').$fileName;
                        move_uploaded_file($files['picture_path']['tmp_name'],'uploads/pictures/' .$picture_path);
                        $_SESSION['post']=$post;
                        $_SESSION['picture_path']=$picture_path;
                        special_echo('$_SESSION＝');
                        special_var_dump($_SESSION);
                        header('Location:create');
                        exit();
                      }  
                    }
            }

          }
      



        // Viewを表示するメソッド
        function display() {
            require('views/layouts/application.php');
        }
    }
 ?>





