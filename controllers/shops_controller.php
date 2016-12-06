<?php 
	 require('models/shop.php');
	 special_echo('shops_controller.phpが呼び出されました');
	//インスタンス化
	  $Controller= new ShopsController();

	//デバック
	  	special_var_dump();
	  	special_var_dump();
	  	special_var_dump();

	//actionの条件分岐
	  switch ($action){
	  	case 'post_validation':
	  		$Controller->post_validation($post,$files,$fileName);

	  		break;


	  	case 'add':
	  		$Controller->add();

	  	    break;

	  	case 'create':
			$Controller->create($_SESSION['post'],$_SESSION['picture_path']);

			break;


	  	default:

	  		break;
	  }

	//controller class 
	 class ShopsController{
	 	//プロパティ
	 	private $picture;
	 	private $resourse;
	 	private $action;
	 	private $viewsoptions_shops;
	 	private $viewsoptions_categoly;
	 	private $viewerrors;

	 	function __construct(){
	 		$this->picture=new Picture();
	 		$this->resource='pictures';
	 		$this->action='add';
	 		$this->viewsoptions_shops=array();
	 		$this->viewsoptions_categoly=array();
	    }
	    function post_validation($post,$files,$fileName){
	    	special_echo('controller`sのpost_validationが呼び出されました');

		        if(!empty($post)){		    	
			    	$error=$this->picture->post_validation($post,$files);
			    	if(!empty($error)){
			    		$this->viewerrors=$error;
			    		$this->display();
			    	}
			    	else{
				          //画像の拡張子チェック
			                if(!empty($fileName)){
			                     $ext=substr($fileName,-3);
			                    if($ext !='jpg'&&$ext !='gif'&&$ext !='png'){
			                      $error['picture_path']='type';
			                    }
			                }
		            	
		          //エラーがない場合 画像をアップロードする
		                    special_echo('画像をアップロード');
		                    $picture_path=date('YmdHis').$fileName;
		                    move_uploaded_file($files['picture_path']['tmp_name'],'uploads/pictures/' .$picture_path);
		                    $_SESSION['post']=$post;
		                    $_SESSION['picture_path']=$picture_path;
		                    special_var_dump($_SESSION);
		                    header('Location:create');
		                    exit();
		                }
			    	}

			    }
	    


	    function add(){
	 		special_echo('Void the Controller’s add()');
	 		$this->action='add';
	 		$this->viewsoptions_shops=$this->picture->add_shops();
	 		//special_var_dump('$this->viewsoptions_shops');
	  		$this->viewsoptions_categoly=$this->picture->add_categoly();
	  		$this->display();
	   }

	   function create($post,$files){
	   		special_echo('controllerのcreateが呼び出されました');
	   		$this->picture->create($post,$files);
	   		session_destroy();
	   		header('Location:add');
	   		exit();
	   }

	   function display(){
	 		require('views/pictures/add.php');
	   }

	}
?>