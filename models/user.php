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

//バリデーション処理
        function signup_valid($post) {
                    $error = array();
                    // バリデーション
                    if ($post['nick_name'] == '') {
                        $error['nick_name'] = 'blank';
                    }
                    if ($post['email'] == '') {
                        $error['email'] = 'blank';
                    }
                    if ($post['password'] == '') {
                        $error['password'] = 'blank';
                    } elseif (strlen($post['password']) < 4) {
                        $error['password'] = 'length';
                    }
                    return $error;
                }

//ログイン処理
         function auth($post) {
            special_echo('モデルのauth()が呼び出されました。');
            // ログイン処理
            $sql = sprintf('SELECT * FROM `members` WHERE `email`="%s" AND `password`="%s"',
                           mysqli_real_escape_string($this->dbconnect,$post['email']),
                           mysqli_real_escape_string($this->dbconnect, sha1($post['password']))
                  );
            $record = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($db));
            $login_flag = false;
            if ($table = mysqli_fetch_assoc($record)) {
                // ログイン成功
                $_SESSION['id'] = $table['id'];
                $_SESSION['time'] = time();
                $login_flag = true;
            } else {
                $login_flag = false;
            }
            return $login_flag;
        }

//新規登録処理
        function create($post) {
            $sql = sprintf('INSERT INTO `members` SET `nick_name` = "%s", `email` = "%s", `password` = "%s",`picture_path`="%s", `created` = NOW()',
                        mysqli_real_escape_string($this->dbconnect,$post['nick_name']),
                        mysqli_real_escape_string($this->dbconnect,$post['email']),
                        mysqli_real_escape_string($this->dbconnect, sha1($post['password'])),
                        mysqli_real_escape_string($this->dbconnect, $_SESSION['join']['image_file'])
                    );
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }
//ユーザー情報とそのユーザーが投稿した画像の表示の表示
        function user_page($id) {
                      $sql = sprintf('SELECT m.*, p.`shop_picture_path` FROM `members` m, `pictures` p WHERE p.`owner_id` = %d AND m.`id` = %d ORDER BY p.`created` DESC',
                          $id,
                          $id
                          );  
                      
                      $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
                      // $rtn = array();
                       $result = mysqli_fetch_assoc($results);
                       return $result;
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

            
//ユーザー情報の編集
        function edit($id) {
            $sql = 'SELECT * FROM `members` WHERE `id` = ' . $id;
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
        }

//ユーザー情報の更新処理
        function update($post) {
            $sql = sprintf('UPDATE `members` SET `nick_name` = "%s", `m_intro` = "%s"
                                           WHERE `id` = %d',
                        mysqli_real_escape_string($this->dbconnect,$post['nick_name']),
                        mysqli_real_escape_string($this->dbconnect,$post['m_intro']),
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
        function show($id) {
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








