<?php 
<<<<<<< HEAD
 require('models/pictures.php');
 special_echo('pictures_controller.phpが呼び出されました');
//インスタンス化
  $Controller= NEW PicturesController();
//actionの条件分岐
  switch ($action){
  	case 'add':
  		$Controller->add();

  	  break;

  	case 'create':
  	special_var_dump($fileName);
  	special_var_dump($files['picture_path']);
  	special_var_dump($_POST);

    if(!empty($post)){
      //お店の名前のID未入力チェック
      if($post['s_id']==''){
          $error['s_id']='blank';
      }

       //categolyの未入力チェック
      if($_POST['categoly']==''){
          $error['categoly']='blank';
      }

  	//空白check
 	  if (!empty($files['picture_path'])) {
 	      special_echo('error 空白エラーなし');	
 	//画像の拡張子チェック
	 	    if(!empty($fileName)){
	           $ext=substr($fileName,-3);
		        if($ext !='jpg'&&$ext !='gif'&&$ext !='png'){
		          $error['picture_path']='type';
			    }
		    }
 	//エラーがなった場合 画像をアップロードする
		      if(empty($error)){
			      special_echo('画像をアップロード');
			      $picture_path= date('YmdHis').$files['picture_path']['name'];
			      move_uploaded_file($files['picture_path']['tmp_name'],'uploads/pictures/' .$picture_path);
			      $post['picture_path']=$picture_path;          
	  	          $Controller->create($post);
		      }
      }
    }

      else{
      	$Controller->add();
      }

  	  break;

  	  default:

  		break;
  }

//controller class 
 class PicturesController{
 	//プロパティ
 	private $picture;
 	private $resourse;
 	private $action;
 	private $viewsoptions_shops;
 	private $viewsoptions_categoly;

 	function __construct(){
 		$this->picture=new Picture();
 		$this->resource='pictures';
 		$this->action='index';
 		$this->viewsoptions_shops=array();
 		$this->viewsoptions_categoly=array();

    }

    function add(){
 		special_echo('Void the Controller’s add()');
 		$this->action='add';
 		$this->viewsoptions_shops=$this->picture->add_shops();
 		//special_var_dump('$this->viewsoptions_shops');
  		$this->viewsoptions_categoly=$this->picture->add_categoly();
 		//special_var_dump('$this->viewsoptions_categoly');
 		require('views/pictures/add.php');
   }

   function create($post){
   		special_echo('controllerのcreateが呼び出されました');
   		$this->picture->create($post);
   }

   function display(){

   }

}
=======
	 require('models/picture.php');
	 special_echo('pictures_controller.phpが呼び出されました');
	//インスタンス化
	  $Controller= new PicturesController();

	//デバック
	  	special_var_dump($fileName);
	  	special_var_dump($files);
	  	special_var_dump($post);



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
	 class PicturesController{
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
	 		$this->viewerrors=array();


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
		                    special_echo('画像をアップロード');
		                    $picture_path=date('YmdHis').$fileName;
		                    move_uploaded_file($files['picture_path']['tmp_name'],'uploads/pictures/' .$picture_path);
		                    $_SESSION['post']=$post;
		                    $_SESSION['picture_path']=$picture_path;
		                    special_var_dump($_SESSION);
		                    //header('Location:create');
		                  }  //exit();
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
	 		require('views/layouts/application.php');
	   }

	}
>>>>>>> a9d6d3211b7cba49cd9fc9bd3f724f5a07b6a598
?>