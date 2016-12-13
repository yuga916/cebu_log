<?php 
	special_echo('modelのtweet.phpが通りました');

	class Tweet{
	        // プロパティ
	        private $dbconnect;

	        function __construct() {
	            //DB接続
	            require('dbconnect.php');
	            $this->dbconnect = $db;


			}


			function create($post,$picture){
				special_echo('modelsのcreateが呼び出された');
				$sql=sprintf('INSERT INTO `tweets`SET `tweet`="%s", `reply_tweet_id`=%d, `picture_id`=%d,`s_id`=%d, `m_id`=%d, `created`=NOW()',mysqli_real_escape_string($this->dbconnect,$post['tweet']),mysqli_real_escape_string($this->dbconnect,$post['reply_tweet_id']),mysqli_real_escape_string($this->dbconnect,$picture['picture_id']),mysqli_real_escape_string($this->dbconnect,$post['s_id']),mysqli_real_escape_string($this->dbconnect,$post['owner_id']));
      mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));

			}


	//shop下部のTweet画面のTweetとmember情報
        function shop_tweet_show($id) {
            special_echo('モデルのshowメソッド呼び出し');
            special_echo('$idは' . $id . 'です(モデル内)');

            $sql =  sprintf('SELECT t.`tweet`,t.`created`,t.`picture_id`, m.`id`,m.`nick_name`, m.`picture_path` 
                 FROM `tweets` t, `members` m 
                WHERE t.`s_id` = %d ORDER BY `created`',
                mysqli_real_escape_string($this->dbconnect, $id)
                );
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            $rtn = array();
                  while ($result = mysqli_fetch_assoc($results)) {
                      $rtn[] = $result;
                  }
            return $rtn;
        }

//新規ツイート登録
        function tweet($post,$file) {
            $img_pic = '';
            $sql = sprintf('INSERT INTO 
                `tweets` SET 
                `tweet` = "%s",  
                `shop_id` = "%d",
                `user_id`="%d",
                `shop_picture_path`="%s",
                `category_id` = "%d",
                `delete_flag` = "0",
                `created` = NOW()',
                mysqli_real_escape_string($this->dbconnect,$post['tweet']),
                        // mysqli_real_escape_string($this->dbconnect,$post['picture_id']),
                mysqli_real_escape_string($this->dbconnect, $post['shop_id']),
                mysqli_real_escape_string($this->dbconnect, $_SESSION['id']),
                mysqli_real_escape_string($this->dbconnect, $img_pic),
                mysqli_real_escape_string($this->dbconnect, $post['category_id'])
                    );
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }

//ファイルのバリデーション
        function file_valid($file) {
            $error = '';
            $fileName = $file['shop_picture_path']['name'];
            $ext = substr($fileName,-3);
            if ($ext != 'jpg' && $ext != 'gif' && $ext != 'png' && $ext != 'JPG') {
              $error['shop_picture_path'] = 'type';
            }
            return $error;
            
        }

//ツイートの削除
        function delete($id) {
            // 物理削除
            // $sql = 'DELETE FROM `blogs` WHERE `id` = ' . $id;
            // 論理削除
            $sql = 'DELETE FROM `tweets` WHERE `tweet_id` =' . $id;
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            
        }

        

    }
 ?>


