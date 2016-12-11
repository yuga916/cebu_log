<?php
    //セッションの設定
    session_start();
    require('functions.php');
    special_echo('routes.phpが呼び出されました。');


    // explode()関数 : 第二引数の文字列を、第一引数の文字で分割し配列で返す
    $parameters = explode('/', $_GET['url']);
    // $_GET['url'] = 'blogs/index';
    // $parameters = array('blogs', 'index');

    // GETパラメータで指定されたリソース名とアクション名を取得
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


    if (isset($parameters[2])) {
        $id = $parameters[2];
    }

    if (!empty($_POST)) {
        // $post = array('title' => 'タイトル', 'body' => '本文');
        $post = $_POST;
    }

    if (!empty($_FILES)) {
        // $post = array('title' => 'タイトル', 'body' => '本文');
        $file = $_FILES;
    }

    // Contollers内のリソース名にふさわしいcontrollerファイルを呼び出し
    require('controllers/' . $resource . '_controller.php');
?>















