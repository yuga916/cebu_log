<?php 
	special_echo('tweets_controllerを通りました');
	require('models/tweet.php');
	require('models/picture.php');

	$controller= NEW TweetsController();

	switch ($action) {
		case 'post_tweet_validation':
			$controller->post_tweet_validation($post,$files,$fileName);
			break;

		case 'create_picture':
			$controller->create_picture($_SESSION['post'],$_SESSION['picture_path']);
			break;

		case 'show_p_id':
			$controller->show_p_id($_SESSION['post']);
			break;

		case 'create':
			$controller->create($_SESSION['post'],$_SESSION['picture'],$id);
			break;

//ツイートの削除
			case 'delete':
			$controller->delete($id);
			break;
		
		default:
			# code...
			break;
	}

	class TweetsController{
			private $resorce;
			private $action;
			private $tweet;
			private $viewOptionTweets;
			private $viewOptionPictures;
			private $picture;


			function __construct(){
				$this->tweet=new tweet();
				$this->picture=new picture();
				$this->resorce='tweets';
				$this->action='index';
				$this->viewOptionTweets=array();
				$this->viewOptionPictures=array();
			}

//tweet機能のバリデーション//画像のpath処理だけ必要
			function post_tweet_validation($post,$files,$fileName){
				 special_echo('tweets_controller.phpのpost_tweet_validationが呼び出されました');
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
		                  }
		                        $_SESSION['post']=$post;
		                        $_SESSION['picture_path']=$picture_path;
		                        special_echo('$_SESSION＝');
		                        special_var_dump($_SESSION);
		                        header('Location:create_picture');
		                        exit();
				}
//picturesへの登録
			function create_picture($post,$files){
				special_echo('tweets_controller.phpのcreate_pictureが呼び出されました');
				special_var_dump($post);
				special_var_dump($files);
				$this->picture->create($post,$files);
				header("Location:show_p_id");
				exit();
			}
			function show_p_id($post){
				special_echo('tweets_controllerのshow_p_idを通りました');
				special_var_dump($post);
				$_SESSION['picture']=$this->picture->show_p_id($post);
				special_var_dump($_SESSION['picture']);
				header('Location:create');
				exit();
			}
//tweetへの登録、その後shops/showへ遷移
			function create($post,$picture_id,$id){
				special_echo('tweets_controllerのcreateを通りました');
				special_var_dump($post);
				special_var_dump($picture_id);
				$this->tweet->create($post,$picture_id);
				header('Location:/cebu_log/shops/show/' . $id);
				exit();
			}

//ツイートの削除
			function delete($id) {
            special_echo('controllerのdeleteが表示されました。');
            $this->tweet->delete($id);
            header('Location: /cebu_log');
        }


	}

 ?>