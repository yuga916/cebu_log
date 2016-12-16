<?php
    session_start();
    require('functions.php');
    special_echo('routesを通りました');
    $parameters = explode('/', $_GET['url']);
    // $_GET['url'] = 'blogs/index';
    // $parameters = array('blogs', 'index');

    // GETパラメータで指定されたリソース名とアクション名を取得
    //　もしリソース名もアクション名もなかったらtopページに遷移
    special_var_dump($parameters);
    if(empty($parameters[0])){
        
        $action = 'home';
        
        require('controllers/home_controller.php');
        exit();
    } else {
        $resource = $parameters[0];
        $action = $parameters[1];
        //$id = 1;
        $post = array();
        $files=array();
    }
    

        if (isset($parameters[2])) {
            $id = $parameters[2];
        }

        if (!empty($_POST)) {
            $post = $_POST;
        }
            
        if(isset($_FILES['picture_path']['name'])) {
            if (!empty($_FILES)) {
                $fileName=$_FILES['picture_path']['name'];
                $files=$_FILES;
                //special_var_dump($_FILES);
            }
        }
            
         else {
            $fileName=null;
            $files=null;
        }

        if (isset($_GET)) {
            $get=$_GET;
        }
    // Contollers内のリソース名にふさわしいcontrollerファイルを呼び出し
    require('controllers/' . $resource . '_controller.php');
?>















