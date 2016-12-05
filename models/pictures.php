<?php 
  require('../functions.php');
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

    function create($post){
      special_echo('modelsのcreateが呼び出された' );
      $sql=sprintf('INSERT INTO `pictures` SET `owner_id`=%d,`categoly`=%d,`s_id`=%d,`shop_picture_path`="%s",`created`=NOW()',mysqli_real_escape_string($this->dbconnect,$post['id']),mysqli_real_escape_string($this->dbconnect,$post['categoly']),mysqli_real_escape_string($this->dbconnect,$post['s_id']),mysqli_real_escape_string($this->dbconnect,$post['picture_path'])
        );
      //mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));
    }

    function add_shops(){
      special_echo('modelのadd_shopsが呼び出された');
      //shopテーブルからshop_idとshop_nameと取り出す
      $sql='SELECT`shop_id`,`shop_name`FROM `shops`';
      $results=mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));
      $rtn=mysqli_fetch_assoc($results);
      return $rtn;
    }

    function add_categoly(){
      special_echo('modelのadd_categolyが呼び出された');
      //categolyテーブルからcategoly_idとcategolyを取り出す
      $sql='SELECT*FROM `categoly`';
      $results=mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));
      $rtn=mysqli_fetch_assoc($results);
      return $rtn;

    }
  }
?>