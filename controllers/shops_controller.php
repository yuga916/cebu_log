<<<<<<< HEAD
<?php 
	 require('models/shop.php');
	 special_echo('shops_controller.phpが呼び出されました');
	//インスタンス化
	  $Controller= new ShopsController();

	//デバック
	  	special_var_dump($post);
	  	//special_var_dump();
	  	//special_var_dump();

	//actionの条件分岐
	  switch ($action){
	  	case 'post_validation':
	  		$Controller->post_validation($post);

	  		break;

	  	case 'create':
			$Controller->create($_SESSION['post']);

			break;

		case 'add':
	  		$Controller->add();
			break;


	  	default:

	  		break;
	  }

	//controller class 
	 class ShopsController{
	 	//プロパティ
	 	private $shop;
	 	private $resourse;
	 	private $action;
	 	private $viewsoptions_shops;
	 	private $viewerrors;

	 	function __construct(){
	 		$this->shop=new Shop();
	 		$this->resource='shops';
	 		$this->action='add';
	 		$this->viewsoptions_shops=array();
	 		$this->viewsoptions_categoly=array();
	 		$this->viewerrors=array();
	    }
	    function post_validation($post){
	    	special_echo('controller`sのpost_validationが呼び出されました');

		        if(!empty($post)){	
		        	$this->action='post_validation';	    	
			    	$error=$this->shop->post_validation($post);
			    	special_var_dump($error);
			    	if(!empty($error)){
			    		$this->viewerrors=$error;
			    		$this->display();
			    	}
			    	else{         	
		                    $_SESSION['post']=$post;
		                    special_var_dump($_SESSION);
		                    header('Location:create');
		                    exit();
		                }
			    	}

			    }
	    


	    function add(){
	 		special_echo('Void the Controller’s add()');
	 		$this->action='add';
	  		$this->display();
	   }

	   function create($post){
	   		special_echo('controllerのcreateが呼び出されました');
	   		$this->shop->create($post);
	   		session_destroy();
	   		//header('Location:add');
	   		//exit();
	   }

	   function display(){
	 		require('views/layouts/application.php');
	   }

	}
?>
=======
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





>>>>>>> e08ace28a445dc3799b05aa4f817340fa3ae3175
