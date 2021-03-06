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

            $sql = 'SELECT `shop_picture_path` ,`s_id` FROM `pictures` WHERE `categoly` = 0 AND `shop_picture_path` != "" ORDER BY RAND() LIMIT 25';
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            // 戻り値 (Controllerへ渡すデータ)
            $rtn = array();
            while ($result = mysqli_fetch_assoc($results)) {
                $rtn[] = $result;
            }

            // var_dump($rtn);
            return $rtn;
        } 

//お店、ユーザー、写真の数をカウント
        function count() {
            special_echo('モデルのcount()が呼び出されました。');
            $sql = 'SELECT COUNT(*) AS `cnt` FROM `pictures` WHERE NOT `shop_picture_path`=""
                    UNION ALL
                    SELECT COUNT(*) AS `cnt` FROM `shops`
                    UNION ALL
                    SELECT COUNT(*) AS `cnt` FROM `members`';
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            $rtn = array();
              while($result = mysqli_fetch_assoc($results)){
                      $rtn[] = $result;
              }
              return $rtn;
        }
        

        function realtime() {
            special_echo('モデルのrealtime()が呼び出されました。');

            $sql = 'SELECT `s_id`,`shop_picture_path` FROM `pictures` ORDER BY `created` DESC';
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            // 戻り値 (Controllerへ渡すデータ)
            $rtn = array();
            while ($result = mysqli_fetch_assoc($results)) {
                $rtn[] = $result;
            }

            // var_dump($rtn);
            return $rtn;
        }

        function realtime_top() {
            special_echo('モデルのrealtime()が呼び出されました。');

            $sql = 'SELECT `s_id`,`shop_picture_path` FROM `pictures` WHERE NOT `shop_picture_path`="" ORDER BY `created` DESC LIMIT 6';
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            // 戻り値 (Controllerへ渡すデータ)
            $rtn = array();
            while ($result = mysqli_fetch_assoc($results)) {
                $rtn[] = $result;
            }

            // var_dump($rtn);
            return $rtn;
        }

        function all_show($id) {
            special_echo('モデルのall_show()が呼び出されました。');
            $sql = sprintf('SELECT `shop_picture_path` FROM `pictures` WHERE `s_id`=%d  ORDER BY RAND() LIMIT 25',$id);
            $results=mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));

            // 戻り値 (Controllerへ渡すデータ)
            $rtn = array();
            while ($result = mysqli_fetch_assoc($results)) {
                $rtn[] = $result;
            }
            return $rtn;
        }

//shopのトップ画像のランダム表示
        function shop_top($id) {
            $sql = sprintf('SELECT `shop_picture_path` FROM `pictures` WHERE `s_id` = %d AND `categoly`= 0 AND `shop_picture_path` != "" ORDER BY RAND() LIMIT 1',
            mysqli_real_escape_string($this->dbconnect, $id)
            );
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            // 戻り値 (Controllerへ渡すデータ)
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
        }        
 
                function post_validation($post,$files){
                      $error=array();
                          //owner_idの未入力チェック
                          if($post['owner_id']==''){
                            $error['owner_id']='blank';
                          }
                          //お店の名前のID未入力チェック
                          if($post['s_id']==''){
                              $error['s_id']='blank';
                          }
                           //categolyの未入力チェック
                          if($post['categoly']==''){
                              $error['categoly']='blank';
                          }
                          if($files['picture_path']['name']==''){
                                $error['picture_path']='blank';//空白の時判別できない
                          }
                                               
                   return $error;
                  }
                  function create($post,$files){
                    special_echo('modelsのcreateが呼び出された' );
                    $sql=sprintf('INSERT INTO `pictures` SET `owner_id`=%d,`categoly`=%d,`s_id`=%d,`shop_picture_path`="%s",`created`=NOW()',mysqli_real_escape_string($this->dbconnect,$post['owner_id']),mysqli_real_escape_string($this->dbconnect,$post['categoly']),mysqli_real_escape_string($this->dbconnect,$post['s_id']),mysqli_real_escape_string($this->dbconnect,$files)
                      );
                    mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));
                  }


                  function add_shops(){
                    special_echo('modelのadd_shopsが呼び出された');
                    //shopテーブルからshop_idとshop_nameと取り出す
                    $sql='SELECT`shop_id`,`shop_name`FROM `shops`';
                    $results=mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));
                    return $results;
                  }

                  function add_categoly(){
                    special_echo('modelのadd_categolyが呼び出された');
                    //categolyテーブルからcategoly_idとcategolyを取り出す
                    $sql='SELECT*FROM `categoly`';
                    $results=mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));
                    return $results;
                  }

                 function show_p_id($post){
                    special_echo('modelのshow_idが呼び出されました');
                    $sql=sprintf('SELECT `picture_id`FROM `pictures`WHERE `owner_id`=%d AND `s_id`=%d order by `created` DESC LIMIT 1',mysqli_real_escape_string($this->dbconnect,$post['owner_id']),mysqli_real_escape_string($this->dbconnect,$post['s_id']));
                    $results=mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));
                    $result=mysqli_fetch_assoc($results);
                    return $result;
                  }                       

//shopの画像を取り出す。（8枚）
              function shop_picture_show($id) {
                  special_echo('モデルのshowメソッド呼び出し');
                  special_echo('$idは' . $id . 'です(モデル内)');
                  $sql =  sprintf('SELECT `shop_picture_path`
                       FROM `pictures` 
                      WHERE `s_id` = %d AND `shop_picture_path` != "" ORDER BY `created` DESC  LIMIT 8',

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
//言い値ランキングの上位の画像pathを取得
              function home_ranking_picturepath($id){
                special_echo('home_ranking_picturepathの呼び出し');
                $sql = sprintf('SELECT `shop_picture_path` FROM `pictures` WHERE `s_id`=%d ORDER BY `created` DESC LIMIT 1',$id['s_id']);
                $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
                  while ($result = mysqli_fetch_assoc($results)) {
                      $rtn[] = $result;
                  }

                return $rtn;

              }
//お店を登録後shop_idを登録
              function create_sid_path($shopid){
              $sql=sprintf('INSERT `sid_picpath`SET `s_id`=%d,`shop_picture_path`=""',mysqli_real_escape_string($this->dbconnect, $shopid['shop_id'])
                );
                mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
              }
//画像の投稿、talkスポットでの画像投稿後、update
              function update_sid_path($post,$file){
                $sql=sprintf('UPDATE `sid_picpath`SET `shop_picture_path`="%s" WHERE`s_id`=%d',mysqli_real_escape_string($this->dbconnect, $file),mysqli_real_escape_string($this->dbconnect, $post['s_id']));
                mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
              }
    }
 ?>