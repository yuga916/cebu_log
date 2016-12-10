<?php
    special_echo('Modelのuser.phpが呼ばれました');



    // Modelのクラス
    class User {
        // プロパティ
        private $dbconnect;

        function __construct() {
            //DB接続
            require('dbconnect.php');
            $this->dbconnect = $db;
        }

        function rank() {
            special_echo('モデルのrank()が呼び出されました。');

            $sql = 'SELECT `shop_picture_path` FROM `pictures` ORDER BY RAND() LIMIT 25';
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            // 戻り値 (Controllerへ渡すデータ)
            $rtn = array();
            while ($result = mysqli_fetch_assoc($results)) {
                $rtn[] = $result;
            }

            // var_dump($rtn);
            return $rtn;
        }
    

        function show_follow($id) {
            special_echo('モデルのshowメソッド呼び出し');
            special_echo('$idは' . $id . 'です(モデル内)');

            // パラメータから取得した$idを元に記事データ一件取得
                // WHERE `id` = $id ← この条件でデータを取得します
            $sql = 'SELECT * FROM `members`';
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
        }

        function show_follower($id) {
            special_echo('モデルのshowメソッド呼び出し');
            special_echo('$idは' . $id . 'です(モデル内)');

            // パラメータから取得した$idを元に記事データ一件取得
                // WHERE `id` = $id ← この条件でデータを取得します
            $sql = 'SELECT * FROM `members`';
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
        }

// 　　　　　会員登録処理
        function create($post) {
            $sql = sprintf('INSERT INTO `users` SET `title` = "%s",
                                                    `body` = "%s",
                                                    `delete_flag` = 0,
                                                    `created` = NOW()',
                        mysqli_real_escape_string($this->dbconnect,$post['title']),
                        mysqli_real_escape_string($this->dbconnect,$post['body'])
                    );
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }

        function edit($id) {
            $sql = 'SELECT * FROM `blogs` WHERE `delete_flag` = 0 AND `id` = ' . $id;
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
        }

        function update($post) {
            $sql = sprintf('UPDATE `blogs` SET `title` = "%s", `body` = "%s"
                                           WHERE `id` = %d',
                        mysqli_real_escape_string($this->dbconnect,$post['title']),
                        mysqli_real_escape_string($this->dbconnect,$post['body']),
                        $post['id']
                    );
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }

        function delete($id) {
            // 物理削除
            // $sql = 'DELETE FROM `blogs` WHERE `id` = ' . $id;
            // 論理削除
            $sql = 'UPDATE `blogs` SET `delete_flag` = 1 WHERE `id` =' . $id;
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            
        }

//like数と投稿写真の取得
        function show($option) {
                      $sql = sprintf('SELECT p.*, l.`u_id` AS `is_like` FROM `pictures` AS p LEFT JOIN `likes` AS l
                                              ON p.`id`=l.`p_id` AND l.`u_id`=%d
                                              WHERE p.`delete_flag`=0
                                              ORDER BY p.`created` DESC',
                                        $_SESSION['id']
                                    );
          
                      $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
                      // $rtn = array();
                       $result = mysqli_fetch_assoc($results);// ) {
                                // $rtn = $result;
                      // }
                      return $rtn;
         }


//like機能
        function like($option) {
            special_echo('モデルのlikeメソッド呼び出し');
  
              $sql = sprintf('INSERT INTO `likes` SET `u_id` = %d, `p_id` = %d',
                                  $_SESSION['id'],
                                  $option
                             );
  
              mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }
        
//unlike機能
        function unlike($option) {
             special_echo('モデルのunlikeメソッド呼び出し');

              $sql = sprintf('DELETE FROM `likes` WHERE `u_id` = %d AND `p_id` = %d',
                                  $_SESSION['id'],
                                  $option
                             );

              mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
          }        

    }
 ?>








