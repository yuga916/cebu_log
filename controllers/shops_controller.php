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
        $controller->show($id,$get['search_word']);
        break;

//like機能
      case 'like':
          $controller->like($id);
          break;
 
//unlike機能
      case 'unlike':
          $controller->unlike($id);
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
        private $viewSamples;


        function __construct() {
            $this->shop = new Shop();
            $this->picture_top = new Picture();
            $this->picture = new Picture();
            $this->tweet = new Tweet();
            $this->resource = 'shops';
            $this->action = 'index';
            $this->viewOptions = array();
            $this->Picture_tops = array();
	 		$this->viewsoptionShops=array();
	 		$this->viewsoptionsCategoly=array();
	 		$this->viewErrors=array();
            $this->viewPictures = array();
            $this->viewTweets = array();
            $this->viewTwpictures = array();
            $this->viewLikes = array();
            $this->likeCounts = '';

            $this->viewSamples=array();
            $this->shop_id='';
        }


// 詳細ページ表示アクション
        function show($id,$search_word) {
            special_echo('Controllerのshow()が呼び出されました。');
            special_echo('$idは' . $id . 'です。');

            $this->Picture_tops = $this->picture->shop_top($id);
            $this->viewOptions = $this->shop->show($id);
            $this->viewPictures = $this->picture->shop_picture_show($id);
            $this->viewTweets = $this->tweet->shop_tweet_show($id);
            $this->viewTwpictures = $this->picture->shop_twpicture_show($id);

            $this->viewLikes = $this->shop->is_like($id);
            $this->likeCounts = $this->shop->count_like($id);
            $this->viewsoptionsCategoly=$this->picture->add_categoly();
//sample:talkspot
            if(empty($search_word)){
                $this->viewSamples=$this->shop->sample($id);                
            }
            else{
                $resultstweets=$this->shop->seach_tweet($id,$search_word);
                //検索結果が空
                if (empty($resultstweets)) {
                }
                //検索結果が空じゃない場合
                else{
                    $this->viewSamples=$resultstweets;
                }
            }

            special_var_dump($this->viewSamples);

            //special_echo('viewOptions');
            //special_var_dump($this->viewOptions);
            //special_echo('viewPictures');
            //special_var_dump($this->viewPictures);
            //special_echo('viewTwpictures');
            //special_var_dump($this->viewTwpictures);
            //special_echo('viewTweets');
            //special_var_dump($this->viewTweets);

            $this->action = 'show';
            $this->display();
        }

//like機能
        function like($id) {
            $this->viewLikes = $this->shop->like($id);
            $this->action = 'like';
            header('Location: /cebu_log/shops/show/' . $id);
        }

//unlike機能
        function unlike($id) {
            $this->shop->unlike($id);
            header('Location: /cebu_log/shops/show/' . $id);
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
                        $this->action='add';
                        $this->resource='shops';
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

	   function create($post){
	   		special_echo('controllerのcreateが呼び出されました');
            special_echo('$postは');
            special_var_dump($post['owner_id']);
	   		$this->shop->create($post);
	   		//session_destroy();//登録使用したでーたは消す
            $this->shopid=$this->shop->show_shop_id($post);
            special_echo('shopidは');
            special_var_dump($this->shopid);
	   		header('Location:show/'.$this->shopid['shop_id']);
	   		exit();
            //special_var_dump($_SESSION['post']);
	   }


        
        // Viewを表示するメソッド
        function display() {
            require('views/layouts/application.php');
        }
    }

 ?>







