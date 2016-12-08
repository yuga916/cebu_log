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
                function like() {
                    special_echo('モデルのlikeメソッド呼び出し');
          
                      $sql = sprintf('INSERT INTO `likes` SET `u_id` = %d, `p_id` = %d',
                                          $_SESSION['id'],
                                          $option
                                     );
          
                      mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
                }
                
        //unlike機能
                function unlike() {
                     special_echo('モデルのunlikeメソッド呼び出し');

                      $sql = sprintf('DELETE FROM `likes` WHERE `u_id` = %d AND `p_id` = %d',
                                          $_SESSION['id'],
                                          $option
                                     );

                      mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
                  }        


    }
 ?>








