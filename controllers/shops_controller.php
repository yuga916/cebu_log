<?php
    special_echo('shops_controller.phpが呼び出されました。');
    require('models/shop.php');
    require('models/picture.php');
    require('models/tweet.php');

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
	  case 'post_validation':
	    $controller->post_validation($post);
	    break;

	  case 'create':
		$controller->create($_SESSION['post']);
		break;

	  case 'add':
	  	$controller->add();
		break;
      case 'post_tweet_validation':
        $controller->post_tweet_validation($post,$files,$fileName);
        break;

      default:
        break;
    }


// コントローラのクラス
    class ShopsController {

        // プロパティ
        private $shop;
        private $resource;
        private $action;
        private $viewOptions;
	 	private $viewsoptionShops;
	 	private $viewErrors;


        function __construct() {
            $this->shop = new Shop();
            $this->picture = new Picture();
            $this->tweet = new Tweet();
            $this->resource = 'shops';
            $this->action = 'index';
            $this->viewOptions = array();

	 		$this->viewsoptionShops=array();
	 		$this->viewsoptions_categoly=array();
	 		$this->viewErrors=array();

            $this->viewPictures = array();
            $this->viewTweets = array();
            $this->viewTwpictures = array();

        }


// 詳細ページ表示アクション
        function show($id) {
            special_echo('Controllerのshow()が呼び出されました。');
            special_echo('$idは' . $id . 'です。');
            $this->viewOptions = $this->shop->show($id);
            $this->viewPictures = $this->picture->shop_picture_show($id);
            $this->viewTweets = $this->tweet->shop_tweet_show($id);
            $this->viewTwpictures = $this->picture->shop_twpicture_show($id);

            // special_var_dump($this->viewOptions);
            $this->action = 'show';
            $this->display();
        }

      
      

        // 新規shopページの作成画面
        function add() {
            special_echo('Controllerのadd()が呼び出されました。');
            $this->action ='add';
            $this->display();
        }


	    function post_validation($post){
	    	special_echo('controller`sのpost_validationが呼び出されました');

		        if(!empty($post)){	
		        	$this->action='post_validation';	    	
			    	$error=$this->shop->post_validation($post);
			    	special_var_dump($error);
			    	if(!empty($error)){
			    		$this->viewErrors=$error;
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
        function post_tweet_validation($post,$files,$fileName){
            special_echo('controllerのpost_tweet_validationが呼び出されました');
                    $error=$this->post_tweet_validation;

        }

	   function create($post){
	   		special_echo('controllerのcreateが呼び出されました');
	   		$this->shop->create($post);
	   		session_destroy();
	   		//header('Location:add');
	   		//exit();
	   }


        
        // Viewを表示するメソッド
        function display() {
            require('views/layouts/application.php');
        }
    }

 ?>







