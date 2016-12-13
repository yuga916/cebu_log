
<?php
	special_echo('modelのtimeline.phpが通りました');

	class Timeline{
	        // プロパティ
	        private $dbconnect;

	        function __construct() {
	            //DB接続
	            require('dbconnect.php');
	            $this->dbconnect = $db;


			}

//タイムライン機能
		function show(){
			$sql=sprintf('  SELECT m.`id`,m.`nick_name`,m.`picture_path`,t.`tweet_id`,t.`tweet`,p.`s_id`,s.`shop_name`, p.`shop_picture_path`, p.`created` FROM `tweets` t 
							LEFT JOIN `pictures` p ON t.`picture_id`= p.`picture_id` 
							LEFT JOIN `members` m ON t.`m_id`= m.`id` 
							LEFT JOIN `followings` f ON f.`following_id`=t.`m_id` 
							LEFT JOIN `shops` s ON t.`s_id`=s.`shop_id`
							where f.`follower_id` =1

							UNION

							SELECT m.`id`,m.`nick_name`,m.`picture_path`,t.`tweet_id`,t.`tweet`,p.`s_id`,s.`shop_name`,p.`shop_picture_path`,p.`created` 
							FROM `pictures` p 
							LEFT JOIN `members`m ON p.`owner_id`=m.`id` 
							LEFT JOIN `followings` f ON p.`owner_id`=f.`following_id` 
							LEFT JOIN `tweets` t ON p.`picture_id` = t.`picture_id` 
							LEFT JOIN `shops` s ON s.`shop_id`=p. `s_id`
							WHERE t.`picture_id` IS NULL AND f.`follower_id`=1

							ORDER BY `created` DESC

							');
			$results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            $rtn = array();
              while($result = mysqli_fetch_assoc($results)){
              $rtn[] = $result;
            }
            return $rtn;

		}
	}
 ?>