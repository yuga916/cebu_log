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

            $sql =  sprintf('SELECT `shop_id`,`shop_name`,`shop_intro`,`shop_lat`,`shop_lng` 
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

        function post_validation($post){
            $error=array();
                //owner_idの未入力チェック
                if($post['owner_id']==''){
                  $error['owner_id']='blank';
                }
                //お店の名前のID未入力チェック
                if($post['shop_name']==''){
                    $error['shop_name']='blank';
                }
                //重複チェック                
                if (!empty($post['shop_name'])) {
                    $sql=sprintf('SELECT COUNT(*) AS cnt FROM `shops` WHERE `shop_name`="%s"',mysqli_real_escape_string($this->dbconnect,$post['shop_name']));
                    $record=mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));
                    $table=mysqli_fetch_assoc($record);
                        if($table['cnt']>0)
                            {
                              $error['shop_name']='duplicate';
                            }                    
                }
                 //categolyの未入力チェック
                if($post['intro_shop']==''){
                    $error['intro_shop']='blank';
                }
                if ($post['result_lat']==''){
                    $error['result_lat']='blank';
                }
                if ($post['result_lng']==''){
                    $error['result_lng']='blank';
                }

                                         
            return $error;

        }

        function create($post){
          special_echo('modelsのcreateが呼び出された' );
          $sql=sprintf('INSERT INTO `shops` SET `shop_name`="%s",`shop_intro`="%s",`owner_id`=%d,`shop_lat`="%.14f",`shop_lng`="%.14f",`created`=NOW()',mysqli_real_escape_string($this->dbconnect,$post['shop_name']),mysqli_real_escape_string($this->dbconnect,$post['intro_shop']),mysqli_real_escape_string($this->dbconnect,$post['owner_id']),mysqli_real_escape_string($this->dbconnect,$post['result_lat']),mysqli_real_escape_string($this->dbconnect,$post['result_lng']));//$post['address']
          mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));

        }
//sample　talk spot
        function sample($id){
            $sql=sprintf('SELECT t.`tweet_id`, m.`id`, m.`nick_name`,m.`picture_path`,t.`tweet`,t.`m_id`,t.`s_id`, p.`shop_picture_path`, t.`created` 
                 FROM `tweets` t 
                 LEFT JOIN `pictures` p ON t.`picture_id`= p.`picture_id`
                 LEFT JOIN `members` m  ON t.`m_id`= m.`id`
                 WHERE t.`s_id` = %d ORDER BY t.`created` DESC',mysqli_real_escape_string($this->dbconnect, $id));
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            $rtn=array();
            while ($result=mysqli_fetch_assoc($results))
            {
                $rtn[]=$result;
            }            
            return $rtn;
        }
//talk spotの検索
        function seach_tweet($id,$word){
            $sql=sprintf('SELECT t.`tweet_id`, m.`id`, m.`nick_name`,m.`picture_path`,t.`tweet`,t.`m_id`,t.`s_id`, p.`shop_picture_path`, t.`created` 
                 FROM `tweets` t 
                 LEFT JOIN `pictures` p ON t.`picture_id`= p.`picture_id`
                 LEFT JOIN `members` m  ON t.`m_id`= m.`id`
                 WHERE t.`s_id` = %d AND t.`tweet` LIKE "%%%s%%" ORDER BY t.`created` DESC',mysqli_real_escape_string($this->dbconnect, $id),mysqli_real_escape_string($this->dbconnect, $word));
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            while ($result=mysqli_fetch_assoc($results))
            {
                $rtn[]=$result;
            }            
            return $rtn;
        }

//登録後のお店の名前を取得
        function show_shop_id($post)
        {
            $sql=sprintf('SELECT `shop_id`,`created`FROM `shops` WHERE `owner_id`=%d ORDER BY `created` DESC limit 1',mysqli_real_escape_string($this->dbconnect,$post['owner_id']));
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            $result=mysqli_fetch_assoc($results);

            return $result;
        }

  }
?>
