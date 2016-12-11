<?php
    special_echo('Modelのpicture.phpが呼ばれました');

    // Modelのクラス
    class Picture {
        // プロパティ
        private $dbconnect;

        function __construct() {
            //DB接続
            require('dbconnect.php');
            $this->dbconnect = $db;
        }

        function random() {
            special_echo('モデルのrandom()が呼び出されました。');

            $sql = 'SELECT `shop_picture_path` ,`s_id` FROM `pictures` WHERE `categoly` = 0 ORDER BY RAND() LIMIT 25';
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            // 戻り値 (Controllerへ渡すデータ)
            $rtn = array();
            while ($result = mysqli_fetch_assoc($results)) {
                $rtn[] = $result;
            }

            // var_dump($rtn);
            return $rtn;
        } 
        

        function realtime() {
            special_echo('モデルのrealtime()が呼び出されました。');

            $sql = 'SELECT `shop_picture_path` FROM `pictures` ORDER BY RAND() LIMIT 25';
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            // 戻り値 (Controllerへ渡すデータ)
            $rtn = array();
            while ($result = mysqli_fetch_assoc($results)) {
                $rtn = $result;
            }

            // var_dump($rtn);
            return $rtn;
        }

        function all_show($id) {
            special_echo('モデルのall_show()が呼び出されました。');

            $sql = sprintf('SELECT `shop_picture_path` FROM `pictures` WHERE `s_id` = %d ORDER BY `created`',
            mysqli_real_escape_string($this->dbconnect, $id)
            );
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            // 戻り値 (Controllerへ渡すデータ)
            $rtn = array();
            while ($result = mysqli_fetch_assoc($results)) {
                $rtn[] = $result;
            }

            // var_dump($rtn);
            return $rtn;
        }

//shopのトップ画像のランダム表示
        function shop_top($id) {
            $sql = sprintf('SELECT `shop_picture_path` FROM `pictures` WHERE `s_id` = %d ORDER BY RAND() LIMIT 1',
            mysqli_real_escape_string($this->dbconnect, $id)
            );
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            // 戻り値 (Controllerへ渡すデータ)
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
        }        
 

//shopの画像を取り出す。（8枚）
              function shop_picture_show($id) {
                  special_echo('モデルのshowメソッド呼び出し');
                  special_echo('$idは' . $id . 'です(モデル内)');
                  $sql =  sprintf('SELECT `shop_picture_path`
                       FROM `pictures` 
                      WHERE `s_id` = %d ORDER BY `created` LIMIT 8',
                      mysqli_real_escape_string($this->dbconnect, $id)
                      );
                  $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
                  $rtn = array();
                  while ($result = mysqli_fetch_assoc($results)) {
                      $rtn[] = $result;
                  }

                  // var_dump($rtn);
                  return $rtn;
              } 

//Tweetに紐づく画像を取り出す。
              function shop_twpicture_show($id) {
                  special_echo('モデルのshowメソッド呼び出し');
                  special_echo('$idは' . $id . 'です(モデル内)');
                  $sql = sprintf('SELECT p.`shop_picture_path`
                 FROM `pictures`p, `tweets` t
                 WHERE t.`picture_id` = p.`picture_id` ORDER BY t.`created`',
                 mysqli_real_escape_string($this->dbconnect, $id)
                );
                  $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
                  $rtn = array();
                  while ($result = mysqli_fetch_assoc($results)) {
                      $rtn[] = $result;
                  }
                  return $rtn;
          
                } 

//マイページの画像を表示
              function user_page_picture($id) {
                  special_echo('モデルのshowメソッド呼び出し');
                  special_echo('$idは' . $id . 'です(モデル内)');
                  $sql =  sprintf('SELECT `shop_picture_path` FROM `pictures` 
                WHERE `owner_id` = %d ORDER BY `created`',
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








