<?php
    define('DEBUG', true);

    function special_echo($val) {
        if (DEBUG) {
            echo $val;
            echo '<br>';
        }
    }

    function special_var_dump($val) {
        if (DEBUG) {
            echo '<pre>';
            var_dump($val);
            echo '</pre>';
        }
    }

//フォロー数
    function countFollowing($user_id){
      require('dbconnect.php');
      $sql = sprintf('SELECT COUNT(*) AS `cnt` FROM `followings` WHERE `following_id`=%d',
        mysqli_real_escape_string($db, $user_id)
        );
      $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
      $row = mysqli_fetch_assoc($rec);
      return $row['cnt'];
    }
//フォロワー数
    function countFollower($user_id){
      require('dbconnect.php');
      $sql = sprintf('SELECT COUNT(*) AS `cnt` FROM `followings` WHERE `follower_id`=%d',
        mysqli_real_escape_string($db, $user_id)
        );
      $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
      $row = mysqli_fetch_assoc($rec);
      return $row['cnt'];
    }

 ?>
