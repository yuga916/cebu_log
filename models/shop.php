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


            //お店情報を取り出す
        function show($id) {
            special_echo('モデルのshowメソッド呼び出し');
            special_echo('$idは' . $id . 'です(モデル内)');

            $sql = 'SELECT * FROM `shops`';
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            $rtn[] = mysqli_fetch_assoc($results);
            return $rtn;
        }

        

    }
 ?>








