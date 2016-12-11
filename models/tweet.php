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
				$sql=sprintf('INSERT INTO `tweets`SET `tweet`="%s", `reply_tweet_id`=%d, `picture_id`=%d,`s_id`=%d, `m_id`=%d, `created`=NOW()',mysqli_real_escape_string($this->dbconnect,$post['tweet']),mysqli_real_escape_string($this->dbconnect,$post['reply_tweet_id']),mysqli_real_escape_string($this->dbconnect,$picture),mysqli_real_escape_string($this->dbconnect,$post['s_id']),mysqli_real_escape_string($this->dbconnect,$post['owner_id']));
                 mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));

			}


	//shop下部のTweet画面のTweetとmember情報
        function shop_tweet_show($id) {
            special_echo('モデルのshowメソッド呼び出し');
            special_echo('$idは' . $id . 'です(モデル内)');

            $sql =  sprintf('SELECT t.`tweet`,t.`created`, m.`id`,m.`nick_name`, m.`picture_path` 
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

    }
 ?>


