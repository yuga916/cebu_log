<?php
    session_start();
    require('functions.php');
    special_echo('routesを通りました');
    // http://192.168.33.10/seed_blog/ほげ
    // ↓↓↓↓↓
    // http://192.168.33.10/seed_blog/routes.php?url=ほげ
    // .htaccessファイルがURLを書き換える
    require('functions.php');

    special_echo('routes.phpが呼び出されました。');


    // explode()関数 : 第二引数の文字列を、第一引数の文字で分割し配列で返す
    $parameters = explode('/', $_GET['url']);
    // $_GET['url'] = 'blogs/index';
    // $parameters = array('blogs', 'index');

    // GETパラメータで指定されたリソース名とアクション名を取得
<<<<<<< HEAD
    $resource = $parameters[0];
    $action = $parameters[1];
    $id = 1;
    $post = array();
    $files = array();
=======
    //　もしリソース名もアクション名もなかったらtopページに遷移
    if(empty($parameters[0])){
        
        $action = 'home';
        require('controllers/home_controller.php');
        exit();
    } else {
        $resource = $parameters[0];
        $action = $parameters[1];
        $id = 1;
        $post = array();
    }


>>>>>>> e08ace28a445dc3799b05aa4f817340fa3ae3175

    if (isset($parameters[2])) {
        $id = $parameters[2];
    }

    if (!empty($_POST)) {
        // $post = array('title' => 'タイトル', 'body' => '本文');
        $post = $_POST;
        //special_var_dump($post);
    
        if (!empty($_FILES)) {
            $fileName=$_FILES['picture_path']['name'];
            $files=$_FILES;
            //special_var_dump($_FILES);

        }
    }

    // Contollers内のリソース名にふさわしいcontrollerファイルを呼び出し
    require('controllers/' . $resource . '_controller.php');
?>















