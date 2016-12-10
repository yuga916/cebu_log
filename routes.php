<?php
    session_start();
    require('functions.php');
    special_echo('routesを通りました');
    // http://192.168.33.10/seed_blog/ほげ
    // ↓↓↓↓↓
    // http://192.168.33.10/seed_blog/routes.php?url=ほげ
    // .htaccessファイルがURLを書き換える
    // explode()関数 : 第二引数の文字列を、第一引数の文字で分割し配列で返す
    $parameters = explode('/', $_GET['url']);
    // $_GET['url'] = 'blogs/index';
    // $parameters = array('blogs', 'index');

    // GETパラメータで指定されたリソース名とアクション名を取得
    //もしリソース名もアクション名もなかったらtopページに遷移

    if(empty($parameters[0])||empty($parameters[1])){//全resource名を記入($action=home picrtures,shops,timeline,user_pages_users_controller)
        $resource ='home';
        $action='home';

    } 
    elseif (condition) {//既存のアクション名とリソース名がない場合、homeページへ遷移
        # code...
    }
    else {
        $resource = $parameters[0];
        $action = $parameters[1];
        $id = 1;
        $post = array();
        $files=array();
    

        if (isset($parameters[2])) {
            $id = $parameters[2];
        }

        if (!empty($_POST)) {
            $post = $_POST;
        
            if (!empty($_FILES)) {
                $fileName=$_FILES['picture_path']['name'];
                $files=$_FILES;
                //special_var_dump($_FILES);
            }
            
        }
        else{
                $fileName=null;
                $files=null;

            }
    }
    // Contollers内のリソース名にふさわしいcontrollerファイルを呼び出し
    require('controllers/' . $resource . '_controller.php');
?>















