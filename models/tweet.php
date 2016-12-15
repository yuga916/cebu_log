<?php
    // echo 'models内のファイルは読み込まれています。';
  class Tweet{
      private $dbconnect;

    // 初期化処理コンストラクタ
      function __construct() {
        require('dbconnect.php');
        $this->dbconnect = $db;
      }
//  }  Fatal error: Call to undefined method Tweet::index() in /var/www/html/cebu_log/controllers/tweets_controller.php on line 40


      // DBアクセス：DB内容表示・閲覧
      function index(){
//      special_echo ('modelのindex()を実行しています');
      // tweet：つぶやき一覧降順（新→古）表示
      $sql = "SELECT * FROM `tweets` ORDER BY `created` DESC";
      $results = mysqli_query($this->dbconnect, $sql) or die(
        mysqli_error($this->dbconnect));

          $return = array();
          while ($result = mysqli_fetch_assoc($results)) {
            $return[] = $result;
          }

          return $return;
        }

//}  Parse error: syntax error, unexpected 'return' (T_RETURN), expecting function (T_FUNCTION) in /var/www/html/cebu_log/models/tweet.php on line 42

      // DBアクセス：新規投稿
      function create($post) {
        $sql = sprintf('INSERT INTO `tweets`
          SET `tweet` = "%s",
              `reply_tweet_id` = 0,
              `picture_id` = 1,
              `s_id` = 1,
              `m_id` = 1,
              `option` = "%s",
              `created` = NOW()',
//          mysqli_real_escape_string($this->dbconnect,$post['title']),
          mysqli_real_escape_string($this->dbconnect,$post['body']),
          mysqli_real_escape_string($this->dbconnect,$post['option']));
//          mysqli_real_escape_string($this->dbconnect,$post['picture_id']));
//          mysqli_real_escape_string($this->dbconnect,$post['s_id']));
//          mysqli_real_escape_string($this->dbconnect,$post['m_id']));
        mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));
      }
//  }  syntax error, unexpected 'return' (T_RETURN), expecting function (T_FUNCTION) in /var/www/html/cebu_log/models/tweet.php on line 41
     // var_dump($rtn);
//      return $return;
//  }//  Fatal error: Call to undefined method Tweet::create() in /var/www/html/cebu_log/controllers/tweets_controller.php on line 45



//      }


//    }

      // DBアクセス：変更・返信
        function update($post) {
        $sql = sprintf('UPDATE `tweets`
          SET `tweet` = "%s",
              `picture_id` = 1,
              `s_id` = 1, 
          WHERE `id` = %d',
          mysqli_real_escape_string($this->dbconnect,$post['tweet']),
//          mysqli_real_escape_string($this->dbconnect,$post['picture_id']),
//          mysqli_real_escape_string($this->dbconnect,$post['s_id']),
          $post['id']);
        mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));
        }

      // DBアクセス：投稿削除
        function delete($post){
        $sql = sprintf('UPDATE `tweets`
                SET `tweet_id` = "%s",
                WHERE `id` = %d',
          mysqli_real_escape_string($this->dbconnect,$post['tweet']),
          $post['id']);
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }
    }
 ?>
