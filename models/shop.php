<?php
    special_echo('Modelのshop.phpが呼ばれました');

    // Modelのクラス
    class Shop {
        // プロパティ
        private $dbconnect;

        function __construct() {
            //DB接続
            require('dbconnect.php');
            $this->dbconnect = $db;
        }


//お店情報
        function show($id) {
            special_echo('モデルのshowメソッド呼び出し');
            special_echo('$idは' . $id . 'です(モデル内)');

            $sql =  sprintf('SELECT `shop_id`,`shop_name`,`shop_intro` 
                 FROM `shops` 
                WHERE `shop_id` = %d ORDER BY `created`',
                mysqli_real_escape_string($this->dbconnect, $id)
                );
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
        }

//いいねの数のカウント
        function count_like($id){
            $sql = sprintf('SELECT COUNT(`s_id`) AS like_cnt FROM `likes` WHERE `s_id`=%d',
                              mysqli_real_escape_string($this->dbconnect, $id)
                          );
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
        }

//likeがユーザーが押しているかどうかの判定
        function is_like($id){
            $sql = sprintf('SELECT `m_id` FROM `likes` 
                                    WHERE `s_id`=%d AND `m_id` =%d',
                              mysqli_real_escape_string($this->dbconnect, $id),
                              $_SESSION['id']

                          );
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
        }

//like機能
        function like($id) {
                      $sql = sprintf('INSERT INTO `likes` SET `m_id` = %d, `s_id` = %d',
                                $_SESSION['id'],
                                mysqli_real_escape_string($this->dbconnect, $id));
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }


//unlike機能
        function unlike($id) {
             special_echo('モデルのunlikeメソッド呼び出し');

              $sql = sprintf('DELETE FROM `likes` WHERE `m_id` = %d AND `s_id` = %d',
                                  $_SESSION['id'],
                                  mysqli_real_escape_string($this->dbconnect,$id));
              mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
          }

//今までの投稿一覧ページの店名表示
        function all_show($id) {
            special_echo('モデルのshowメソッド呼び出し');
            special_echo('$idは' . $id . 'です(モデル内)');

            $sql =  sprintf('SELECT `shop_name` 
                 FROM `shops` 
                WHERE `shop_id` = %d',
                mysqli_real_escape_string($this->dbconnect, $id)
                );
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            $rtn = mysqli_fetch_assoc($results);
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

        

    }
 ?>








