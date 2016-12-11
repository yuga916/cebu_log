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

            $sql =  sprintf('SELECT `shop_name`,`shop_intro` 
                 FROM `shops` 
                WHERE `shop_id` = %d ORDER BY `created`',
                mysqli_real_escape_string($this->dbconnect, $id)
                );
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
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
                 //categolyの未入力チェック
                if($post['intro_shop']==''){
                    $error['intro_shop']='blank';
                }
                if ($post['address']==''){
                    $error['address']='blank';
                }
                                         
         return $error;
        }

        function create($post){
          special_echo('modelsのcreateが呼び出された' );
          $sql=sprintf('INSERT INTO `shops` SET `shop_name`="%s",`shop_intro`="%s",`owner_id`=%d,`shop_address`="%s",`created`=NOW()',mysqli_real_escape_string($this->dbconnect,$post['shop_name']),mysqli_real_escape_string($this->dbconnect,$post['intro_shop']),mysqli_real_escape_string($this->dbconnect,$post['owner_id']),mysqli_real_escape_string($this->dbconnect,$post['address']));
          mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));

        }
  }
?>
