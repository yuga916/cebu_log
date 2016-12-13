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
            $sql = sprintf('INSERT INTO `members` SET `nick_name` = "%s", `email` = "%s", `password` = "%s",`picture_path`="%s", `m_intro` = "" , `created` = NOW()',
                        mysqli_real_escape_string($this->dbconnect,$post['nick_name']),
                        mysqli_real_escape_string($this->dbconnect,$post['email']),
                        mysqli_real_escape_string($this->dbconnect, sha1($post['password'])),
                        mysqli_real_escape_string($this->dbconnect, $_SESSION['join']['image_file'])
                    );
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }
//ユーザー情報とそのユーザーが投稿した画像の表示の表示
        function user_page($id) {
                      $sql = sprintf('SELECT * FROM `members` WHERE `id` = %d',
                          mysqli_real_escape_string($this->dbconnect,$id)
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
    
            
//ユーザー情報の編集
        function edit($id) {
            $sql = 'SELECT * FROM `members` WHERE `id` = ' . $id;
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
        }


//ユーザー情報の更新処理
        function update($post,$id) {
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

//フォローしているかどうかの判定
        function is_follow($id) {
          $sql = sprintf('SELECT COUNT(*) AS `is_follow` 
                                          FROM `followings`  
                                          WHERE `follower_id` = %d 
                                          AND  `following_id` = %d',
                                          mysqli_real_escape_string($this->dbconnect,$_SESSION['id']),
                                          mysqli_real_escape_string($this->dbconnect,$id)
                                          );
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
        }

//フォロー機能
        function follow($id){
        
        $sql = sprintf('INSERT INTO `followings` 
                        SET `follower_id` = %d, `following_id` = %d',
                        mysqli_real_escape_string($this->dbconnect,$_SESSION['id']),
                        mysqli_real_escape_string($this->dbconnect,$id)
                        );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }


//アンフォロー機能
      function unfollow($id){
        $sql = sprintf('DELETE FROM `followings`
                        WHERE `follower_id` = %d
                        AND `following_id` = %d',
                        mysqli_real_escape_string($this->dbconnect,$_SESSION['id']),
                        mysqli_real_escape_string($this->dbconnect,$id)
                        );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }

      function followings($id){
        special_echo('usersのfollowers()が呼び出されました');
        // フォローされている人の一覧
        $sql = sprintf('SELECT m.*, f.`following_id` 
                        FROM `members`
                        AS m
                        LEFT JOIN `followings`
                        AS f
                        ON m.`id` = f.`following_id`
                        WHERE m.`id` = f.`following_id`
                        AND f.`follower_id` = %d',
               mysqli_real_escape_string($this->dbconnect,$id));
        $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            $rtn = array();
              while($result = mysqli_fetch_assoc($results)){
              $rtn[] = $result;
          
            }
            return $rtn;
      }

      function followers($id){
        special_echo('usersのfollowings()が呼び出されました');
        // フォローしている人の一覧
        $sql = sprintf('SELECT m.*,f.`follower_id`, f.`following_id`
                        FROM `members`
                        AS m
                        LEFT JOIN `followings`
                        AS f
                        ON m.`id` = f.`follower_id`
                        WHERE m.`id` = f.`follower_id`
                        AND f.`following_id` = %d',
               mysqli_real_escape_string($this->dbconnect,$id));
        $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        $rtn = array();
        while($result = mysqli_fetch_assoc($results)){
                $rtn[] = $result;
        }
        return $rtn;
      }


//フォロー数
    function countFollowing($id){
        $sql = sprintf('SELECT COUNT(*) AS `follow_cnt` FROM `followings` WHERE `follower_id`=%d',
          mysqli_real_escape_string($this->dbconnect, $id)
          );
        $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        $rtn = mysqli_fetch_assoc($results);
        return $rtn;
    }

  //フォロワー数
    function countFollower($id){
        $sql = sprintf('SELECT COUNT(*) AS `following_cnt` FROM `followings` WHERE `following_id`=%d',
          mysqli_real_escape_string($this->dbconnect, $id)
          );
        $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        $rtn = mysqli_fetch_assoc($results);
        return $rtn;
    }


    }
 ?>





