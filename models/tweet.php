<?php
    // echo 'models内のファイルは読み込まれています。';
  class Tweet{
      private $dbconnect;

    // コンストラクタ
      // 初期化処理コンストラクタ
      function __construct() {
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function index(){
//      special_echo ('modelのindex()を実行しています');
      $sql = "SELECT * FROM `tweets`";
      $results = mysqli_query($this->dbconnect, $sql) or die(
        mysqli_error($this->dbconnect));

          $return = array();
          while ($result = mysqli_fetch_assoc($results)) {
            $return[] = $result;
          }

      // DBアクセス：新規投稿
      function create($post) {
        $sql = sprintf('INSERT INTO `tweets` 
          SET `tweet_id` = "%s",
              `tweet` = "%s",
              `reply_tweet_id` = 0
              `picture_id` = "%s",
              `s_id` = "%s",
              `m_id` = "%s",
              `created` = NOW()',
          mysqli_real_escape_string($this->dbconnect,$post['title']),
          mysqli_real_escape_string($this->dbconnect,$post['body']));
        mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));
      }

     // var_dump($rtn);
      return $return;
      }


      // DBアクセス：view
      // DBアクセス：update
      // DBアクセス：delete
//    }
  }
 ?>
