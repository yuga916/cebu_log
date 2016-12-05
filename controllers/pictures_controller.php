<?php 
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
?>