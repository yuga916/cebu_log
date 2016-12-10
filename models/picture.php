<<<<<<< HEAD
<?php 
  special_echo('Modelのpictures.phpが呼び出されました。');

 //model class 
  class Picture{
  	//プロパティ
  	private $dbconnect;

  	function __construct(){
  	//DB接続
  	require('dbconnect.php');
  	$this->dbconnect=$db;
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
      //mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));

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
  }
?>?>
=======
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








>>>>>>> e08ace28a445dc3799b05aa4f817340fa3ae3175
